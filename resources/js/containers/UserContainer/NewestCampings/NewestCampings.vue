<template>
    <ul>
        <li v-for="(camping, index) in getNewestCampings" :key="index" class="li">
            <div class="heart">
                <font-awesome-icon :icon="['far', 'heart']" size="2x"/>
            </div>
            <div class="img-wrapper">
                <img :src="camping.image" :alt="camping.name">
            </div>
            <div class="title">{{camping.name}}</div>
            <div class="place-rating">
                <Place :city="camping.city" :country="camping.country"></Place>
                <div class="stars-wrapper" @click="setId(camping.id)">
                    <StarRating
                        :rating="camping.rating/2"
                        :increment="0.1"
                        :show-rating="false"
                        :star-size="20"
                        @rating-selected="setRating"
                    ></StarRating>
                </div>
            </div>
            <div class="rating">
                <Rating :rating="camping.rating"></Rating>
            </div>
            <a :href="camping.link" class="more-info">More information</a>
            <a :href="camping.link" class="book-camp">Where to book?</a>
        </li>
    </ul>
</template>

<script>
    import StarRating from 'vue-star-rating';
    import Rating from "../../../components/Rating/Rating";
    import Place from "../../../components/Place/Place";
    import {mapGetters} from "vuex";
    import axios from 'axios'

    export default {
        name: "NewestCampings",
        data(){
            return{
                id: 0,
                rating: 0
            }
        },
        components: {
            Place,
            Rating,
            StarRating
        },
        methods: {
            setId(id){
                this.id = id;
                this.load()
            },
            setRating(rating){
                this.rating =rating*2;
                alert("thanks for review");
            },
            load(){
                axios
                    .post('/api/user-campings/' + this.id, {
                        rating: this.rating,
                        _method: 'patch'
                    })
                    .then(res => {
                        console.log(res.data);
                        this.update();
                    })
                    .catch(e => console.error(e));
            },
            update() {
                this.$store.dispatch('fetchCampings');
            }
        },
        computed: {
            ...mapGetters(['getNewestCampings']),
        }
    }
</script>

<style scoped lang="scss">
    @import "newest_campings";
</style>
