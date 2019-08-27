<template>
    <layout name="Frontend">
        <div class="contact-wrapper" itemscope itemtype="http://schema.org/LocalBusiness">
            <h1 itemprop="name">Lock Grooves</h1>
            <div class="row mb-3">
                <div class="col-md-6">
                    <p>
                        4 E University Blvd<br>
                        Tucson AZ 85705
                    </p>
                    <p>
                        Phone:
                        <span itemprop="telephone">
                            <a href="tel:+15202602827">(520) 260-2827</a>
                        </span>
                    </p>
                    <p>Email: <a href="mailto:lockgrooves.az@gmail.com">
                        lockgrooves.az@gmail.com</a>
                    </p>
                </div>

                <div class="col-md-6">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d27004.51857827328!2d-110.980468!3d32.215955!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x86d67118533b03b3%3A0x462c4dd632520d2a!2s4%20E%20University%20Blvd%2C%20Tucson%2C%20AZ%2085705!5e0!3m2!1sen!2sus!4v1566918451549!5m2!1sen!2sus" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                </div>
            </div>
        </div>
    </layout>
</template>

<script>
    import Layout from '../layouts/Layout';

    export default {
        name: `Contact`,
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