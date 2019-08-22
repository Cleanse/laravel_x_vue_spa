<template>
    <layout name="Dashboard">
        <div class="dash">
            <h1>Dashboard</h1>
            <p>
                Eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam
                voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet
                clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit
                amet.
            </p>

            <h2>Amet sit</h2>
            <p>
                Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy
                eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam
                voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet
                clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit
                voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet
                amet.
            </p>
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