export default {
    state: {
        createPetDialog: false,
        petTypeForDialog: null,

        describePetDialog: false,
        petForDialog: null
    },
    getters: {
        stateCreatePetDialog: state => state.createPetDialog,
        stateDescribePetDialog: state => state.describePetDialog,

        chosenPetType: state => state.petTypeForDialog,
        chosenPet: state => state.petForDialog,
    },
    mutations: {
        changeCreatePetDialog: (state, val) => {
            state.createPetDialog = val;
        },

        changePetType: (state, type) => {
            state.petTypeForDialog = type;
        },

        changePet: (state, pet) => {
            state.petForDialog = pet;
        },

        changeDescribePetDialog: (state, val) => {
            state.describePetDialog = val;
        },
    },
    actions: {
        closeCreatePetDialog({commit}) {
            commit('changeCreatePetDialog', false)
        },

        openCreatePetDialog({commit}, petType) {
            commit('changePetType', petType)
            commit('changeCreatePetDialog', true)
        },

        closeDescribePetDialog({commit}) {
            commit('changeDescribePetDialog', false)
        },

        openDescribePetDialog({commit}, pet) {
            commit('changePet', pet)
            commit('changeDescribePetDialog', true)
        },
    },
    namespaced: true,
}
