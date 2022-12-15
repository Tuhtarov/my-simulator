<template>
    <div class="pet-menu">
        <slot/>
    </div>
</template>

<script>
export default {
    name: "pet-menu"
}
</script>

<style scoped>
.pet-menu {
    z-index: 1;
    position: relative;
    height: 48px;
    display: flex;
    flex-direction: row;
    justify-content: flex-start;
    align-items: center;
}
</style>
