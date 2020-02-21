<template>
    <vue-tags-input
        :add-on-key="[' ',';', ',']"
        v-model="tag"
        :tags="tags"
        @tags-changed="(newTags) => {tags = newTags; this.$emit('clicked', newTags)}"
    />
</template>

<script>
    export default {
        props: ['tagsWithTypes'],
        data() {
            return{
                tag: '',
                tags: []
            }
        },
        created() {
            this.tags = this.tagsWithTypes.map(val => new Object({text: val.name.en}));
        },
        name: "Tags"
    }
</script>

<style scoped>

</style>
