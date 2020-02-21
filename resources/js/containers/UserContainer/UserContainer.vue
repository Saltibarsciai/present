<template>
    <section>
        <NewestCampings/>
        <TopRatedCampings/>
    </section>
</template>

<script>
    import NewestCampings from "./NewestCampings/NewestCampings";
    import TopRatedCampings from "./TopRatedCampings/TopRatedCampings";
    export default {
        components: {TopRatedCampings, NewestCampings},
        mounted() {
            this.$store.dispatch('fetchCampings');
        }
    }
</script>

<style scoped lang="scss">
    @import "user_container";
</style>
