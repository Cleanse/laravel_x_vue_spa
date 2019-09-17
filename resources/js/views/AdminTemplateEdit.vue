<template>
    <layout name="Dashboard">
        <div class="col-md-9 ml-sm-auto col-lg-10 px-4">
            <div class="pt-3 pb-2 mb-3">
                <h1><span class="text-primary">Edit</span> {{ template.name }}</h1>
                <router-link class="small" to="/lg/templates">
                    &larr; To Templates List</router-link>
            </div>

            <div v-if="message" class="alert alert-warning" role="alert">
                <span>{{ message }}</span>
            </div>

            <div class="row">
                <div class="col-md-8">
                    <div v-if="!loaded">Loading...</div>
                    <form @submit.prevent="onSubmit($event)" v-else>
                        <div class="form-group">
                            <label for="name">Template Name</label>
                            <input class="form-control" id="name" v-model="template.name">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" v-model="template.description"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="active">Display on Website?</label>
                            <select id="active" class="form-control" v-model="template.active">
                                <option selected>Choose...</option>
                                <option value="0">Hide</option>
                                <option value="1">Display</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary" :disabled="saving">Update</button>
                            <button class="btn btn-outline-danger" :disabled="saving" @click.prevent="onDelete($event)">Delete</button>
                        </div>
                    </form>
                </div>

                <div class="col-md-4">
                    <div class="list-group">
                        <div class="list-group-item" v-if="template.image">
                            <img :src="`/${template.image}`">
                        </div>
                    </div>

                    <vue-clip :on-sending="sending" :options="options">
                        <template slot="clip-uploader-action">
                            <div>
                                <div class="dz-message" :style="{ cursor: 'pointer' }">
                                    <h4> Click or Drag and Drop files here upload </h4>
                                </div>
                            </div>
                        </template>

                        <template v-slot:clip-uploader-body="props">
                            <div v-for="file in props.files">
                                <img v-bind:src="file.dataUrl" />
                                {{ file.name }} {{ file.status }}
                            </div>
                        </template>
                    </vue-clip>
                </div>
            </div>
        </div>
    </layout>
</template>

<script>
    import api from '../api/templates';
    import Layout from "../layouts/Layout";

    export default {
        name: `AdminTemplateEdit`,
        components: {
            Layout,
        },
        data() {
            return {
                message: null,
                loaded: false,
                saving: false,
                template: {
                    id: null,
                    name: ``,
                    description: ``,
                    active: null
                },
                options: {
                    url: `/api/templates/upload`,
                    paramName: 'file',
                    headers: window.axios.defaults.headers.common
                }
            };
        },
        methods: {
            setLayout(layout) {
                this.$store.commit('SET_LAYOUT', layout);
            },
            onSubmit(event) {
                this.saving = true;

                api.update(this.template.id, {
                    name: this.template.name,
                    description: this.template.description,
                    active: this.template.active,
                }).then((response) => {
                    this.message = `Product Type updated.`;

                    this.template = response.data.data;
                }).catch(error => {
                    this.message = error;
                }).then(_ => this.saving = false);
            },
            onDelete() {
                this.saving = true;

                api.delete(this.template.id)
                    .then((response) => {
                        this.$router.push({ name: 'templates.list' });
                    });
            },
            sending(file, xhr, formData) {
                formData.append('fileable_id', this.template.id);
            }
        },
        created() {
            api.find(this.$route.params.id)
                .then((response) => {
                    this.loaded = true;
                    this.template = response.data.data;
                })
                .catch((err) => {
                    this.$router.push({ name: '404' });
                });
        }
    };
</script>