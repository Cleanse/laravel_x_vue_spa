<template>
    <layout name="Dashboard">
        <div class="col-md-9 ml-sm-auto col-lg-10 px-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
                <h1>Create an Administrator</h1>
            </div>

            <form @submit.prevent="onSubmit($event)">
                <div class="form-group">
                    <label for="user_name">Name</label>
                    <input class="form-control" id="user_name" v-model="user.name" />
                </div>
                <div class="form-group">
                    <label for="user_email">Email</label>
                    <input class="form-control" id="user_email" type="email" v-model="user.email" />
                </div>
                <div class="form-group">
                    <label for="user_password">Password</label>
                    <input class="form-control" id="user_password" type="password" v-model="user.password" />
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary" :disabled="saving">
                        {{ saving ? 'Creating...' : 'Create' }}
                    </button>
                </div>
            </form>
        </div>
    </layout>
</template>

<script>
    import Layout from '../layouts/Layout';
    import api from '../api/users';

    export default {
        name: `UsersCreate`,
        components: {
            Layout,
        },
        data() {
            return {
                saving: false,
                message: false,
                user: {
                    name: '',
                    email: '',
                    password: '',
                }
            }
        },
        methods: {
            setLayout(layout) {
                this.$store.commit('SET_LAYOUT', layout);
            },
            onSubmit($event) {
                this.saving = true
                this.message = false
                api.create(this.user)
                    .then((response) => {
                        this.$router.push({ name: 'users.edit', params: { id: response.data.data.id } });
                    })
                    .catch((e) => {
                        this.message = e.response.data.message || 'There was an issue creating the user.';
                    })
                    .then(() => this.saving = false)
            }
        }
    }
</script>