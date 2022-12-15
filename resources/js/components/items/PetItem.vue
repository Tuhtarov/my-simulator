<template>
    <div class="pet-item">
        <svg width="24" height="21" viewBox="0 0 24 21" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0 11.9164C0 5.64675 5.68965 0.0101013 12 0.0101013C18.3103 0.0101013 24 5.65531 24 11.9164C24 18.1774 18.3189 21 12 21C5.68103 21 0 18.1774 0 11.9164Z" fill="#24201B"/>
        </svg>
    </div>
</template>

<script>
export default {
    name: "PetItem"
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
