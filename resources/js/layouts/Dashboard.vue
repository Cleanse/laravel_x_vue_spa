<template>
    <div class="content-wrapper">
        <header class="page-header admin-header">
            <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
                <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">LockGrooves Dashboard</a>

                <ul class="navbar-nav px-3">
                    <li class="nav-item text-nowrap">
                        <a class="nav-link" href="#">Sign out</a>
                    </li>
                </ul>
            </nav>
        </header>

        <main>
            <slot/>
        </main>

        <footer class="page-footer">
            <p class="text-center">
                &copy; 2015-{{ currentYear }} <a class="footer-copy" href="/" title="Home">Lock Grooves</a>
            </p>

            <a title="Email Us" href="/faq.php#emailus"><i class="fa fa-fw fa-2x fa-envelope"></i></a>
            <a title="Follow Us On Facebook" href="//www.facebook.com/lathecuts" target="_blank"><i
                    class="fa fa-fw fa-2x fa-facebook"></i></a>
            <a title="Follow Us On Instagram" href="//www.instagram.com/lathecuts" target="_blank"><i
                    class="fa fa-fw fa-2x fa-instagram"></i></a>
            <a title="Follow Us On Twitter" href="//www.twitter.com/lathecuts" target="_blank"><i
                    class="fa fa-fw fa-2x fa-twitter"></i></a>
            <a title="Follow Us On Flickr" href="//www.flickr.com/photos/97318420@N07" target="_blank"><i
                    class="fa fa-fw fa-2x fa-flickr"></i></a>
        </footer>
    </div>
</template>

<script>
    export default {
        name: `Dashboard`,
        data() {
            return {
                currentYear: new Date().getFullYear()
            };
        }
    };
</script>