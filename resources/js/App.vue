<template>
    <app-container>
        <pet-type-menu>
            <pet-menu-btn-add @click="openPanel" />

            <pet-type-menu-panel
                :pet-types="petTypes"
                :open="panelIsOpen"
            />
        </pet-type-menu>

        <active-pets :pets="activePets" />

        <create-pet-dialog
            :pet-type="chosenPetType"
        />
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

export default {
    name: "App",
    components: {
        CreatePetDialog,
        ActivePets, AppContainer, PetTypeMenu,
        PetTypeMenuPanel, PetMenuBtnAdd
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
        this.fetchPets()
        this.fetchTypes()
    }
}
</script>

<style scoped>

</style>
