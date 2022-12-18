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

        addPetType: (state, petType) => {
            state.petTypes.push(petType);
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

        async create({commit, getters}, petType) {
            await axios.post(`/petTypes`, petType)
                .then(({data: {data}}) => {
                    console.log(data);
                    commit('addPetType', data)
                    return data
                })
        },
    },
    namespaced: true,
}
