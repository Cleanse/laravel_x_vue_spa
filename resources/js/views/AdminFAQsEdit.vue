<template>
    <layout name="Dashboard">
        <div class="col-md-9 ml-sm-auto col-lg-10 px-4">
            <div class="pt-3 pb-2 mb-3">
                <h1>Edit {{ faq.subj }}</h1>
                <router-link class="small" to="/lg/faqs">
                    &larr; To FAQs List</router-link>
            </div>

            <div v-if="message" class="alert alert-warning" role="alert">
                <span>{{ message }}</span>
            </div>

            <div v-if="!loaded">Loading...</div>
            <form @submit.prevent="onSubmit($event)" v-else>
                <div class="form-group">
                    <label for="subj">Subject</label>
                    <input class="form-control" id="subj" v-model="faq.subj">
                </div>
                <div class="form-group">
                    <label for="answer">Answer</label>
                    <textarea class="form-control" id="answer" v-model="faq.answer"></textarea>
                </div>
                <div class="form-group">
                    <label for="active">Display on Website?</label>
                    <select id="active" class="form-control" v-model="faq.active">
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
    </layout>
</template>

<script>
    import api from '../api/faqs';
    import Layout from "../layouts/Layout";

    export default {
        name: `AdminFAQsEdit`,
        components: {
            Layout
        },
        data() {
            return {
                message: null,
                loaded: false,
                saving: false,
                faq: {
                    id: null,
                    subj: ``,
                    answer: ``,
                    active: null
                },
            };
        },
        methods: {
            setLayout(layout) {
                this.$store.commit('SET_LAYOUT', layout);
            },
            onSubmit(event) {
                this.saving = true;

                api.update(this.faq.id, {
                    subj: this.faq.subj,
                    answer: this.faq.answer,
                    active: this.faq.active,
                }).then((response) => {
                    this.message = `FAQ updated`;

                    setTimeout(() => this.message = null, 1500);
                    this.faq = response.data.data;
                }).catch(error => {
                    this.message = error;
                }).then(_ => this.saving = false);
            },
            onDelete() {
                this.saving = true;

                api.delete(this.faq.id)
                    .then((response) => {
                        this.$router.push({ name: 'faqs.list' });
                    });
            }
        },
        created() {
            api.find(this.$route.params.id)
                .then((response) => {
                    this.loaded = true;
                    this.faq = response.data.data;
                })
                .catch((err) => {
                    this.$router.push({ name: '404' });
                });
        }
    };
</script>