<template>
    <layout name="Dashboard">
        <div class="col-md-9 ml-sm-auto col-lg-10 px-4">
            <h1>Create New FAQ</h1>
            <div v-if="error" class="alert alert-danger" role="alert">
                <p>{{ error }}</p>
            </div>

            <form @submit.prevent="onSubmit($event)">
                <div class="form-group">
                    <label for="subj">Subject</label>
                    <input class="form-control" id="subj" v-model="faq.subj">
                </div>
                <div class="form-group">
                    <label for="answer">Answer</label>
                    <textarea class="form-control" id="answer" v-model="faq.answer"></textarea>
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
    import api from '../api/faqs';

    export default {
        name: `AdminFAQsCreate`,
        components: {
            Layout,
        },
        data() {
            return {
                saving: false,
                message: false,
                faq: {
                    subj: ``,
                    answer: ``
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

                api.create(this.faq)
                    .then((response) => {
                        this.$router.push({ name: 'faqs.edit', params: { id: response.data.data.id } });
                    })
                    .catch((e) => {
                        this.message = e.response.data.message || `There was an issue creating the new FAQ.`;
                    })
                    .then(() => this.saving = false)
            }
        }
    }
</script>