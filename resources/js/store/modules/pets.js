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
                .then(({data}) => {
                    console.dir(data)
                    commit('setAllPets', data)
                    return getters.allPets;
                })
        },

        async setActivePet({commit}, petId) {
            console.log(petId)

            return await petId;
        }
    },
    namespaced: true,
}
