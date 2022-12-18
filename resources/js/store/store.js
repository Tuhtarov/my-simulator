import { createStore } from 'vuex'

import pets from "@/store/modules/pets.js";
import controls from "@/store/modules/appControls.js";
import petTypes from "@/store/modules/petTypes.js";
import images from "@/store/modules/images.js";

export default createStore({
    state: {
    },
    mutations: {

    },
    actions: {

    },
    getters: {

    },
    modules: {
        pets, petTypes, controls, images
    },
})
