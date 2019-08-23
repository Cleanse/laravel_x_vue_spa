<template>
    <layout name="Dashboard">
        <div class="col-md-9 ml-sm-auto col-lg-10 px-4"><div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1>Lock Grooves Dashboard</h1>
            </div>

            <section class="latest-orders">
                <h2>Latest Orders</h2>
                <div class="table-responsive admin-table">
                    <table class="table table-striped table-sm">
                        <thead>
                        <tr>
                            <th>Date</th>
                            <th>Order Number</th>
                            <th>Customer</th>
                            <th>Price</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>2019-07-25 09:45:38</td>
                            <td><a href="/lg/order/1001">1001</a></td>
                            <td>Leo Lovato</td>
                            <td>$33.33</td>
                            <td>Unfulfilled</td>
                        </tr>
                        <tr>
                            <td>2019-07-25 09:45:38</td>
                            <td><a href="/lg/order/1001">1001</a></td>
                            <td>Leo Lovato</td>
                            <td>$33.33</td>
                            <td>Unfulfilled</td>
                        </tr>
                        <tr>
                            <td>2019-07-25 09:45:38</td>
                            <td><a href="/lg/order/1001">1001</a></td>
                            <td>Leo Lovato</td>
                            <td>$33.33</td>
                            <td>Unfulfilled</td>
                        </tr>
                        <tr>
                            <td>2019-07-25 09:45:38</td>
                            <td><a href="/lg/order/1001">1001</a></td>
                            <td>Leo Lovato</td>
                            <td>$33.33</td>
                            <td>Unfulfilled</td>
                        </tr>
                        <tr>
                            <td>2019-07-25 09:45:38</td>
                            <td><a href="/lg/order/1001">1001</a></td>
                            <td>Leo Lovato</td>
                            <td>$33.33</td>
                            <td>Unfulfilled</td>
                        </tr>
                        <tr>
                            <td>2019-07-25 09:45:38</td>
                            <td><a href="/lg/order/1001">1001</a></td>
                            <td>Leo Lovato</td>
                            <td>$33.33</td>
                            <td>Unfulfilled</td>
                        </tr>
                        <tr>
                            <td>2019-07-25 09:45:38</td>
                            <td><a href="/lg/order/1001">1001</a></td>
                            <td>Leo Lovato</td>
                            <td>$33.33</td>
                            <td>Unfulfilled</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
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