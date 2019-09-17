<template>
    <layout name="Frontend">
        <div class="contact-wrapper">
            <h1>{{ product.name }}</h1>
            <div class="row mb-3">
                <div class="col-md-6">
                    <img src="{ product_types:feature_image }">
                    <img :src="product.featured[0].name" class="card-img" :alt="`${product.name} image preview`"
                         v-if="product.featured.length">

                    <p>Colors Available: { loop:product_type_variants:name }</p>

                    <ul>
                        <li>
                            { products:name }
                            { ?products:side_one_max } { ?products:side_two_max }
                        </li>
                    </ul>

                    <p v-if="product.description">{{ product.description }}</p>

                    <p v-if="product.notes">NOTE: {{ product.notes }}</p>
                </div>

                <div class="col-md-6">
                    <h3>Examples</h3>
                    - { loop:product_type_examples:image_url }
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