<script>
export default {
    name: "ImageModal",
    props: {
        image: {
            type: String,
            default: null,
        },
        alttext: {
            type: String,
            default: null,
        },
        orientation: {
            type: String,
            default: null,
        },
    },
    computed: {
        backgroundImageStyle() {
            return `background-image: url(${this.image});`;
        }
    },
    methods: {
        openModal() {
            this.modalIsOpen = true;
        },
        closeModal() {
            this.modalIsOpen = false;
        }
    },
    data() {
        return {
            modalIsOpen: false,
        }
    }
}
</script>

<template>
    <!-- Image grid item -->
    <div
        class="gridItem"
        :class="{
        'gridItem-wide': orientation === 'landscape',
        'gridItem-tall': orientation === 'portrait'
      }"
        :style="backgroundImageStyle"
        :title="alttext"
        @click="openModal()"
    >
    </div>

    <!-- Modal -->
    <div class="modal" v-if="modalIsOpen">
      <span class="close" @click="closeModal()">&times;</span>
      <img :src="image" :alt="alttext" class="modal-image" />
    </div>
</template>



<style scoped>
.modal {
  display: flex;
  align-items: center;
  justify-content: center;
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.9);
  z-index: 999;
}

.modal-image {
  max-width: 90%;
  max-height: 90%;
}

.close {
  position: absolute;
  top: 20px;
  right: 30px;
  color: #ffffff;
  font-size: 30px;
  cursor: pointer;
}
</style>
