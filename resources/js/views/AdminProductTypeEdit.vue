<template>
    <layout name="Dashboard">
        <div class="col-md-9 ml-sm-auto col-lg-10 px-4">
            <div class="pt-3 pb-2 mb-3">
                <h1>Edit {{ pType.name }}</h1>
                <router-link class="small" to="/lg/product-types">
                    &larr; To Product Types List</router-link>
            </div>

            <div v-if="message" class="alert alert-warning" role="alert">
                <span>{{ message }}</span>
            </div>

            <div v-if="!loaded">Loading...</div>
            <form @submit.prevent="onSubmit($event)" v-else>
                <div class="form-group">
                    <label for="name">Product Type Name</label>
                    <input class="form-control" id="name" v-model="pType.name">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" v-model="pType.description"></textarea>
                </div>
                <div class="form-group">
                    <label for="notes">Notes (Optional)</label>
                    <textarea class="form-control" id="notes" v-model="pType.notes"></textarea>
                </div>
                <div class="form-group">
                    <label for="active">Display on Website?</label>
                    <select id="active" class="form-control" v-model="pType.active">
                        <option selected>Choose...</option>
                        <option value="0">Hide</option>
                        <option value="1">Display</option>
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary" :disabled="saving">Update</button>
                    <button class="btn btn-outline-danger" :disabled="saving" @click.prevent="onDelete($event)">Delete</button>
                </div>
            </form>
        </div>
    </layout>
</template>

<script>
    import api from '../api/product_types';
    import Layout from "../layouts/Layout";

    export default {
        name: `AdminProductTypeEdit`,
        components: {
            Layout
        },
        data() {
            return {
                message: null,
                loaded: false,
                saving: false,
                pType: {
                    id: null,
                    name: ``,
                    description: ``,
                    notes: ``,
                    active: null
                },
            };
        },
        methods: {
            setLayout(layout) {
                this.$store.commit('SET_LAYOUT', layout);
            },
            onSubmit(event) {
                this.saving = true;

                api.update(this.pType.id, {
                    name: this.pType.name,
                    description: this.pType.description,
                    notes: this.pType.notes,
                    active: this.pType.active,
                }).then((response) => {
                    this.message = `Product Type updated.`;

                    this.pType = response.data.data;
                }).catch(error => {
                    this.message = error;
                }).then(_ => this.saving = false);
            },
            onDelete() {
                this.saving = true;

                api.delete(this.pType.id)
                    .then((response) => {
                        this.$router.push({ name: 'pt.list' });
                    });
            }
        },
        created() {
            api.find(this.$route.params.id)
                .then((response) => {
                    this.loaded = true;
                    this.pType = response.data.data;
                })
                .catch((err) => {
                    this.$router.push({ name: '404' });
                });
        }
    };
</script>