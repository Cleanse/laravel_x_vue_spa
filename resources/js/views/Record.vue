<template>
    <layout name="Frontend">
        <div class="contact-wrapper">
            <h1>{{ product.name }}</h1>
            <div class="row mb-3">
                <div class="col-md-6">
                    <img :src="product.featured.filename" :alt="`${product.name} image preview.`"
                         v-if="product.featured">

                    <div class="variant-wrapper" v-if="product.variants">
                        <h5>Colors Available:</h5>
                        <ul>
                            <li v-for="variant in product.variants">
                                {{ variant.name }}
                            </li>
                        </ul>
                    </div>

                    <ul v-if="product.products">
                        <li v-for="prod in product.products">
                            {{ prod.name }}
                            {{ prod.side_one_max }} {{ prod.side_two_max }}
                        </li>
                    </ul>

                    <p v-if="product.description">{{ product.description }}</p>

                    <p v-if="product.notes">NOTE: {{ product.notes }}</p>
                </div>

                <div class="col-md-6">
                    <h3>Examples</h3>
                    <ul v-if="product.products">
                        <li v-for="example in product.products">
                            <img :src="example.featured.filename" :alt="`${example.name} example image.`"
                                 v-if="example.featured">
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </layout>
</template>

<script>
    import Layout from '../layouts/Layout';
    import api from '../api/product_types';

    export default {
        name: `Record`,
        components: {
            Layout,
        },
        data() {
            return {
                message: null,
                loaded: false,
                saving: false,
                product: {
                    id: null,
                    name: ``,
                    description: ``,
                    notes: ``
                },
            };
        },
        methods: {
            setLayout(layout) {
                this.$store.commit('SET_LAYOUT', layout);
            },
        },
        created() {
            api.find(this.$route.params.id)
                .then((response) => {
                    this.loaded = true;
                    this.product = response.data.data;
                })
                .catch((err) => {
                    this.$router.push({ name: '404' });
                });
        }
    };
</script>