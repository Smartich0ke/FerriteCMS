<template>
        <div @click="viewReplies" class="text-sm text-primary view-form-button d-inline pe-2">
            <template v-if="!repliesShown" class="d-inline">
                View Replies
            </template>
            <template v-else class="d-inline">
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

<style scoped>
.view-form-button {
    font-weight: bolder;
    font-size: 0.9rem;
}
.view-form-button:hover {
    cursor: pointer;
    /*text-decoration: underline;*/
}
</style>
