<template>
    <pet-menu>
        <btn-add @click="openPanel" />

        <pet-panel
            :open="panelIsOpen"
            :pets="pets"
        />
    </pet-menu>
</template>

<script>
import {mapActions, mapGetters} from "vuex";

export default {
    name: "App",

    data: () => ({
        panelIsOpen: false,
    }),
    computed: {
        ...mapGetters({
            pets: 'pets/allPets',
        }),
    },

    methods: {
        openPanel() {
            this.panelIsOpen = !this.panelIsOpen;
        },
        ...mapActions({fetchPets: 'pets/fetchAllPets'})
    },

    beforeMount() {
        this.fetchPets()
    }
}
</script>

<style scoped>

</style>
