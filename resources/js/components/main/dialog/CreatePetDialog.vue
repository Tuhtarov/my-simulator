<template>
    <vue-final-modal
        v-bind:model-value="dialog"
        :click-to-close="true"
        @close="closeModal"
        @click-outside="closeModal"
        classes="modal-container"
        content-class="modal-content"
    >
        <span class="modal__title">Добавление животного</span>
        <div class="modal__content" v-if="petTypeIsAvailable">
            <p>
                Тип животного: <b>{{ petType.name }}</b>
            </p>

            <div class="modal__inputs">
                <label>Имя животного <br>
                    <input v-model="name" type="text" placeholder="...">
                </label>
            </div>
        </div>

        <div class="modal__action">
            <button class="red" @click="closeModal">Отмена</button>
            <button @click="confirmModal" :disabled="!confirmEnabled">Применить</button>
        </div>
    </vue-final-modal>
</template>

<script>
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

.modal__inputs {
    margin-bottom: 20px;
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

