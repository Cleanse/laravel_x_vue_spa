<template>
<main class="content-wrapper">
    <header class="page-header">
        <h1>Vue Router Demo App</h1>

        <p>
            <router-link :to="{ name: 'home' }">Home</router-link> |
            <router-link :to="{ name: 'faq' }">FAQ</router-link> |
            <router-link :to="{ name: 'users.index' }">Users</router-link>
        </p>

    </header>

    <section class="page-body">
        <div class="container">
            <router-view></router-view>
        </div>
    </section>

    <footer class="page-footer">
        All Content &copy; 2015 - {{ currentYear }} <router-link :to="{ name: 'home' }">LockGrooves.com</router-link>
    </footer>
</main>
</template>
<script>
    export default {
        data() {
            return {
                currentYear: new Date().getFullYear()
            };
        },
    }
</script>