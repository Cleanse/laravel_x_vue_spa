<template>
    <layout name="Dashboard">
        <div class="col-md-9 ml-sm-auto col-lg-10 px-4">
            <div class="pt-3 pb-2 mb-3">
                <h1>Edit {{ user.name }}</h1>
                <router-link class="small" to="/lg/users">
                    &larr; To Admin List</router-link>
            </div>

            <div v-if="message" class="alert alert-danger" role="alert">
                <p>{{ message }}</p>
            </div>

            <div v-if="!loaded">Loading...</div>
            <form @submit.prevent="onSubmit($event)" v-else>
                <div class="form-group">
                    <label for="user_name">Name</label>
                    <input class="form-control" id="user_name" v-model="user.name" />
                </div>
                <div class="form-group">
                    <label for="user_email">Email</label>
                    <input class="form-control" id="user_email" type="email" v-model="user.email" />
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary" :disabled="saving">Update</button>
                    <button class="btn btn-outline-danger" :disabled="saving" @click.prevent="onDelete($event)">Delete</button>
                    <button class="btn btn-danger" :disabled="saving" disabled>Mail Password Reset</button>
                </div>
            </form>
        </div>
    </layout>
</template>

<script>
    import api from '../api/users';
    import Layout from "../layouts/Layout";

    export default {
        name: `UsersEdit`,
        components: {
            Layout
        },
        data() {
            return {
                message: null,
                loaded: false,
                saving: false,
                user: {
                    id: null,
                    name: ``,
                    email: ``
                }
            };
        },
        methods: {
            setLayout(layout) {
                this.$store.commit('SET_LAYOUT', layout);
            },
            onSubmit(event) {
                this.saving = true;

                api.update(this.user.id, {
                    name: this.user.name,
                    email: this.user.email,
                }).then((response) => {
                    this.message = `User updated`;
                    setTimeout(() => this.message = null, 1500);
                    this.user = response.data.data;
                }).catch(error => {
                    console.log(error)
                }).then(_ => this.saving = false);
            },
            onDelete() {
                this.saving = true;

                api.delete(this.user.id)
                    .then((response) => {
                        this.$router.push({ name: 'users.index' });
                    });
            }
        },
        created() {
            api.find(this.$route.params.id)
                .then((response) => {
                    this.loaded = true;
                    this.user = response.data.data;
                })
                .catch((err) => {
                    this.$router.push({ name: '404' });
                });
        }
    };
</script>