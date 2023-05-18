<template>
    <div @click="showForm()" class="text-sm text-primary view-form-button d-inline">
        <template v-if="!formShown">
            Post Reply
        </template>
        <template v-else>
            Cancel
        </template>
    </div>
    <div v-if="formShown">
        <form action="">
            <div class="d-flex flex-row gap-2">
                <div class="flex-grow-1">
                    <input type="text" class="form-control" placeholder="Name">
                </div>
                <div class="flex-grow-1">
                    <input type="text" class="form-control" placeholder="Email">
                </div>
            </div>
            <div class="mt-2">
                <textarea class="form-control" placeholder="Comment" rows="4"></textarea>
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
