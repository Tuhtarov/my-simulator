<template>
    <vue-final-modal
        v-bind:model-value="dialog"
        :click-to-close="true"
        @close="closeModal"
        @click-outside="closeModal"
        classes="modal-container"
        content-class="modal-content"
    >

        <template v-if="petTypeIsAvailable">
            <div class="center-container">
                <span class="modal__title">{{petType.name}}</span>
                <div class="pet-img-container">
                    <img :src="imgPath" :alt="petType.image.name">
                </div>
            </div>

            <div class="modal__content">
                <div class="modal__inputs">
                    <input v-model="name" type="text" placeholder="Кличка">
                </div>
            </div>
        </template>

        <div class="modal__action">
            <button class="red" @click="closeModal">Отмена</button>
            <button @click="confirmModal" :disabled="!confirmEnabled">Добавить</button>
        </div>
    </vue-final-modal>
</template>

<script>
import {BASE_URL} from "@/api/config";
import {mapActions, mapGetters} from "vuex";

export default {
    name: "CreatePetDialog",
    props: {
        petType: {
            type: Object,
            required: true
        }
    },

    data: () => ({
        name: '',
    }),

    methods: {
        confirmModal() {
            if (this.confirmEnabled) {
                this.createPet({
                    petTypeId: this.petType.id,
                    petName: this.name
                }).then(this.closeModal)
            }
        },

        closeModal() {
            this.changeDialogState()
            this.name = ''
        },

        ...mapActions({
            changeDialogState: "controls/closeCreatePetDialog",
            createPet: 'pets/createPet'
        })
    },
    computed: {
        imgPath() {
            return `${BASE_URL}/images/${this.petType.image.name}.${this.petType.image.ext}`;
        },

        petTypeIsAvailable() {
            return this.petType !== null && this.petType !== undefined
        },

        confirmEnabled() {
            return this.name.length > 0
        },

        ...mapGetters({
            dialog: 'controls/stateCreatePetDialog',
        }),
    }
}
</script>

<style scoped>
:deep(.modal-container) {
    display: flex;
    justify-content: center;
    align-items: center;
}

:deep(.modal-content) {
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
    font-size: 1.5rem;
    font-weight: 700;
    text-align: center;
    text-transform: capitalize;
}

.modal__content {
    flex-grow: 1;
    overflow-y: auto;
}

.modal__inputs {
    margin: 30px 0 20px;
}

.modal__action {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-shrink: 0;
    padding: 1rem 0 0;
}

.pet-img-container {
    display: flex;
    margin: 15px 0px;
}

.pet-img-container img {
    display: block;
    max-width: 100px;
    height: auto;
}

.center-container {
    display: flex;
    flex-direction: column;
    align-items: center;
}

.red {
    color: #d50f43;
    font-size: 0.8rem;
    font-weight: 700;
}
</style>

