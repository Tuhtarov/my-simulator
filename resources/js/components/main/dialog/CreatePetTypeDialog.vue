<template>
    <vue-final-modal
        v-bind:model-value="dialog"
        :click-to-close="true"
        @close="closeModal"
        @click-outside="closeModal"
        classes="modal-container"
        content-class="modal-content"
    >

        <div class="center-container">
            <span class="modal__title">Новый тип животного</span>
        </div>

        <div class="modal__content">
            <div class="modal__inputs">
                <upload-image-input
                    @done="onUploadedImage"
                />

                <label for="name">Наименование</label>
                <input id="name" v-model="petType.name"
                       type="text">

                <label for="growth">Фактор роста</label>
                <input id="growth" v-model="petType.growth_factor" type="number"
                       min="1" max="10">

                <label for="age_max">Максимальный возраст</label>
                <input id="age_max" v-model="petType.age_max" type="number"
                       min="1" max="10">

                <p v-if="petImgName !== null && petImgName.length > 0">
                    Изображение питомца: <br>
                    {{ petImgName }}
                </p>
            </div>
        </div>

        <div class="modal__action">
            <button class="red" @click="closeModal">Отмена</button>
            <button @click="confirmModal" :disabled="!confirmEnabled">Добавить</button>
        </div>
    </vue-final-modal>
</template>

<script>
import {mapActions, mapGetters} from "vuex";
import UploadImageInput from "@main/controls/UploadImageInput.vue";

export default {
    name: "CreatePetDialog",
    components: {UploadImageInput},

    data: () => ({
        petImgName: '',
        petType: {
            name: '',
            age_max: 50,
            growth_factor: 1,
            image_id: null
        },
    }),

    methods: {
        confirmModal() {
            if (this.confirmEnabled) {
                this.createPetType(this.petType).then(() => {
                    this.closeModal()
                    this.clearForm()
                })
            }
        },

        onUploadedImage(image) {
            this.petType.image_id = image.id
            this.petImgName = image.name
        },

        closeModal() {
            this.changeDialogState()
            this.petType.name = ''
        },

        clearForm() {
            this.petType.name = ''
            this.petType.image_id = null
            this.petType.age_max = 50
            this.petType.growth_factor = 1
            this.petImgName = ''
        },

        ...mapActions({
            changeDialogState: "controls/closeCreatePetTypeDialog",
            createPetType: 'petTypes/create'
        }),
    },

    computed: {
        confirmEnabled() {
            let name = this.petType.name.length > 0;
            let age = this.petType.age_max > 0;
            let growth = this.petType.growth_factor > 0;
            let imageId = this.petType.image_id !== null;

            return name && age && growth && imageId
        },

        ...mapGetters({
            dialog: 'controls/stateCreatePetTypeDialog',
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
    margin-bottom: 15px;
    font-weight: 700;
    text-align: center;
}

.modal__content {
    flex-grow: 1;
    overflow-y: auto;
}

.modal__inputs {
    display: block;
    margin: 0 0 20px;
}

.modal__inputs input, .modal__inputs label {
    box-sizing: border-box;
    display: block;
    width: 100%;
}

.modal__inputs input:not(:first-child) {
    margin: 5px 0 0;
}

.modal__inputs label {
    font-size: 0.9rem;
    margin: 10px 0 0;
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
    margin: 15px 0;
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

