<template>
    <layout name="Frontend">
        <div class="faq-wrapper mb-5">
            <h1>Frequently Asked Questions</h1>

            <div v-if="error" class="alert alert-danger" role="alert">
                <p>{{ error }}</p>
            </div>

            <div v-if="faqs" class="mt-3">
                <div v-for="{ id, subj, answer } in faqs" class="faq-container">
                    <h5>{{ subj }}</h5>
                    <nl2br tag="p" :text="answer"></nl2br>
                </div>
            </div>

            <p class="lead alert alert-dark" role="alert">
                If your question was not answered above, please feel free to contact us:
                <a href="mailto:lockgrooves.az@gmail.com">lockgrooves.az@gmail.com</a>.
            </p>
        </div>
    </layout>
</template>

<script>
    import Layout from '../layouts/Layout';
    import axios from 'axios';

    const getFAQs = (callback) => {
        axios
            .get('/api/faqs/display')
            .then(response => {
                callback(null, response.data);
            }).catch(error => {
                callback(error, error.response.data);
        });
    };

    export default {
        name: `FAQ`,
        components: {
            Layout,
        },
        data() {
            return {
                faqs: this.loadFAQs(),
                error: null,
            };
        },
        methods: {
            setLayout(layout) {
                this.$store.commit('SET_LAYOUT', layout);
            },
            loadFAQs() {
                this.faqs = getFAQs((err, data) => {
                    this.setFAQs(err, data);
                });
            },
            setFAQs(err, { data: faqs }) {
                if (err) {
                    this.error = err.toString();
                } else {
                    this.faqs = faqs;
                }
            },
        }
    }
</script>