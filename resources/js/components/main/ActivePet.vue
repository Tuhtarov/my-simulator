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
    </article>
</template>

<script>
import {BASE_URL} from "@/api/config";

export default {
    name: "ActivePet",

    data: () => ({

    }),

    props: {
        pet: {
            type: Object,
            required: true
        }
    },

    computed: {
        styleSize() {
            return {
                maxHeight: `${this.pet.size}%`
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
</style>
