<template>
    <layout name="Dashboard">
        <div class="col-md-9 ml-sm-auto col-lg-10 px-4">
            <div class="pt-3 pb-2 mb-3">
                <h1>Manage Administrators</h1>
            </div>

            <div v-if="error" class="alert alert-danger" role="alert">
                <p>{{ error }}</p>
            </div>

            <section class="user-list">
                <div class="mb-1">
                    <router-link :to="{ name: 'users.create' }" class="btn btn-success">
                        Add New Administrator</router-link>
                </div>

                <ul class="list-group" v-if="users">
                    <router-link class="list-group-item list-group-item-action"
                                 v-for="{ id, name, email } in users"
                                 :key="id"
                                 :to="{ name: 'users.edit', params: { id } }"
                                 tag="li">
                        <strong>Name:</strong> {{ name }},
                        <strong>Email:</strong> {{ email }} |
                        <router-link :to="{ name: 'users.edit', params: { id } }">Edit</router-link>
                    </router-link>
                </ul>

                <nav aria-label="FAQ Pagination">
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
            </section>
        </div>
    </layout>
</template>

<script>
    import Layout from '../layouts/Layout';
    import axios from 'axios';

    const getUsers = (page, callback) => {
        const params = { page };

        axios
            .get('/api/users', { params })
            .then(response => {
                callback(null, response.data);
            }).catch(error => {
                callback(error, error.response.data);
        });
    };

    export default {
        name: `UsersList`,
        components: {
            Layout,
        },
        data() {
            return {
                users: null,
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
            getUsers(to.query.page, (err, data) => {
                next(vm => vm.setData(err, data));
            });
        },
        beforeRouteUpdate (to, from, next) {
            this.users = this.links = this.meta = null;

            getUsers(to.query.page, (err, data) => {
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
                    name: 'users.index',
                    query: {
                        page: this.prevPage,
                    }
                });
            },
            setData(err, { data: users, links, meta }) {
                if (err) {
                    this.error = err.toString();
                } else {
                    this.users = users;
                    this.links = links;
                    this.meta = meta;
                }
            },
        }
    }
</script>

<style lang="scss" scoped>
    $red: lighten(red, 30%);
    $darkRed: darken($red, 50%);
    .form-group label {
        display: block;
    }
    .alert {
        background: $red;
        color: $darkRed;
        padding: 1rem;
        margin-bottom: 1rem;
        width: 50%;
        border: 1px solid $darkRed;
        border-radius: 5px;
    }
</style>