<template>
    <article>
        <button @click="show" class="toggle-btn">
            Add new camping
        </button>
        <modal name="create-new" :height="'auto'">
            <div class="title">
                New Camping
            </div>
            <Error :error="error"></Error>
            <form @submit.prevent="submit">
                <input type="text" placeholder="Country" v-model="country"/>
                <input type="text" placeholder="City" v-model="city"/>
                <input type="text" placeholder="Camping Name" v-model="name"/>
                <input type="text" placeholder="Link to Website" v-model="link"/>
                <vue-tags-input
                    :add-on-key="[' ',';', ',']"
                    v-model="tag"
                    :tags="tags"
                    @tags-changed="(newTags) => {tags = newTags}"
                />
                <button type="submit">Create</button>
            </form>
        </modal>
    </article>
</template>

<script>
    import axios from "axios";
    import Error from "../../../components/Error/Error";
    export default {
        name: "CampingNew",
        components: {Error},
        data() {
            return {
                simpleTags: [],
                tags: [],
                tag: '',
                country: '',
                city: '',
                name: '',
                link: '',
                error: ''
            }
        },
        methods: {
            update() {
                this.$store.dispatch('fetchCampings')
            },
            show() {
                this.cleanInputs();
                this.$modal.show('create-new');
            },
            hide() {
                this.$modal.hide('create-new');
            },
            tagsToArray() {
                this.simpleTags = [];
                this.tags.map(value => {
                    this.simpleTags.push(value.text);
                });
            },
            load(){
                this.$store.dispatch('fetchCampings');
            },
            store() {
                let formData = new FormData();
                formData.append("name", this.name);
                formData.append("country", this.country);
                formData.append("city", this.city);
                formData.append("link", this.link);
                formData.append("tags", JSON.stringify(this.simpleTags));
                axios
                    .post("/api/campings", formData, {
                        headers: {
                            Authorization: `Bearer ${localStorage.token}`
                        }
                    })
                    .then(response => {
                        response.data.message && (this.error = response.data.message);
                        if(!response.data.message) {
                            this.cleanInputs();
                            this.hide();
                            this.update()
                        }
                    })
                    .catch(e => {
                        console.error(e)
                    });
            },
            cleanInputs() {
                this.country = '';
                this.city = '';
                this.name = '';
                this.link = '';
                this.tags = [];
                this.error = '';
            },
            submit() {
                this.tagsToArray();
                this.store();
                this.load();
            }
        },
    }
</script>

<style scoped lang="scss">
    @import "camping_new";
</style>
