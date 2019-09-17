<template>
    <layout name="Frontend">
        <div class="contact-wrapper mb-5">
            <!-- todo: Set this into the header? Find a better way of h1'ing the layout. -->
            <h1>Record Types and Templates</h1>

            <div v-if="!records" class="alert alert-warning" role="alert">
                <span>{{ error }} Check back soon, or <router-link to="/contact">contact us</router-link>!</span>
            </div>

            <!-- todo: https://getbootstrap.com/docs/4.3/components/card/ -->

            <div v-if="records" class="row mb-3">
                <div class="col-md-8">
                    <h3>Records</h3>
                    <div class="card-deck">
                        <div class="card bg-dark text-white" v-for="record in records" v-bind:key="record.id">
                            <img :src="record.featured[0].name" class="card-img" alt="..." v-if="record.featured.length">
                            <div class="card-img-overlay">
                                <h5 class="card-title">{{ record.name }}</h5>
                                <p class="card-text">{{ record.description }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <h3>Templates</h3>
                    <div class="card bg-dark text-white" v-for="printable in printableTemplates" v-bind:key="printable.id">
                        <img :src="printable.image" class="card-img" alt="...">
                        <div class="card-img-overlay">
                            <h5 class="card-title">{{ printable.name }}</h5>
                            <p class="card-text">{{ printable.description }}</p>
                        </div>
                    </div>
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

    const getPrintableTemplates = (callback) => {
        axios
            .get('/api/templates/display')
            .then(response => {
                callback(null, response.data);
            }).catch(error => {
                callback(error, error.response.data);
        });
    };

    export default {
        name: `Records`,
        components: {
            Layout,
        },
        data() {
            return {
                records: this.loadProductTypes(),
                printableTemplates: this.loadPrintableTemplates(),
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
            loadPrintableTemplates() {
                this.printableTemplates = getPrintableTemplates((err, data) => {
                    this.setPrintableTemplates(err, data);
                });
            },
            setPrintableTemplates(err, { data: tpls }) {
                if (err) {
                    this.error = err.toString();
                } else {
                    this.printableTemplates = tpls;
                }
            }
        }
    };
</script>