<template>
    <app-container>
        <pet-type-menu>
            <pet-menu-btn-add
                @click="openPanel"
                :is-active="panelIsOpen"
            />

            <pet-type-menu-panel
                :pet-types="petTypes"
                :open="panelIsOpen"
            />
        </pet-type-menu>

        <active-pets :pets="activePets" />

        <create-pet-dialog
            v-if="chosenPetType !== null"
            :pet-type="chosenPetType"
        />

        <create-pet-type-dialog />
    </app-container>
</template>

<script>
import {mapActions, mapGetters} from "vuex";
import AppContainer from "@/components/AppContainer.vue"
import PetTypeMenu from "@header/containers/PetTypeMenu.vue"
import PetTypeMenuPanel from "@header/panels/PetTypeMenuPanel.vue"
import PetMenuBtnAdd from "@header/controls/PetMenuBtnAdd.vue"
import ActivePets from "@main/ActivePets.vue";
import CreatePetDialog from "@main/dialog/CreatePetDialog.vue";
import CreatePetTypeDialog from "@main/dialog/CreatePetTypeDialog.vue";

export default {
    name: "App",
    components: {
        CreatePetDialog,
        ActivePets, AppContainer, PetTypeMenu,
        PetTypeMenuPanel, PetMenuBtnAdd, CreatePetTypeDialog
    },

    data: () => ({
        panelIsOpen: false,
    }),

    computed: {
        ...mapGetters({
            pets: 'pets/allPets',
            activePets: 'pets/activePets',
            petTypes: 'petTypes/allPetTypes',
            chosenPetType: 'controls/chosenPetType',
        }),
    },

    methods: {
        openPanel() {
            this.panelIsOpen = !this.panelIsOpen;

        },
        ...mapActions({
            fetchPets: 'pets/fetchAllPets',
            fetchTypes: 'petTypes/fetchAllPetTypes',
        })
    },

    beforeMount() {
        const SECONDS_30 = 60 * 500
        this.fetchPets()
        setInterval(this.fetchPets, SECONDS_30)

        this.fetchTypes()
    }
}
</script>

<style scoped>

</style>
