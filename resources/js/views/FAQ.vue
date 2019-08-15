<template>
    <div class="faq-wrapper">
        <div v-if="error" class="error">
            <p>{{ error }}</p>
        </div>

        <ul v-if="faqs">
            <li v-for="{ id, subj, answer } in faqs" class="faq-container">
                <h3>{{ subj }}</h3>
                <p>{{ answer }}</p>
            </li>
        </ul>
    </div>
</template>

<script>
    import axios from 'axios';

    const getFAQs = (page, callback) => {
        const params = { page };

        axios
            .get('/api/faqs', { params })
            .then(response => {
                callback(null, response);
            }).catch(error => {
                callback(error, error.response.data);
        });
    };

    export default {
        data() {
            return {
                faqs: null,
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
                if (! this.meta) {
                    return;
                }

                const { current_page, last_page } = this.meta;
                return `${current_page} of ${last_page}`;
            },
        },
        beforeRouteEnter (to, from, next) {
            getFAQs(to.query.page, (err, data) => {
                next(vm => vm.setData(err, data));
            });
        },
        // when route changes and this component is already rendered,
        // the logic will be slightly different.
        beforeRouteUpdate (to, from, next) {
            this.faqs = this.links = this.meta = null
            getFAQs(to.query.page, (err, data) => {
                this.setData(err, data);
                next();
            });
        },
        methods: {
            goToNext() {
                this.$router.push({
                    query: {
                        page: this.nextPage,
                    },
                });
            },
            goToPrev() {
                this.$router.push({
                    name: 'faq',
                    query: {
                        page: this.prevPage,
                    }
                });
            },
            setData(err, { data: faqs, links, meta }) {
                if (err) {
                    this.error = err.toString();
                } else {
                    this.faqs = faqs;
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