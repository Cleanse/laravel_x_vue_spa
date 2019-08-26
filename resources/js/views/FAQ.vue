<template>
    <layout name="Frontend">
        <div class="faq-wrapper mb-5">
            <div v-if="error" class="alert alert-danger" role="alert">
                <p>{{ error }}</p>
            </div>

            <div v-if="faqs">
                <div v-for="{ id, subj, answer } in faqs" class="faq-container">
                    <h3>{{ subj }}</h3>
                    <nl2br tag="p" :text="answer" />
                </div>
            </div>
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