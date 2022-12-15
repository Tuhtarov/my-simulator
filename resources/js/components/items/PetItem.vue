<template>
    <div class="pet-item">
        {{ item.name }}
    </div>
</template>

<script>
export default {
    name: "PetItem",
    props: {
        item: {
            type: Object,
            required: true
        }
    }
}
</script>

<style scoped>
.pet-item {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;

    margin-right: 6px;
    border-radius: 50%;
    border: 2px solid black;
    width: 36px;
    height: 36px;
    cursor: pointer;
    background: #fff;
}

.pet-item img {
    display: block;
    width: 100%;
    height: auto;
    border-radius: 50%;
    max-height: 25px;
    max-width: 25px;
}
</style>
