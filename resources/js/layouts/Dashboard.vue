<template>
    <div class="dashboard-wrapper">
        <h1>Dashboard</h1>
        <div class="nav-item">
            <router-link :to="{ name: 'home' }" class="nav-link">Home</router-link>
        </div>
        <div class="container">
            <slot/>
        </div>
        <p>All Content &copy; 2015 - {{ currentYear }}</p>
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