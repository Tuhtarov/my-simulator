import axios from '@/api/Axios';

export default {
    state: {
        petTypes: [],
    },
    getters: {
        allPetTypes: state => state.petTypes,
    },
    mutations: {
        setAllPetTypes: (state, petTypes) => {
            state.petTypes = petTypes
        },
    },
    actions: {
        async fetchAllPetTypes({commit, getters}) {
            return await axios.get("/petTypes")
                .then(({data: {data}}) => {
                    commit('setAllPetTypes', data)
                    return getters.allPetTypes;
                })
        },
    },
    namespaced: true,
}
