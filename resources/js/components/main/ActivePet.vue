<template>
    <article
        class="active-pet"
        @click="this.$emit('clickOnPet', pet)"
    >
        <img :src="imgPath" :alt="pet.petType.image.name">
    </article>
</template>

<script>
import {BASE_URL} from "@/api/config";

export default {
    name: "ActivePet",

    props: {
        pet: {
            type: Object,
            required: true
        }
    },

    computed: {
        imgPath() {
            const img = this.pet.petType.image;
            return `${BASE_URL}/images/${img.name}.${img.ext}`;
        },
    }
}
</script>

<style scoped>
.active-pet {
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 15px;
    cursor: pointer;
}

.active-pet img {
    display: block;
    height: auto;
    max-width: 150px;
    width: 100%;
}
</style>
