<template>
    <div
        class="btn-add-pet-type"
        :class="{active: isActive}">
    </div>
</template>

<script>
export default {
    name: "BtnAddPetType",
    props: {
        isActive: {
            type: Boolean,
            required: false,
            default: false
        }
    }
}
</script>

<style scoped>
.btn-add-pet-type {
    z-index: 2;
    position: relative;
    display: block;
    border-radius: 50%;
    cursor: pointer;
    width: 36px;
    height: 36px;
    background: #fff;
    transition: background-color ease-in-out 0.2s;
}

.btn-add-pet-type:before, .btn-add-pet-type:after {
    content: "";
    display: block;
    position: absolute;
    width: 10px;
    height: 2px;
    /*position: absolute;*/
    top: 50%;
    left: 50%;
    transition: all ease-in 0.1s;
    background: black;
}

.btn-add-pet-type:before {
    transform: translate(-50%, -50%) rotate(-90deg);
}

.btn-add-pet-type:after {
    transform: translate(-50%, -50%) rotate(-180deg);
}

.btn-add-pet-type.active {
    background: gray;
    cursor: not-allowed;
}

.btn-add-pet-type.active:before {
    transform: translate(-50%, -50%) rotate(-40deg);
}

.btn-add-pet-type.active:after {
    transform: translate(-50%, -50%) rotate(-140deg);
}
</style>
