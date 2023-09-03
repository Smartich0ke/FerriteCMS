<script>
export default {
    name: "CopyToClipboard",
    props: {
        text: {
            type: String,
            required: true
        }
    },
    methods: {
        copyToClipboard() {
            const el = document.createElement('textarea');
            el.value = this.text;
            document.body.appendChild(el);
            el.select();
            document.execCommand('copy');
            document.body.removeChild(el);
        }
    }
}
</script>

<template>
<button class="btn d-flex flex-row align-items-center p-1 m-0" @click="copyToClipboard">
    <iconify-icon class="" icon="mdi:content-copy" height="20" width="20"></iconify-icon>
</button>
</template>

<style scoped>

</style>
