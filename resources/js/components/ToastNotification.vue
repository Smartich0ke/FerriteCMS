<template>
    <Transition name="fade">
        <div v-if="elementVisible" v-bind:class = "(messageType === 'danger')?'bg-danger':'bg-success'" class="toastCard d-flex flex-row position-fixed bottom-0 end-0 text-light p-2 ps-3 pe-3 rounded-3 m-2">
            <p class="m-0">{{ message }}</p>
        </div>
    </Transition>
</template>

<script>
export default {
    props: {
        message: String,
        messageType: String,
        name: "ToastNotification",
    },
    data() {
        return {
            elementVisible: true
        }
    },
    created() {
        setTimeout(() => this.elementVisible = false, 5000);

    }
}
</script>

<style scoped>
.fade-enter-active,
.fade-leave-active {
    transition: opacity 2s ease;
}

.fade-enter-from,
.fade-leave-to {
    opacity: 0;
}
</style>
