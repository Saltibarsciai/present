<template>
    <ul>
        <span>Campings</span>
        <li v-for="camping in this.$store.state.campings" :key="camping.id">
            <form action="#" @submit.prevent="submit">
                <input type="text" hidden v-model="camping.id" name="id"/>
                <input type="text" v-model="camping.country" name="country"/>
                <input type="text" v-model="camping.city" name="city"/>
                <input type="text" v-model="camping.name" name="name"/>
                <input type="text" v-model="camping.link" name="link"/>
                <Tags :tags-with-types="camping.tags" @clicked="addTags"></Tags>
                <input type="submit" value="Update"/>
                <div class="delete" @click="deleteCamping(camping.id)">Delete</div>
            </form>
        </li>
    </ul>
</template>

<script>
    import axios from 'axios';
    import Tags from "./Tags/Tags";
    import {mapGetters} from "vuex";
    export default {
        name: "CampingList",
        components: {Tags},
        methods: {
            addTags(tags){
                this.tags = tags;
                this.tagsToArray();
            },
            tagsToArray() {
                this.simpleTags = [];
                this.tags.map(value => {
                    this.simpleTags.push(value.text);
                });
            },
            submit(e) {
                axios
                    .post('/api/campings/' + e.target.id.value, {
                        country: e.target.country.value,
                        city: e.target.city.value,
                        name: e.target.name.value,
                        link: e.target.link.value,
                        tags: this.simpleTags,
                        _method: 'patch'
                    }, {
                        headers: {
                            Authorization: `Bearer ${localStorage.token}`
                        }
                    })
                    .then(res => {
                        console.log(res.data);
                        console.log("successful update");
                        alert("updated!");
                        this.update();

                    })
                    .catch(e => console.error(e));
            },
            deleteCamping(id) {
                axios
                    .post('/api/campings/' + id, {
                        _method: 'delete'
                    }, {
                        headers: {
                            Authorization: `Bearer ${localStorage.token}`
                        }
                    })
                    .then(res => {
                        console.log("successful delete");
                        alert('deleted!');
                        this.update();
                    })
                    .catch(e => console.error(e));
            },
            update() {
                this.$store.dispatch('fetchCampings')
            }
        },
        mounted(){
            this.update();
        },
        data() {
            return {
                simpleTags: [],
                tags: [],
                tag: ''
            }
        }
    }
</script>

<style scoped lang="scss">
    @import "camping_list";
</style>
