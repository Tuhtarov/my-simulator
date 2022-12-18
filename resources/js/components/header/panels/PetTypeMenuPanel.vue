<template>
    <div v-show="open" class="pet-type-menu-panel">
        <btn-add-pet-type
            :is-active="createPetTypeDialogState"
            @click="openCreatePetTypeDialog"
        />

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
import {mapActions, mapGetters} from "vuex";
import PetMenuItem from "@header/items/PetMenuItem.vue";
import BtnAddPetType from "@header/controls/BtnAddPetType.vue";

export default {
    name: "PetTypeMenuPanel",
    components: {BtnAddPetType, PetMenuItem},
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

    data: () => ({

    }),

    methods: {
        createPet(petType) {
            this.openCreatePetDialog(petType)
        },
        ...mapActions({
            openCreatePetDialog: 'controls/openCreatePetDialog',
            openCreatePetTypeDialog: 'controls/openCreatePetTypeDialog',
        })
    },

    computed: {
        petsAvailable() {
            return this.petTypes !== null && this.petTypes.length > 0;
        },

        ...mapGetters({
            createPetTypeDialogState: 'controls/stateCreatePetTypeDialog',
        })
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

.pet-type-menu-panel > div {
    margin-right: 6px;
}
</style>
