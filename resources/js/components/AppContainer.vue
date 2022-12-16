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
        display: flex;
        height: calc(100% - 50px * 2);
        flex-direction: column;
        padding: 50px;
        flex-wrap: wrap;
        align-items: stretch;
    }
</style>
