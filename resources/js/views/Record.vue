<template>
    <layout name="Frontend">
        <div class="contact-wrapper">
            <h1>{ product_types:name }</h1>
            <div class="row mb-3">
                <div class="col-md-6">
                    <img src="{ product_types:feature_image }">

                    <p>Colors Available: { loop:product_type_variants:name }</p>

                    <ul>
                        <li>
                            { products:name }
                            { ?products:side_one_max } { ?products:side_two_max }
                        </li>
                    </ul>

                    <p>{ ?product_types:description }</p>

                    <p>NOTE: { ?product_types:notes }</p>
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

    export default {
        name: `Record`,
        components: {
            Layout,
        },
        methods: {
            setLayout(layout) {
                this.$store.commit('SET_LAYOUT', layout);
            },
        }
    };
</script>