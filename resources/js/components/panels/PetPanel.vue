<template>
    <div v-show="open" class="pet-panel">
        <pet-item
            v-if="petsAvailable"
            v-for="pet in pets"
            :key="pet.id"
            :item="pet"
        >

        </pet-item>
    </div>
</template>

<script>

import PetItem from "@/components/items/PetItem.vue";

export default {
    name: "PetPanel",
    components: {PetItem},

    props: {
        pets: {
            type: Array,
            default: []
        },
        open: {
            type: Boolean,
            default: false
        }
    },

    data: () => ({}),

    computed: {
        petsAvailable() {
            return this.pets !== null && this.pets.length > 0;
        }
    }
}
</script>

<style scoped>
.pet-panel {
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
