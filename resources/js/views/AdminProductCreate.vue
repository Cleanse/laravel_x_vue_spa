<template>
    <layout name="Dashboard">
        <div class="col-md-9 ml-sm-auto col-lg-10 px-4">
            <div class="pt-3 pb-2 mb-3">
                <h1>Add New Product</h1>
            </div>

            <div v-if="message" class="alert alert-danger" role="alert">
                <p>{{ message }}</p>
            </div>

            <form @submit.prevent="onSubmit($event)">
                <div class="form-group">
                    <label for="product_type_id">Product Type</label>
                    <select id="product_type_id" class="form-control" v-model="pt.product_type_id">
                        <option v-for="pType in pTypes" :value="pType.id">{{ pType.name }}</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="name">Name</label>
                    <input class="form-control" id="name" v-model="pt.name">
                </div>
                <div class="form-group">
                    <label for="side_one_max">side_one_max</label>
                    <input class="form-control" id="side_one_max" v-model="pt.side_one_max">
                </div>
                <div class="form-group">
                    <label for="side_two_max">side_two_max</label>
                    <input class="form-control" id="side_two_max" v-model="pt.side_two_max">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" v-model="pt.description"></textarea>
                </div>
                <div class="form-group">
                    <label for="notes">Notes (Optional)</label>
                    <textarea class="form-control" id="notes" v-model="pt.notes"></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary" :disabled="saving">
                        {{ saving ? 'Creating...' : 'Create' }}
                    </button>
                </div>
            </form>
        </div>
    </layout>
</template>

<script>
    import Layout from '../layouts/Layout';
    import api from '../api/products';
    import typeApi from '../api/product_types';

    export default {
        name: `AdminProductCreate`,
        components: {
            Layout,
        },
        data() {
            return {
                saving: false,
                message: false,
                pt: {
                    product_type_id: null,
                    name: ``,
                    side_one_max: ``,
                    side_two_max: ``,
                    description: ``,
                    notes: ``
                },
                pTypes: null
            }
        },
        methods: {
            setLayout(layout) {
                this.$store.commit('SET_LAYOUT', layout);
            },
            onSubmit($event) {
                this.saving = true;
                this.message = false;

                api.create(this.pt)
                    .then((response) => {
                        this.$router.push({ name: 'product.edit', params: { id: response.data.data.id } });
                    })
                    .catch((e) => {
                        this.message = e.response.data.message || `There was an issue creating the new Product.`;
                    })
                    .then(() => this.saving = false)
            }
        },
        created() {
            typeApi.all()
                .then((response) => {
                    this.loaded = true;
                    this.pTypes = response.data.data;
                })
                .catch((err) => {
                    console.log(err);
                    this.$router.push({ name: '404' });
                });
        }
    }
</script>