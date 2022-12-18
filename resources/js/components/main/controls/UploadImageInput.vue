<template>
    <div>
        <button @click="onChoosePhoto">
            {{ readyToUpload ? 'Изменить' : 'Выбрать' }} фото питомца
        </button>

        <input id="fupload-id" type="file" class="input-field-file" ref="fupload" @change="onFileChange">

        <div v-if="readyToUpload">
            <img :src="formData.uploadFileData"
                 class="preview-image"
                 alt="upload photo">
        </div>

        <button v-if="readyToUpload" @click="uploadImage">
            Прикрепить фото
        </button>
    </div>
</template>

<script>
import {mapActions} from "vuex";

export default {
    name: "UploadImageInput",

    data: () => ({
        formData: {
            displayFieName: null,
            uploadFileData: null,
            file: null
        }
    }),

    methods: {
        onFileChange(event) {
            if (event.target.files && event.target.files.length) {
                let file = event.target.files[0];
                this.formData.file = file;
                this.formData.displayFileName =
                    event.target.files[0].name +
                    " (" +
                    this.calcSize(file.size) +
                    "Kb)";
                let reader = new FileReader();
                reader.onload = e => {
                    this.formData.uploadFileData = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        },

        uploadImage() {
            let data = new FormData();
            data.append("image", this.formData.file);

            this.upload({file: data}).then(image => {
                if (image !== null) {
                    this.$emit('done', image)
                }

                this.formData = {
                    displayFileName: null,
                    uploadFileData: null,
                    file: null
                };
            });
        },

        calcSize(size) {
            return Math.round(size / 1024);
        },

        onChoosePhoto() {
            this.$refs.fupload.click();
        },

        ...mapActions({
            upload: 'images/upload'
        })
    },

    computed: {
        readyToUpload() {
            return (
                this.formData.displayFileName && this.formData.uploadFileData
            );
        }
    }
}
</script>

<style scoped>
.input-field-file {
    display: none;
}

.preview-image {
    max-height: 300px;
    width: 250px;
    padding: 15px;
    border: 1px solid #999;
    border-radius: 5px;
}
</style>
