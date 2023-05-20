<template>
    <div class="d-flex flex-row align-items-center gap-1">
    <iconify-icon icon="mdi:cards-heart-outline" height="20" width="20" style="color: #6c757d;"></iconify-icon>
    <div @click="showForm()" class="text-sm text-dark view-form-button d-inline">
        <template v-if="!formShown">
            Reply
        </template>
        <template v-else>
            Cancel
        </template>
    </div>
    </div>
    <div v-if="formShown" class="reply-form w-100">
        <form action="" class="w-100">
            <div class="d-flex flex-row gap-2">
                <div class="flex-grow-1">
                    <input type="text" class="form-control" placeholder="Name">
                </div>
                <div class="flex-grow-1">
                    <input type="text" class="form-control" placeholder="Email (not shown publicly)">
                </div>
            </div>
            <div class="mt-2">
                <textarea class="form-control" placeholder="Comment" rows="2"></textarea>
            </div>
            <div class="mt-2">
                <button class="btn btn-primary">Submit</button>
            </div>

        </form>
    </div>
</template>

<script>
export default {
    name: "PostReply",
    data() {
        return {
            formShown: {
                type: Boolean,
                default: false
            }
        }
    },
    methods: {
        showForm() {
            this.formShown = !this.formShown;
        }
    },
    mounted() {
        this.formShown = false;
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
    background-color: $gray-200;
}
.reply-form {
    position: relative;
    top: 0;
    left: 0;

}
</style>
