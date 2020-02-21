import Vue from 'vue';
import Vuex from 'vuex';
import axios from 'axios'

Vue.use(Vuex, axios);

export default new Vuex.Store({
    state: {
        campings: [],
    },

    getters: {
        getNewestCampings: state => {
            let campings = [...state.campings];
            campings.sort((a, b) =>  {
                if (a.created_at < b.created_at)
                    return 1;
                if (a.created_at > b.created_at)
                    return -1;
                return 0;
            });
            return campings
        },
        getTopRatedCampings: state => {
            let campings = [...state.campings];
            campings.sort((a, b) =>  {
                if (a.rating < b.rating)
                    return 1;
                if (a.rating > b.rating)
                    return -1;
                return 0;
            });
            return campings
        },
    },

    actions: {
        fetchCampings({ commit }) {
            return axios.get('api/user-campings')
                .then(response => {
                    commit('setCampings', response.data);
                });
        },
    },

    mutations: {
        setCampings(state, campings) {
            state.campings = campings;
        },
    },
});
