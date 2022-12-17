<template>
    <section class="active-pets">
        <active-pet
            v-for="pet in pets"
            :key="pet.id"
            :pet="pet"
            @clickOnPet="clickOnPet"
        />

        <describe-pet-dialog
            :pet="chosenPet"
        />
    </section>
</template>

<script>
import ActivePet from "@main/ActivePet.vue";
import {mapActions, mapGetters} from "vuex";
import DescribePetDialog from "@main/dialog/DescribePetDialog.vue";

export default {
    name: "ActivePets",
    components: {DescribePetDialog, ActivePet},
    props: {
        pets: {
            type: Array,
            required: true
        }
    },

    methods: {
        clickOnPet(pet) {
            this.fetchPetById(pet.id).then(fetchedPet => {
                this.openDescribePet(fetchedPet)
            })
        },
        ...mapActions({
            openDescribePet: 'controls/openDescribePetDialog',
            deactivate: 'pets/deactivate',
            fetchPetById: 'pets/fetchPetById'
        })
    },

    computed: {
        ...mapGetters({
            chosenPet: "controls/chosenPet"
        })
    }
}
</script>

<style scoped>
    .active-pets {
        margin: auto auto;
        display: flex;
        align-items: center;
        flex-direction: row;
        justify-content: center;
        flex-wrap: wrap;
    }
</style>
