<template>
    <layout name="Dashboard">
        <div class="col-md-9 ml-sm-auto col-lg-10 px-4">
            <div class="pt-3 pb-2 mb-3 border-bottom">
                <h1>Lock Grooves Dashboard</h1>
            </div>

            <section class="latest-orders">
                <p class="lead">The Dashboard is under construction.</p>
            </section>
        </div>
    </layout>
</template>

<script>
    import Layout from '../layouts/Layout';

    export default {
        name: `AdminIndex`,
        components: {
            Layout,
        },
        methods: {
            setLayout (layout) {
                this.$store.commit('SET_LAYOUT', layout);
            }
        }
    }
</script>