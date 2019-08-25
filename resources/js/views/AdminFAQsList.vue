<template>
    <layout name="Dashboard">
        <div class="col-md-9 ml-sm-auto col-lg-10 px-4">
            <div v-if="error" class="alert alert-danger" role="alert">
                <p>{{ error }}</p>
            </div>

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
                            <th>Subject</th>
                            <th>Answer</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody v-if="faqs">
                        <tr v-for="{ id, subj, answer, active, created_at } in faqs">
                            <td>{{ created_at }}</td>
                            <td>
                                <router-link class="nav-link" active-class="active" :to="{ name: 'admin.faq' }">
                                    {{ id }}
                                </router-link>
                            </td>
                            <td>{{ subj }}</td>
                            <td>{{ answer }}</td>
                            <td>{{ status }}</td>
                        </tr>
                        </tbody>
                    </table>

                    <div class="pagination">
                        <button :disabled="! prevPage" @click.prevent="goToPrev">Previous</button>
                        {{ paginatonCount }}
                        <button :disabled="! nextPage" @click.prevent="goToNext">Next</button>
                    </div>

                    <div>
                        <router-link :to="{ name: 'faqs.create' }">Add New FAQ</router-link>
                    </div>
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
                faqs: null,
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
        computed: {
            nextPage() {
                if (! this.meta || this.meta.current_page === this.meta.last_page) {
                    return;
                }
                return this.meta.current_page + 1;
            },
            prevPage() {
                if (! this.meta || this.meta.current_page === 1) {
                    return;
                }
                return this.meta.current_page - 1;
            },
            paginatonCount() {
                if (!this.meta) {
                    return;
                }
                const { current_page, last_page } = this.meta;
                return `${current_page} of ${last_page}`;
            },
        },
        beforeRouteEnter (to, from, next) {
            getFAQs(to.query.page, (err, data) => {
                next(vm => vm.setData(err, data));
            });
        },
        beforeRouteUpdate (to, from, next) {
            this.faqs = this.links = this.meta = null;

            getFAQs(to.query.page, (err, data) => {
                this.setData(err, data);
                next();
            });
        },
        methods: {
            setLayout(layout) {
                this.$store.commit('SET_LAYOUT', layout);
            },
            goToNext() {
                this.$router.push({
                    query: {
                        page: this.nextPage,
                    },
                });
            },
            goToPrev() {
                this.$router.push({
                    name: 'admin.faqs-list',
                    query: {
                        page: this.prevPage,
                    }
                });
            },
            setData(err, { data: faqs, links, meta }) {
                if (err) {
                    this.error = err.toString();
                } else {
                    this.faqs = faqs;
                    this.links = links;
                    this.meta = meta;
                }
            },
        }
    }
</script>