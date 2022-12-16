<template>
    <section class="active-pets">
        <active-pet
            v-for="pet in pets"
            :key="pet.id"
            :pet="pet"
            @clickOnPet="clickOnPet"
        />
    </section>
</template>

<script>
import ActivePet from "@main/ActivePet.vue";
import {mapActions} from "vuex";

export default {
    name: "ActivePets",
    components: {ActivePet},
    props: {
        pets: {
            type: Array,
            required: true
        }
    },
    methods: {
        clickOnPet(pet) {

            // this.deactivate(pet.id)
        },
        ...mapActions({deactivate: 'pets/deactivate'})
    }
}
</script>

<style scoped>
    .active-pets {
        margin: auto auto;
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: flex-start;
        flex-wrap: wrap;
    }
</style>
