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

        <main class="page-body">
            <div class="container-fluid">
                <div class="row">
                    <nav class="col-md-2 d-none d-md-block sidebar">
                        <div class="sidebar-sticky">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <router-link class="nav-link" active-class="active" to="/">
                                        &larr; To Frontend Index</router-link>
                                </li>

                                <li class="nav-item">
                                    <router-link class="nav-link" active-class="active" to="/lg">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                                        Dashboard
                                    </router-link>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path><polyline points="13 2 13 9 20 9"></polyline></svg>
                                        Orders
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                                        Customers
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <router-link class="nav-link" active-class="active" to="/lg/product-types">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
                                        Product Types
                                    </router-link>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
                                        Products
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layers"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg>
                                        Variants
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <router-link class="nav-link" active-class="active" to="/lg/templates">
                                        <svg width="24" height="24" focusable="false" data-prefix="fas" data-icon="compact-disc" class="svg-inline--fa fa-compact-disc fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 512"><path fill="currentColor" d="M248 8C111 8 0 119 0 256s111 248 248 248 248-111 248-248S385 8 248 8zM88 256H56c0-105.9 86.1-192 192-192v32c-88.2 0-160 71.8-160 160zm160 96c-53 0-96-43-96-96s43-96 96-96 96 43 96 96-43 96-96 96zm0-128c-17.7 0-32 14.3-32 32s14.3 32 32 32 32-14.3 32-32-14.3-32-32-32z"></path></svg>
                                        Templates
                                    </router-link>
                                </li>
                            </ul>
                            <hr>
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <router-link class="nav-link" active-class="active" to="/lg/users">
                                        Administrators
                                    </router-link>
                                </li>
                                <li class="nav-item">
                                    <router-link class="nav-link" active-class="active" to="/lg/faqs">
                                        FAQs
                                    </router-link>
                                </li>
                                <li class="nav-item">
                                    <router-link class="nav-link" active-class="active" to="/lg/settings">
                                        Settings
                                    </router-link>
                                </li>
                            </ul>
                        </div>
                    </nav>

                    <slot/>
                </div>
            </div>
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