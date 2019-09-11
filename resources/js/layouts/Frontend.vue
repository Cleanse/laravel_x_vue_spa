<template>
    <div class="content-wrapper">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <router-link :to="{ name: 'home' }" class="navbar-brand">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="isolation:isolate" viewBox="0 0 256 256"><defs><clipPath id="_clipPath_avDTrgPEWFZ0xLncyu9I7iYw8pvLfXLU"><rect width="256" height="256"/></clipPath></defs><g clip-path="url(#_clipPath_avDTrgPEWFZ0xLncyu9I7iYw8pvLfXLU)"><g><path d=" M 185.78 100.084 C 178.817 75.733 154.164 41.654 105.277 41.654 C 55.325 41.654 6.022 81.074 6.597 139.037 C 7.172 197 59.508 252 127.351 252 C 195.194 252 252 197.628 252 123.455 C 252 49.283 176.529 4 131.246 4 C 85.963 4 18.77 32.079 4 114.366 C 19.816 58.153 67.924 36.461 106.576 36.461 C 145.228 36.461 194.869 65.422 194.869 123.455 C 194.869 166.791 162.675 193.571 127.351 193.571 C 88.187 193.571 61.371 159.75 62.429 128.649 C 63.488 97.548 84.484 63.728 127.351 63.728 C 151.356 63.728 171.554 73.493 185.78 100.084 Z " fill="rgb(0,0,0)"/><path d=" M 68.921 128 C 68.921 95.394 95.394 68.921 128 68.921 C 160.606 68.921 187.079 95.394 187.079 128 C 187.079 160.606 160.606 187.079 128 187.079 C 95.394 187.079 68.921 160.606 68.921 128 Z  M 116.963 142.932 C 119.662 145.458 119.698 163.841 119.56 166.304 C 119.422 168.767 119.559 173.317 124.754 172.796 C 129.949 172.274 129.42 165.301 129.948 155.916 C 130.218 151.109 134.259 145.492 137.738 144.23 C 139.239 143.686 140.838 143.8 144.23 142.932 C 147.411 142.118 149.51 122.813 149.424 118.262 C 149.288 111.028 141.066 110.685 139.037 119.56 C 138.301 122.777 138.782 130.212 136.44 129.948 C 133.536 129.62 136.756 110.984 137.738 102.681 C 138.44 96.754 136.042 91.501 131.246 90.995 C 124.933 90.328 123.45 97.579 122.157 101.382 C 120.864 105.186 121.996 127.471 119.56 128.649 C 116.955 129.909 115.512 128.412 115.665 122.157 C 115.818 115.902 117.445 112.503 116.963 109.173 C 116.058 102.92 107.438 104.324 106.576 109.173 C 105.739 113.882 105.096 123.474 105.277 131.246 C 105.502 140.845 114.264 140.406 116.963 142.932 Z " fill-rule="evenodd" fill="rgb(0,0,0)"/></g></g></svg>
                </router-link>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav mr-auto">
                        <router-link :to="{ name: 'home' }" class="nav-item nav-link">Home</router-link>
                        <router-link :to="{ name: 'faq' }" class="nav-item nav-link">FAQ</router-link>
                        <router-link :to="{ name: 'records' }" class="nav-item nav-link">Records</router-link>
                        <router-link :to="{ name: 'contact' }" class="nav-item nav-link">Contact Us</router-link>
                        <div class="form-inline">
                            <router-link :to="{ name: 'products.index' }" class="btn btn-sm btn-primary">Order</router-link>
                        </div>
                    </div>

                    <div class="navbar-nav">
                        <a title="Email Us" href="mailto:lockgrooves.az@gmail.com" class="d-inline-block mr-3">
                            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="envelope" class="svg-inline--fa fa-envelope fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M502.3 190.8c3.9-3.1 9.7-.2 9.7 4.7V400c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V195.6c0-5 5.7-7.8 9.7-4.7 22.4 17.4 52.1 39.5 154.1 113.6 21.1 15.4 56.7 47.8 92.2 47.6 35.7.3 72-32.8 92.3-47.6 102-74.1 131.6-96.3 154-113.7zM256 320c23.2.4 56.6-29.2 73.4-41.4 132.7-96.3 142.8-104.7 173.4-128.7 5.8-4.5 9.2-11.5 9.2-18.9v-19c0-26.5-21.5-48-48-48H48C21.5 64 0 85.5 0 112v19c0 7.4 3.4 14.3 9.2 18.9 30.6 23.9 40.7 32.4 173.4 128.7 16.8 12.2 50.2 41.8 73.4 41.4z"></path></svg>
                        </a>

                        <a title="Follow Us On Facebook" href="//www.facebook.com/lockgrooves" target="_blank" class="d-inline-block mr-3">
                            <svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="facebook-f" class="svg-inline--fa fa-facebook-f fa-w-10" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path fill="currentColor" d="M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z"></path></svg>
                        </a>

                        <a href="//www.instagram.com/lockgrooves" target="_blank" title="Follow Us On Instagram">
                            <svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="instagram" class="svg-inline--fa fa-instagram fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"></path></svg>
                        </a>
                    </div>
                </div>
            </div>
        </nav>

        <header class="page-header">
            <div class="lg-banner mb-3">
                <img id="logo" src="/images/lock-grooves-logo.png">
            </div>
        </header>

        <main class="page-body">
            <div class="container">
                <slot/>
            </div>
        </main>

        <footer class="page-footer pb-3">
            <div class="container">
                <div class="d-flex pt-4">
                    <p class="mr-auto text-footer">&copy; 2015 - {{ currentYear }} Lock Grooves. All rights reserved.</p>

                    <div class="d-flex justify-content-end">
                        <router-link :to="{ name: 'admin.index' }" class="d-inline-block mr-3">
                            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="user-shield" class="svg-inline--fa fa-user-shield fa-w-20" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path fill="currentColor" d="M622.3 271.1l-115.2-45c-4.1-1.6-12.6-3.7-22.2 0l-115.2 45c-10.7 4.2-17.7 14-17.7 24.9 0 111.6 68.7 188.8 132.9 213.9 9.6 3.7 18 1.6 22.2 0C558.4 489.9 640 420.5 640 296c0-10.9-7-20.7-17.7-24.9zM496 462.4V273.3l95.5 37.3c-5.6 87.1-60.9 135.4-95.5 151.8zM224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm96 40c0-2.5.8-4.8 1.1-7.2-2.5-.1-4.9-.8-7.5-.8h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h352c6.8 0 13.3-1.5 19.2-4-54-42.9-99.2-116.7-99.2-212z"></path></svg>
                        </router-link>

                        <a title="Email Us" href="mailto:lockgrooves.az@gmail.com" class="d-inline-block mr-3">
                            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="envelope" class="svg-inline--fa fa-envelope fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M502.3 190.8c3.9-3.1 9.7-.2 9.7 4.7V400c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V195.6c0-5 5.7-7.8 9.7-4.7 22.4 17.4 52.1 39.5 154.1 113.6 21.1 15.4 56.7 47.8 92.2 47.6 35.7.3 72-32.8 92.3-47.6 102-74.1 131.6-96.3 154-113.7zM256 320c23.2.4 56.6-29.2 73.4-41.4 132.7-96.3 142.8-104.7 173.4-128.7 5.8-4.5 9.2-11.5 9.2-18.9v-19c0-26.5-21.5-48-48-48H48C21.5 64 0 85.5 0 112v19c0 7.4 3.4 14.3 9.2 18.9 30.6 23.9 40.7 32.4 173.4 128.7 16.8 12.2 50.2 41.8 73.4 41.4z"></path></svg>
                        </a>

                        <a title="Follow Us On Facebook" href="//www.facebook.com/lockgrooves" target="_blank" class="d-inline-block mr-3">
                            <svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="facebook-f" class="svg-inline--fa fa-facebook-f fa-w-10" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path fill="currentColor" d="M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z"></path></svg>
                        </a>

                        <a href="//www.instagram.com/lockgrooves" target="_blank" title="Follow Us On Instagram">
                            <svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="instagram" class="svg-inline--fa fa-instagram fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"></path></svg>
                        </a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</template>

<script>
    export default {
        name: `Frontend`,
        data() {
            return {
                currentYear: new Date().getFullYear()
            };
        }
    }
</script>