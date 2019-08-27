<template>
    <layout name="Frontend">
        <div class="contact-wrapper">
            <h1>Records and Templates</h1>
            <div class="row mb-3">
                <div class="col-md-6">
                    Bye
                </div>

                <div class="col-md-6">
                    Hi
                </div>
            </div>
        </div>
    </layout>
</template>

<script>
    import Layout from '../layouts/Layout';

    export default {
        name: `Records`,
        components: {
            Layout,
        },
        methods: {
            setLayout(layout) {
                this.$store.commit('SET_LAYOUT', layout);
            },
        }
    };
</script>