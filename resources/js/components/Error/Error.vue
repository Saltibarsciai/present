<template>
    <div v-if="error.length>0">
        {{error}}
    </div>
</template>

<script>
    export default {
        props: ['error'],
        name: "Error"
    }
</script>

<style scoped lang="scss">
    @import "../../../sass/_variables.scss";
    div{
        width: 100%;
        text-align: center;
        color: red;
        font-weight: bold;
        font-size: $font-size-base;
    }
</style>
