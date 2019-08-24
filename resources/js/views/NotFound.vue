<template>
    <layout name="Frontend">
        <div>
            <h2>Not Found</h2>
            <p>Woops! Looks like the page you requested cannot be found.</p>
        </div>
    </layout>
</template>

<script>
    import Layout from '../layouts/Layout';

    export default {
        name: `NotFound`,
        components: {
            Layout,
        },
        methods: {
            setLayout(layout) {
                this.$store.commit('SET_LAYOUT', layout);
            }
        }
    };
</script>