<template>
        <div @click="viewReplies" class="text-sm text-primary view-form-button pt-1 ps-2 d-flex flex-row align-items-center">
            <template v-if="!repliesShown" class="">
                <iconify-icon icon="mdi:chevron-down" width="26" height="26"></iconify-icon>
                View Replies
            </template>
            <template v-else class="d-inline">
                <iconify-icon icon="mdi:chevron-up" width="26" height="26"></iconify-icon>
                Hide Replies
            </template>
        </div>
    <div v-if="repliesShown">
        <slot></slot>
    </div>
</template>

<script>
export default {
    name: "ViewReplies",
    data() {
        return {
            repliesShown: {
                type: Boolean,
                default: false
            }
        }
    },
    methods: {
        viewReplies() {
            this.repliesShown = !this.repliesShown;
        }
    },
    mounted() {
        this.repliesShown = false;
    }
}

</script>

<style lang="scss" scoped>
@import './../../sass/_variables.scss';
.view-form-button {
    font-weight: bolder;
    font-size: 0.9rem;
    padding: 0.1rem 0.6rem 0.1rem 0.6rem;
    border-radius: 20px;
}
.view-form-button:hover {
    cursor: pointer;
    background-color: lighten($primary, 45%) !important;
    /*text-decoration: underline;*/
}
</style>
