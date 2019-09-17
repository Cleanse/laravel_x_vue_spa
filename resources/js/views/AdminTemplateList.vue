<template>
    <layout name="Dashboard">
        <div class="col-md-9 ml-sm-auto col-lg-10 px-4">
            <div class="pt-3 pb-2 mb-3">
                <h1>Templates</h1>
            </div>

            <div v-if="error" class="alert alert-danger" role="alert">
                <p>{{ error }}</p>
            </div>

            <section class="product-types">
                <div class="mb-1">
                    <router-link :to="{ name: 'templates.create' }" class="btn btn-success">Add New Template</router-link>
                </div>

                <div class="table-responsive admin-table">
                    <table class="table table-hover table-sm">
                        <thead>
                        <tr>
                            <th>Date Created</th>
                            <th>Name</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody v-if="templates">
                        <router-link
                                v-for="{ id, name, active, created_at } in templates"
                                :key="id"
                                :to="{ name: 'templates.edit', params: { id } }"
                                tag="tr">
                            <td>{{ created_at | formatDate }}</td>
                            <td>{{ name }}</td>
                            <td>{{ active ? `Active` : `Not Active` }}</td>
                        </router-link>
                        </tbody>
                    </table>

                    <nav aria-label="Product Type Pagination">
                        <ul class="pagination justify-content-end">
                            <li class="page-item active"><span class="page-link">Page {{ paginatonCount }}</span></li>
                            <li class="page-item">
                                <a class="page-link" :disabled="!prevPage" @click.prevent="goToPrev">
                                    Previous</a></li>
                            <li class="page-item">
                                <a class="page-link" :disabled="! nextPage" @click.prevent="goToNext">
                                    Next</a></li>
                        </ul>
                    </nav>
                </div>
            </section>
        </div>
    </layout>
</template>

<script>
    import Layout from '../layouts/Layout';
    import axios from 'axios';

    const getTemplates = (page, callback) => {
        const params = { page };

        axios
            .get('/api/templates', { params })
            .then(response => {
                callback(null, response.data);
            }).catch(error => {
                callback(error, error.response.data);
        });
    };

    export default {
        name: `AdminTemplateList`,
        components: {
            Layout,
        },
        data() {
            return {
                templates: null,
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
            getTemplates(to.query.page, (err, data) => {
                next(vm => vm.setData(err, data));
            });
        },
        beforeRouteUpdate (to, from, next) {
            this.templates = this.links = this.meta = null;

            getTemplates(to.query.page, (err, data) => {
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
                    name: 'templates.list',
                    query: {
                        page: this.prevPage,
                    }
                });
            },
            setData(err, { data: templates, links, meta }) {
                if (err) {
                    this.error = err.toString();
                } else {
                    this.templates = templates;
                    this.links = links;
                    this.meta = meta;
                }
            },
        }
    }
</script>