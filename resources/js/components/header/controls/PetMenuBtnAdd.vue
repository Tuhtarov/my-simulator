<template>
    <div class="btn-add"></div>
</template>

<script>
export default {
    name: "PetMenuBtnAdd",
    methods: {
    }
}
</script>

<style scoped>
.btn-add {
    z-index: 2;
    position: relative;
    display: block;
    border-radius: 50%;
    width: 48px;
    height: 48px;
    cursor: pointer;
    background: #3E2723;
}

.btn-add:before, .btn-add:after {
    content: "";
    display: block;
    position: absolute;
    width: 14px;
    height: 2px;
    /*position: absolute;*/
    top: 50%;
    left: 50%;
    background: white;
}

.btn-add:before {
    transform: translate(-50%, -50%) rotate(-90deg);
}

.btn-add:after {
    transform: translate(-50%, -50%) rotate(-180deg);
}
</style>
