<template>
    <layout name="Dashboard">
        <div class="col-md-9 ml-sm-auto col-lg-10 px-4">
            <div class="pt-3 pb-2 mb-3">
                <h1>Create New Template</h1>
            </div>

            <div v-if="message" class="alert alert-danger" role="alert">
                <p>{{ message }}</p>
            </div>

            <form @submit.prevent="onSubmit($event)">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input class="form-control" id="name" v-model="tpl.name">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" v-model="tpl.description"></textarea>
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
    import api from '../api/templates';

    export default {
        name: `AdminTemplateCreate`,
        components: {
            Layout,
        },
        data() {
            return {
                saving: false,
                message: false,
                tpl: {
                    name: ``,
                    description: ``
                }
            }
        },
        methods: {
            setLayout(layout) {
                this.$store.commit('SET_LAYOUT', layout);
            },
            onSubmit($event) {
                this.saving = true;
                this.message = false;

                api.create(this.tpl)
                    .then((response) => {
                        this.$router.push({ name: 'templates.edit', params: { id: response.data.data.id } });
                    })
                    .catch((e) => {
                        this.message = e.response.data.message || `There was an issue creating the new Template.`;
                    })
                    .then(() => this.saving = false)
            }
        }
    }
</script>