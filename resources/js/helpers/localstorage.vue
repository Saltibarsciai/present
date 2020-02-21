<template>

</template>

<script>
export default {
    name: "local-storage",
    props: ['token'],
    mounted() {
        localStorage.token = this.token;
    }
}
</script>

<style>

</style>
