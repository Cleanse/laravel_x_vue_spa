<template>
    <layout name="Frontend">
        <div class="row">
            <div class="col-md-6">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/8Hv_1lo492M"></iframe>
                </div>
            </div>

            <div class="col-md-6">
                <p class="lg-lead">
                    Welcome to Lockgrooves.com, home of short run (20 or more) lathe cut records. At Lock Grooves, we
                    manufacture custom handmade, limited edition records that are cut on polycarbonate (plexiglass) in a
                    variety of sizes and shapes. Every record is cut one by one in real time and is available to be cut on
                    circles, squares, picture disks and even special novelty products such as postcards and hybrid
                    CD-Records.
                </p>
            </div>
        </div>
    </layout>
</template>

<script>
    import Layout from '../layouts/Layout';

    export default {
        name: `Home`,
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