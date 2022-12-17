<template>
    <main class="app-container">
        <slot />
    </main>
</template>

<script>
export default {
    name: "app-container"
}
</script>

<style scoped>
    .app-container {
        background: linear-gradient(180deg, #E0F7FA 0%, #80DEEA 100%);
        display: flex;
        min-height: calc(100% - 50px * 2);
        flex-direction: row;
        padding: 50px;
        flex-wrap: wrap;
        align-items: flex-start;
    }
</style>
