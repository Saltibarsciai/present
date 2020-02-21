<template>
    <div class="rating">
        <div v-if="rating>8">Awesome</div>
        <div v-else-if="rating>7">Very good</div>
        <div v-else>Bad</div>
        <div>{{parseFloat(rating).toFixed(1)}}/10</div>
    </div>
</template>

<script>
    export default {
        props: ['rating'],
        name: "Rating"
    }
</script>

<style scoped lang="scss">
    .rating{
        display: inline;
        justify-content: center;
        div{
            float: left;
            &:first-of-type{
                margin-right: 5px;
            }
        }
    }
</style>
