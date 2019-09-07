<template>
    <layout name="Frontend">
        <div class="contact-wrapper mb-5">
            <h1>Record Types and Templates</h1>

            <div v-if="!records" class="alert alert-warning" role="alert">
                <span>{{ error }} Check back soon, or <router-link to="/contact">contact us</router-link>!</span>
            </div>

            <div v-if="records" class="row mb-3">
                <div class="col-md-8">
                    <div class="record-type-wrapper" v-for="record in records" v-bind:key="record.id">
                        <h3>{{ record.name }}</h3>
                        <img :src="record.image">
                    </div>
                </div>

                <div class="col-md-4">
                    <h3>Templates</h3>
                    <p>{ Template Component Goes Here }</p>
                </div>
            </div>
        </div>
    </layout>
</template>

<script>
    import Layout from '../layouts/Layout';
    import axios from 'axios';

    const getProductTypes = (callback) => {
        axios
            .get('/api/product-types/display')
            .then(response => {
                callback(null, response.data);
            }).catch(error => {
                callback(error, error.response.data);
        });
    };

    //Need a Templates Component

    export default {
        name: `Records`,
        components: {
            Layout,
        },
        data() {
            return {
                records: this.loadProductTypes(),
                error: `Our record supply is currently sold out!`
            };
        },
        methods: {
            setLayout(layout) {
                this.$store.commit('SET_LAYOUT', layout);
            },
            loadProductTypes() {
                this.records = getProductTypes((err, data) => {
                    this.setProductTypes(err, data);
                });
            },
            setProductTypes(err, { data: records }) {
                if (err) {
                    this.error = err.toString();
                } else {
                    this.records = records;
                }
            },
        }
    };
</script>