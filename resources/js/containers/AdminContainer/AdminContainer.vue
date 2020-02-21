<template>
    <main>
        <CampingNew></CampingNew>
        <CampingList></CampingList>
    </main>
</template>

<script>
    import CampingNew from "./CampingNew/CampingNew";
    import CampingList from "./CampingList/CampingList";
    export default {
        components: {CampingList, CampingNew},
    }
</script>
<style scoped lang="scss" >
    @import "admin_container";
</style>
