import axios from '@/api/Axios';

export default {
    state: {
        pets: [],
    },
    getters: {
        allPets: state => state.pets,

        petTypeAvailability: (state, getters) => (petTypeId) => {
            let isAvailable = true

            getters.activePets.forEach(pet => {
                if (pet.petType.id === petTypeId) {
                    isAvailable = false
                }
            })

            return isAvailable
        },

        getPet: (state, getters) => (petId) => {
            let petResult = null

            getters.allPets.forEach(pet => {
                if (pet.id === petId) {
                    petResult = pet
                }
            })

            return petResult
        },

        activePets: state => state.pets.reduce((p, item) => {
            if (item.is_active === 1 || item.is_active === true) {
                p.push(item);
            }

            return p;
        }, []),
    },
    mutations: {
        setAllPets: (state, pets) => {
            state.pets = pets
        },

        updatePet(state, pet) {
            state.pets = state.pets.reduce((p, item) => {
                if (item.id === pet.id) {
                    item = pet;
                }
                p.push(item);
                return p;
            }, [])
        },

        setActivatePet: (state, pet) => {
            state.pets = state.pets.reduce((p, item) => {
                if (item.id === pet.id) {
                    item = pet;
                }
                p.push(item);
                return p;
            }, [])
        },

        setDeactivatePet: (state, pet) => {
            state.pets = state.pets.reduce((p, item) => {
                if (item.id === pet.id) {
                    item = pet;
                }
                p.push(item);
                return p;
            }, [])
        },

        addPet: (state, pet) => {
            state.pets.push(pet);
        },
    },
    actions: {
        async fetchAllPets({commit, getters}) {
            // ?????????? ???????????? ?????????????? vuex
            const onlyActives = true

            return await axios.get(onlyActives ? "/pets/actives" : '/pets')
                .then(({data: {data}}) => {
                    commit('setAllPets', data)
                    return getters.allPets;
                })
        },

        async activate({commit}, petId) {
            await axios.post(`/pets/activate/${petId}`)
                .then(({data: {data}}) => {
                    commit('setActivatePet', data)
                    return true
                })
        },

        async createPet({commit}, {petTypeId, petName}) {
            const params = {
                'pet_type_id': petTypeId,
                'name': petName,
                'is_active': true,
                'age': 0
            };

            await axios.post(`/pets`, params)
                .then(({data: {data}}) => {
                    // console.log(data);
                    commit('addPet', data)
                    return data
                })
        },

        async deactivate({commit, getters}, petId) {
            await axios.post(`/pets/deactivate/${petId}`)
                .then(({data: {data}}) => {
                    // console.dir(data)
                    commit('setDeactivatePet', data)
                    return true
                })
        },

        async getOldById({commit, getters}, petId) {
            await axios.post(`/pets/getOld/${petId}`)
                .then(({data: {data}}) => {
                    commit('updatePet', data)
                    return true
                })
        },

        /**
         * ????, ?????????? ?????????????????????????? ?????????? ?? ??????????????????
         * ?? ???????????????? ?????????????? ?????? ?????????????????? ?? ??????????????,
         * ???? ?? ?????????????? ???????? ?????????????????? ???????????? ?????????????? ???? API,
         * ?? ???????????????? ???? ?????? API ?????????????????? ???????? ??????-???? ?? SPA
         *
         * @returns {Promise<void>}
         */
        async fetchPetById({commit, getters}, id) {
            return await axios.get(`/pets/${id}`).then(({data: {data}}) => {
                commit('updatePet', data)
                return getters.getPet(id)
            })
        }
    },
    namespaced: true,
}
