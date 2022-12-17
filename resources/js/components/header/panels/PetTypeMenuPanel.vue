<template>
    <div v-show="open" class="pet-type-menu-panel">
        <pet-menu-item
            v-if="petsAvailable"
            v-for="pet in petTypes"
            :key="pet.id"
            :item="pet"
            @take="createPet"
        >

        </pet-menu-item>
    </div>
</template>

<script>
import {mapActions} from "vuex";
import PetMenuItem from "@header/items/PetMenuItem.vue";

export default {
    name: "PetTypeMenuPanel",
    components: {PetMenuItem},
    props: {
        petTypes: {
            type: Array,
            default: []
        },
        open: {
            type: Boolean,
            default: false
        }
    },

    data: () => ({}),

    methods: {
        createPet(petType) {
            this.openCreatePetDialog(petType)
        },
        ...mapActions({openCreatePetDialog: 'controls/openCreatePetDialog'})
    },

    computed: {
        petsAvailable() {
            return this.petTypes !== null && this.petTypes.length > 0;
        }
    }
}
</script>

<style scoped>
.pet-type-menu-panel {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    flex-direction: row;

    position: relative;
    z-index: 1;

    width: auto;
    height: 48px;
    padding-left: 38px;
    padding-right: 8px;
    margin-left: -24px;

    border-radius: 0 8px 8px 0;
    background: rgba(215, 204, 200, 1);
}
</style>
