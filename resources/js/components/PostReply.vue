<template>
    <div class="d-flex flex-row align-items-center gap-1">
    <div class="like-button button-hover-pill d-flex flex-row align-items-center" @click="likeAndUpdate()">
        <template v-if="likeStatus"><iconify-icon icon="mdi:cards-heart" height="20" width="20" style="color: #6c757d;"></iconify-icon></template>
        <template v-else><iconify-icon icon="mdi:cards-heart-outline" height="20" width="20" style="color: #6c757d;"></iconify-icon></template>
        <span style="color: #6c757d;" >{{ likescount }}</span>
    </div>
    <div @click="showForm()" class="text-sm text-dark view-form-button button-hover-pill d-inline">
        <template v-if="!formShown">
            Reply
        </template>
        <template v-else>
            Cancel
        </template>
    </div>
    </div>
    <div v-if="formShown" class="reply-form w-100">
        <form action="/comments/create" method="post" class="w-100">
            <input type="hidden" name="_token" :value="csrf">
            <input type="hidden" name="post_id" :value="postid">
            <input type="hidden" name="parent_id" :value="parentid">
            <div class="d-flex flex-row gap-2">
                <div class="flex-grow-1">
                    <input type="text" name="name" class="form-control" placeholder="Name">
                </div>
                <div class="flex-grow-1">
                    <input type="text" name="email" class="form-control" placeholder="Email (not shown publicly)">
                </div>
            </div>
            <div class="mt-2">
                <textarea class="form-control" name="text" placeholder="Comment" rows="2"></textarea>
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
            formShown: false,
            likescount: 0,
            likeStatus: false,
        }
    },
    props: {
        initialLikeStatus: {
            type: Boolean,
            default: false,
            required: true
        },
        postid: {
            type: String,
            required: true
        },
        parentid: {
            type: String,
            required: true
        },
        commentid: {
            type: String,
            required: true
        },
        csrf: {
            type: String,
            required: true
        },
        initialLikesCount: {
            type: Number,
            default: 0,
            required: true
        }
    },
    methods: {
        showForm() {
            this.formShown = !this.formShown;
        },
        likeAndUpdate() {
            const requestOptions = {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({
                    comment_id: this.commentid,
                })
            };
            fetch('/api/comments/'+this.commentid+'/like', requestOptions)
                .then(response => response.json()
                .then(data => {
                    this.likescount = data.likes;
                    this.likeStatus = data.liked;
                }
                )
            );
        },
    },
    mounted() {
        this.formShown = false;
        this.likescount = this.initialLikesCount;
        this.likeStatus = this.initialLikeStatus;
    }
}
</script>

<style lang="scss" scoped>
@import './../../sass/_variables.scss';
.view-form-button {
    font-weight: bolder;
    font-size: 0.9rem;
}
.reply-form {
    position: relative;
    top: 0;
    left: 0;

}
.like-button {
    font-size: 0.9rem;
    margin-left: -0.6rem;
}
</style>
