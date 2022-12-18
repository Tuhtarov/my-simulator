<template>
    <article
        class="active-pet"
        @click="this.$emit('clickOnPet', pet)"
    >
        <img
            :style="styleSize"
            :src="imgPath"
            :alt="pet.petType.image.name"
        >
        <p v-if="isDead">{{pet.name}} (душа)</p>
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
        isDead() {
            return this.pet.is_dead == 1 || this.pet.is_dead === true;
        },

        styleSize() {
            return {
                maxHeight: `${this.pet.size}%`,
                opacity: this.isDead ? 0.3 : 1,
            }
        },

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
    flex-direction: column;
    margin: 15px;
    height: 280px;
    cursor: pointer;
}

.active-pet img {
    display: block;
    height: auto;
    width: 100%;
    transition: all cubic-bezier(0.39, 0.58, 0.57, 1) 2s;
}

.active-pet p {
    font-family: sans-serif;
    margin: 5px 0 0;
    opacity: 0.5;
}
</style>
