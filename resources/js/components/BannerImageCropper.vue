<script>
import { Cropper } from 'vue-advanced-cropper';
import 'vue-advanced-cropper/dist/style.css';

function getMimeType(file, fallback = null) {
    const byteArray = (new Uint8Array(file)).subarray(0, 4);
    let header = '';
    for (let i = 0; i < byteArray.length; i++) {
        header += byteArray[i].toString(16);
    }
    switch (header) {
        case "89504e47":
            return "image/png";
        case "47494638":
            return "image/gif";
        case "ffd8ffe0":
        case "ffd8ffe1":
        case "ffd8ffe2":
        case "ffd8ffe3":
        case "ffd8ffe8":
            return "image/jpeg";
        default:
            return fallback;
    }
}

export default {
    components: {
        Cropper,
    },
    props: {
    },
    data() {
        return {
            postUrl: '/admin/posts/create/banner-upload',
            imagePath: null,
            image: {
                src: null,
                type: null
            }
        };
    },
    methods: {
        change({coordinates, canvas}) {
            //
        },
        crop() {
            const { canvas } = this.$refs.cropper.getResult();
            if (canvas) {
                canvas.toBlob((blob) => {
                    const form = new FormData();
                    const csrf= document.querySelector('meta[name="csrf-token"]').content;
                    form.append('_token', csrf);
                    form.append('file', blob);
                    // You can use axios, superagent and other libraries instead here
                    fetch(this.postUrl, {
                        method: 'POST',
                        body: form,
                    }).then((response) => {
                        if (response.ok) {
                            return response.json();
                        }
                        throw new Error('Network response was not ok.');
                    }).then((data) => {
                        this.imagePath = data.path;
                    }).catch((error) => {
                        console.error(error);
                    });
                }, 'image/webp');
            }
        },
        reset() {
            this.image = {
                src: null,
                type: null
            }
        },
        loadImage(event) {
            // Reference to the DOM input element
            const {files} = event.target;
            // Ensure that you have a file before attempting to read it
            if (files && files[0]) {
                // 1. Revoke the object URL, to allow the garbage collector to destroy the uploaded before file
                if (this.image.src) {
                    URL.revokeObjectURL(this.image.src)
                }
                // 2. Create the blob link to the file to optimize performance:
                const blob = URL.createObjectURL(files[0]);

                // 3. The steps below are designated to determine a file mime type to use it during the
                // getting of a cropped image from the canvas. You can replace it them by the following string,
                // but the type will be derived from the extension and it can lead to an incorrect result:
                //
                // this.image = {
                //    src: blob;
                //    type: files[0].type
                // }

                // Create a new FileReader to read this image binary data
                const reader = new FileReader();
                // Define a callback function to run, when FileReader finishes its job
                reader.onload = (e) => {
                    // Note: arrow function used here, so that "this.image" refers to the image of Vue component
                    this.image = {
                        // Set the image source (it will look like blob:http://example.com/2c5270a5-18b5-406e-a4fb-07427f5e7b94)
                        src: blob,
                        // Determine the image type to preserve it during the extracting the image from canvas:
                        type: getMimeType(e.target.result, files[0].type),
                    };
                };
                // Start the reader job - read file as a data url (base64 format)
                reader.readAsArrayBuffer(files[0]);
            }
        },
    },
    destroyed() {
        // Revoke the object URL, to allow the garbage collector to destroy the uploaded before file
        if (this.image.src) {
            URL.revokeObjectURL(this.image.src)
        }
    },
    };

</script>

<template>

    <div class="d-flex flex-row align-items-center">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#imageModal">
            Select Image
        </button>
        <div class="ms-1" v-if="imagePath" >Selected image: {{ imagePath }}</div>
    </div>

    <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="width: fit-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Crop Image</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="d-inline-block p-2 cropper-container">
                        <cropper
                            ref="cropper"
                            class="cropper"
                            v-if="image.src"
                            :src="image.src"
                            :stencil-props="{aspectRatio: 3/1}"
                            @change="change"
                        />
                        <div class="no-image" v-if="!image.src">
                            <div>
                                <h1 class="text-center" >No Image Selected</h1>
                                <div class="text-center" >Click the "Load Image" button to select an image.</div>
                            </div>
                        </div>

                    </div>
                </div>

                    <div class="modal-footer d-flex flex-row mt-2 " v-bind:class = "(image.src)?'justify-content-between':'justify-content-end'">
                        <button type="button" class="btn btn-outline-danger" v-if="image.src" @click="reset()">Reset</button>
                        <button type="button" class="button btn btn-outline-primary" v-if="!image.src" @click="$refs.filesubmit.click() ">
                            <input type="file" ref="filesubmit" class="file-input" @change="loadImage($event)" accept="image/*">
                            Load image
                        </button>
                        <button type="button" class="btn btn-outline-primary" v-if="image.src" @click="crop()" data-bs-dismiss="modal" >Crop</button>
                    </div>
            </div>
        </div>
    </div>

    <input type="hidden" name="image" :value="imagePath">
</template>

<style lang="scss">
@import './../../sass/_variables.scss';

.cropper {
    height: 600px;
    width: 600px;
    background: $light;
}
.file-input {
    display: none;
}
.cropper-container {

}
.no-image {
    height: 600px;
    width: 600px;
    display: flex;
    justify-content: center;
    align-items: center;
    color: $gray-500;
    background-color: $gray-200;
}
</style>
