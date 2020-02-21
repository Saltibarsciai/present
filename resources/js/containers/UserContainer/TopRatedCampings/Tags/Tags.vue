<template>
    <div class="tags">
        <ol class="ul">
            <li v-for="tag in tagsList" :key="tag">
                {{tag}}
            </li>
        </ol>
    </div>
</template>

<script>
    export default {
        props: ["tags"],
        name: "Tags",
        computed: {
            tagsList(){
                return this.tags.map(val => val.name.en);
            }
        }
    }
</script>

<style scoped lang="scss">
    @import "tags";
</style>
