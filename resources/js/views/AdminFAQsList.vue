<template>
    <layout name="Dashboard">
        <div class="col-md-9 ml-sm-auto col-lg-10 px-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1>Frequently Asked Questions</h1>
            </div>

            <section class="latest-orders">
                <h2>List of FAQs</h2>
                <div class="table-responsive admin-table">
                    <table class="table table-striped table-sm">
                        <thead>
                        <tr>
                            <th>Date</th>
                            <th>Order Number</th>
                            <th>Customer</th>
                            <th>Price</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody v-if="faqs">
                        <tr v-for="{ id, subj, answer, created_at } in faqs">
                            <td>{{ created_at }}</td>
                            <td>
                                <router-link class="nav-link" active-class="active" :to="{ name: 'admin.faq' }">
                                    {{ id }}
                                </router-link>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
    </layout>
</template>

<script>
    import Layout from '../layouts/Layout';
    import axios from 'axios';

    const getFAQs = (page, callback) => {
        const params = { page };

        axios
            .get('/api/faqs', { params })
            .then(response => {
                callback(null, response.data);
            }).catch(error => {
            callback(error, error.response.data);
        });
    };

    export default {
        name: `AdminFAQsList`,
        components: {
            Layout,
        },
        data() {
            return {
                faqs:  this.loadFAQs(),
                meta: null,
                links: {
                    first: null,
                    last: null,
                    next: null,
                    prev: null,
                },
                error: null,
            };
        },
        methods: {
            setLayout(layout) {
                this.$store.commit('SET_LAYOUT', layout);
            },
            loadFAQs() {

            },
            setTypeList(err, { data: types }) {
                if (err) {
                    this.error = err.toString();
                } else {
                    this.product_types = types;
                }
            },
        }
    }
</script>