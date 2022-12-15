import axios from '@/api/Axios';

export default {
    state: {
        pets: [],
    },
    getters: {
        allPets: state => state.pets,
    },
    mutations: {
        setAllPets: (state, pets) => {
            state.pets = pets
        },
    },
    actions: {
        async fetchAllPets({commit, getters}) {
            return await axios.get("/pets")
                .then(pets => {
                    commit('setAllPets', pets)
                    return getters.allPets;
                })
        },
    },
    namespaced: true,
}
