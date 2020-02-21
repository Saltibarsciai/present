<template>
    <ul>
        <li v-for="camping in getTopRatedCampings" :key="camping.id">
            <div class="heart">
                <font-awesome-icon :icon="['far', 'heart']" size="1x"/>
            </div>
            <div class="img-wrapper">
                <img :src="camping.image" :alt="camping.name">
            </div>
            <div class="info">
                <div class="title">{{camping.name}}</div>
                <div class="place-rating">
                    <Place :city="camping.city" :country="camping.country"></Place>
                    <div class="stars-wrapper">
                        <StarRating
                            :rating="camping.rating/2"
                            :increment="0.1"
                            :show-rating="false"
                            :star-size="15"
                            @rating-selected="setRating"
                        ></StarRating>
                    </div>
                </div>
                <div class="rating">
                    <Rating :rating="camping.rating"></Rating>
                </div>
                <Tags :tags="camping.tags"></Tags>
            </div>
        </li>
    </ul>
</template>

<script>
    import Tags from "./Tags/Tags";
    import StarRating from 'vue-star-rating';
    import Rating from "../../../components/Rating/Rating";
    import Place from "../../../components/Place/Place";
    import {mapGetters} from "vuex";
    export default {
        components: {Place, Rating, Tags, StarRating},
        name: "TopRatedCampings",
        methods: {
            setRating: function(rating){
                alert("Thanks for review");
            }
        },
        computed: {
            ...mapGetters(['getTopRatedCampings']),
        }
    }
</script>

<style scoped lang="scss">
    @import "top_rated_container";
</style>
