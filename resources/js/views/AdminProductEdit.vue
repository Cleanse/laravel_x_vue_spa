<template>
    <layout name="Dashboard">
        <div class="col-md-9 ml-sm-auto col-lg-10 px-4">
            <div class="pt-3 pb-2 mb-3">
                <h1><span class="text-primary">Edit</span> {{ product.name }}</h1>
                <router-link class="small" to="/lg/products">
                    &larr; To Products List</router-link>
            </div>

            <div v-if="message" class="alert alert-warning" role="alert">
                <span>{{ message }}</span>
            </div>

            <div class="row">
                <div class="col-md-8">
                    <div v-if="!loaded">Loading...</div>
                    <form @submit.prevent="onSubmit($event)" v-else>
                        <div class="form-group">
                            <label for="product_type_id">Product Type</label>
                            <select id="product_type_id" class="form-control" v-model="product.product_type_id">
                                <option :value="product.product_type_id">{{ pType.name }}</option>
                                <option v-for="pType in pTypes" :value="pType.id">{{ pType.name }}</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="name">Product Name</label>
                            <input class="form-control" id="name" v-model="product.name">
                        </div>
                        <div class="form-group">
                            <label for="side_one_max">side_one_max</label>
                            <input class="form-control" id="side_one_max" v-model="product.side_one_max">
                        </div>
                        <div class="form-group">
                            <label for="side_two_max">side_two_max (optional)</label>
                            <input class="form-control" id="side_two_max" v-model="product.side_two_max">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" v-model="product.description"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="notes">Notes (Optional)</label>
                            <textarea class="form-control" id="notes" v-model="product.notes"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="active">Display on Website?</label>
                            <select id="active" class="form-control" v-model="product.active">
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

                <div class="col-md-4">
                    <div class="card bg-dark text-white" v-if="product.featured">
                        <img :src="product.featured.filename" class="card-img" alt="Preview image." v-if="product.featured">
                        <div class="card-img-overlay">
                            <h5 class="card-title">{{ product.name }}</h5>
                            <p class="card-text">{{ product.description }}</p>
                        </div>
                    </div>

                    <p class="alert alert-success" role="alert" v-if="uploadedMessage">
                        {{ uploadedMessage }}
                    </p>

                    <vue-clip :on-sending="sending" :on-complete="complete" :options="options">
                        <template slot="clip-uploader-action">
                            <div class="mt-1">
                                <div class="dz-message p-1" :style="{ cursor: 'pointer' }">
                                    <p class="btn btn-primary text-center">Update Featured Image</p>
                                </div>
                            </div>
                        </template>
                    </vue-clip>
                </div>
            </div>
        </div>
    </layout>
</template>

<script>
    import Layout from "../layouts/Layout";
    import api from '../api/products';
    import typeApi from '../api/product_types';

    export default {
        name: `AdminProductEdit`,
        components: {
            Layout,
        },
        data() {
            return {
                message: null,
                uploadedMessage: null,
                loaded: false,
                saving: false,
                product: {
                    id: null,
                    product_type_id: null,
                    name: ``,
                    side_one_max: ``,
                    side_two_max: ``,
                    description: ``,
                    notes: ``,
                    active: null,
                    featured: null
                },
                options: {
                    url: `/api/products/featured`,
                    paramName: 'file',
                    headers: window.axios.defaults.headers.common
                },
                pTypes: null
            };
        },
        methods: {
            setLayout(layout) {
                this.$store.commit('SET_LAYOUT', layout);
            },
            onSubmit(event) {
                this.saving = true;

                api.update(this.product.id, {
                    product_type_id: this.product.product_type_id,
                    name: this.product.name,
                    side_one_max: this.product.side_one_max,
                    side_two_max: this.product.side_two_max,
                    description: this.product.description,
                    notes: this.product.notes,
                    active: this.product.active,
                }).then((response) => {
                    this.message = `Product updated.`;

                    this.product = response.data.data;
                }).catch(error => {
                    this.message = error;
                }).then(_ => this.saving = false);
            },
            onDelete() {
                this.saving = true;

                api.delete(this.product.id)
                    .then((response) => {
                        this.$router.push({ name: 'product.list' });
                    });
            },
            sending(file, xhr, formData) {
                formData.append('fileable_id', this.product.id);

                this.uploadedMessage = null;
            },
            complete (file, status, xhr) {
                this.message = xhr.response.message;

                this.product.featured = { filename: file.dataUrl };
                this.uploadedMessage = `Updated Featured Image.`;
            }
        },
        created() {
            api.find(this.$route.params.id)
                .then((response) => {
                    this.loaded = true;
                    this.product = response.data.data;
                })
                .catch((err) => {
                    console.log(err);
                    this.$router.push({ name: '404' });
                });

            typeApi.find(this.$route.params.id)
                .then((response) => {
                    this.loaded = true;
                    this.product = response.data.data;
                })
                .catch((err) => {
                    console.log(err);
                    this.$router.push({ name: '404' });
                });
        }
    };
</script>