<template>
    <section class="products-wrapper">
        <div class="alert alert-danger" role="alert" v-if="error">
            {{ error }}
        </div>

        <div class="form-group" v-if="!error">
            <label for="product_type">Product Type</label>
            <select class="form-control" name="product_type" id="product_type" v-model="product_type" @change="showProducts">
                <option :value="null" disabled selected>Select Type</option>
                <option v-for="option in product_types" v-bind:value="option.id">{{ option.name }}</option>
            </select>
        </div>

        <div class="form-group" v-if="products">
            <label for="product">Products</label>
            <select class="form-control" name="product" id="product">
                <option :value="null" disabled selected>Select Product</option>
                <option v-for="product in products" v-bind:value="product.id">{{ product.name }}</option>
            </select>
        </div>
    </section>
</template>

<script>
    import Layout from '../layouts/Layout';
    import axios from 'axios';
    import api from '../api/products';

    const getProductTypes = (callback) => {
        axios
            .get('/api/product-types')
            .then(response => {
                callback(null, response.data);
            }).catch(error => {
                callback(error, error.response.data);
            });
    };

    export default {
        name: `Home`,
        components: {
            Layout,
        },
        data() {
            return {
                product_type: null,
                product: null,
                product_types: this.loadProductTypes(),
                products: null,
                error: null,
            };
        },
        methods: {
            setLayout(layout) {
                this.$store.commit('SET_LAYOUT', layout);
            },
            loadProductTypes() {
                this.product_types = getProductTypes((err, data) => {
                    this.setTypeList(err, data);
                });
            },
            setTypeList(err, { data: types }) {
                if (err) {
                    this.error = err.toString();
                } else {
                    this.product_types = types;
                }
            },
            showProducts() {
                this.products = null;
                this.loadProducts(this.product_type);
            },
            loadProducts(product_type_id) {
                api.find(product_type_id)
                .then((response) => {
                    this.products = response.data;
                })
                .catch((err) => {
                    this.error = err.toString();
                });
            }
        }
    }
</script>