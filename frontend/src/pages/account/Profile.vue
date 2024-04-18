<template>
    <h1>Manage Profile</h1>
</template>
<script>
    export default {
        mounted() {
            document.title = 'Manage Profile | ' + process.env.VUE_APP_TITLE
        }
    }
</script>