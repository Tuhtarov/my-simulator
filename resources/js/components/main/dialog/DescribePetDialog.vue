<template>
    <vue-final-modal
        v-bind:model-value="dialog"
        :click-to-close="true"
        @close="closeDialog"
        @click-outside="closeDialog"
        classes="modal-container"
        content-class="modal-content"
    >
        <span class="modal__title">Информация о животном</span>
        <div class="modal__content" v-if="pet !== null">
            <p>№ {{ pet.id }}</p>
            <p>Кличка: {{ pet.name }}</p>
            <p>Тип: {{ pet.petType.name }}</p>
            <p>Максимальный возраст: {{ pet.petType.age_max }}</p>
            <p>Возраст: {{ pet.age }}</p>
            <p>Размер: {{ pet.size }}</p>
            <p>Добавлен: {{ pet.created_at }}</p>
        </div>

        <div class="modal__action">
            <button class="red" @click="drop(pet)">Деактивация</button>
            <button @click="closeDialog">Ок</button>
        </div>
    </vue-final-modal>
</template>

<script>
import {mapActions, mapGetters} from "vuex";

export default {
    name: "DescribePetDialog",
    props: {
        pet: {
            type: Object,
            required: true
        }
    },

    methods: {
        drop(pet) {
            this.deactivate(pet.id).then(() => {
                this.closeDialog()
            })
        },
        ...mapActions({
            closeDialog: "controls/closeDescribePetDialog",
            getPet: 'pets/fetchPetById',
            deactivate: 'pets/deactivate',
        })
    },
    computed: {
        ...mapGetters({
            dialog: 'controls/stateDescribePetDialog',
        }),
    }
}
</script>

<style scoped>
:deep .modal-container {
    display: flex;
    justify-content: center;
    align-items: center;
}

:deep .modal-content {
    position: relative;
    display: flex;
    flex-direction: column;
    max-height: 90%;
    margin: 0 1rem;
    padding: 1rem;
    border: 1px solid #e2e8f0;
    border-radius: 0.25rem;
    background: #fff;
}

.modal__title {
    margin: 0 2rem 0 0;
    font-size: 1.5rem;
    font-weight: 700;
}

.modal__content {
    flex-grow: 1;
    overflow-y: auto;
}

.modal__action {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-shrink: 0;
    padding: 1rem 0 0;
}

.red {
    color: #d50f43;
    font-size: 0.8rem;
    font-weight: 700;
}
</style>

