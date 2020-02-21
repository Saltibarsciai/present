<template>
    <div>{{city.substring(0,10)}} • {{country.substring(0,10)}}</div>
</template>

<script>
    export default {
        props: ['city', 'country'],
        name: "Place"
    }
</script>

<style scoped lang="scss">
</style>
