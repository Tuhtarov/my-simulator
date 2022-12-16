<template>
    <article
        class="active-pet"
        @click="this.$emit('clickOnPet', pet)"
    >
        {{ pet.id }}
        <br>
        {{ pet.name }}
        <br>
        {{ pet.is_active }}
    </article>
</template>

<script>
export default {
    name: "ActivePet",
    props: {
        pet: {
            type: Object,
            required: true
        }
    },
}
</script>

<style scoped>
.active-pet {
    display: block;
    width: 80px;
    height: 80px;
    margin: 10px;

    background: rgb(112, 54, 33);
}
</style>
