<template>
    <div class="pet-type-menu">
        <slot/>
    </div>
</template>

<script>
export default {
    name: "PetTypeMenu"
}
</script>

<style scoped>
.pet-type-menu {
    z-index: 1;
    position: relative;
    height: 48px;
    display: flex;
    flex-direction: row;
    justify-content: flex-start;
    align-items: center;
}
</style>
