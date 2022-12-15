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
import data from "bootstrap/js/src/dom/data";

export default {
    name: "App",

    data: () => ({
        panelIsOpen: false,
        pets: []
    }),

    methods: {
        openPanel() {
            console.log("openPanel")
            this.panelIsOpen = !this.panelIsOpen;
        }
    },

    beforeMount() {
        this.pets = [
            {
                id: 1,
                name: "Magic",
            },
            {
                id: 2,
                name: "Magic",
            }
        ]
    }
}
</script>

<style scoped>

</style>
