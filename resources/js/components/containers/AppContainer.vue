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
        padding: 50px;
    }
</style>
