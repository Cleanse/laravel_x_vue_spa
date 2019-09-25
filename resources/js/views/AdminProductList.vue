<template>
    <layout name="Dashboard">
        <div class="col-md-9 ml-sm-auto col-lg-10 px-4">
            <div class="pt-3 pb-2 mb-3">
                <h1>Products</h1>
            </div>

            <div v-if="error" class="alert alert-danger" role="alert">
                <p>{{ error }}</p>
            </div>

            <section class="products">
                <div class="mb-1">
                    <router-link :to="{ name: 'product.create' }" class="btn btn-success">Add New Product</router-link>
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
                        <tbody v-if="pts">
                        <router-link
                                v-for="{ id, name, active, created_at } in pts"
                                :key="id"
                                :to="{ name: 'product.edit', params: { id } }"
                                tag="tr">
                            <td>{{ created_at | formatDate }}</td>
                            <td>{{ name }}</td>
                            <td>{{ active ? `Active` : `Not Active` }}</td>
                        </router-link>
                        </tbody>
                    </table>

                    <nav aria-label="Product Pagination">
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

    const getProducts = (page, callback) => {
        const params = { page };

        axios
            .get('/api/products', { params })
            .then(response => {
                callback(null, response.data);
            }).catch(error => {
                callback(error, error.response.data);
        });
    };

    export default {
        name: `AdminProductList`,
        components: {
            Layout,
        },
        data() {
            return {
                pts: null,
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
            getProducts(to.query.page, (err, data) => {
                next(vm => vm.setData(err, data));
            });
        },
        beforeRouteUpdate (to, from, next) {
            this.pts = this.links = this.meta = null;

            getProducts(to.query.page, (err, data) => {
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
                    name: 'product.list',
                    query: {
                        page: this.prevPage,
                    }
                });
            },
            setData(err, { data: pts, links, meta }) {
                if (err) {
                    this.error = err.toString();
                } else {
                    this.pts = pts;
                    this.links = links;
                    this.meta = meta;
                }
            },
        }
    }
</script>