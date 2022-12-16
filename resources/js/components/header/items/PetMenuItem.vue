<template>
    <div
        class="pet-menu-item"
        v-bind:class="{ disabled: !isAvailable }"
        @click="pushItem">
        {{ item.id }}
    </div>
</template>

<script>
import {mapGetters} from "vuex";

export default {
    name: "PetMenuItem",
    props: {
        item: {
            type: Object,
            required: true
        }
    },

    methods: {
        pushItem() {
            if (this.isAvailable) {
                this.$emit('take', this.item)
            }
        },
    },

    computed: {
        isAvailable() {
            return this.petTypeAvailability(this.item.id);
        },

        ...mapGetters({
            petTypeAvailability: 'pets/petTypeAvailability'
        })
    },
}
</script>

<style scoped>
.pet-menu-item {
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

.pet-menu-item.disabled {
    opacity: .5;
    cursor: not-allowed;
    background: gray;
}

.pet-menu-item img {
    display: block;
    width: 100%;
    height: auto;
    border-radius: 50%;
    max-height: 25px;
    max-width: 25px;
}
</style>
