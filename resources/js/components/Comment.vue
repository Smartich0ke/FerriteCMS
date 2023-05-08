<template>
    <div class="comment">
        <img :src="gravatarUrl" alt="Gravatar" />
        <div class="comment-info">
            <span class="comment-author">{{ comment.author }}</span>
            <span class="comment-date">{{ comment.date }}</span>
        </div>
        <p class="comment-text">{{ comment.text }}</p>
        <button @click.prevent="likeComment">Like ({{ comment.likes }})</button>
        <button @click="toggleReplyForm">Reply</button>
        <div v-if="showReplyForm">
            <CommentForm :parentCommentId="comment.id" :postId="postId" @commentSubmitted="toggleReplyForm" />
        </div>
        <div v-if="replies.length > 0">
            <div v-for="(reply, index) in replies" :key="index">
                <AsyncComment :comment="reply" :postId="postId" :postSlug="postSlug" />
            </div>
        </div>

    </div>
</template>

<script>
import CommentList from './CommentList.vue';
import axios from 'axios';
import md5 from 'md5';
import CommentForm from "./CommentForm.vue";

export default {
    components: {
        CommentForm,
        CommentList,
    },
    props: {
        comment: Object,
        postId: String,
        postSlug: String,
    },
    computed: {
        gravatarUrl() {
            return `https://www.gravatar.com/avatar/${md5(this.comment.email)}?d=identicon`;
        },
        replies() {
            return this.comment.replies || [];
        },
    },
    methods: {
        async likeComment() {
            try {
                const response = await axios.post(`/api/comments/${this.comment.id}/like`);
                this.comment.likes = response.data.likes;
            } catch (error) {
                console.error(error);
            }
        },
        toggleReplyForm() {
            this.showReplyForm = !this.showReplyForm;
        },
        async fetchReplies() {
            try {
                const response = await axios.get(`/api/posts/${this.postSlug}/comments`, {
                    params: {
                        parent_id: this.comment.id,
                    },
                });
                this.comment.replies = response.data;
            } catch (error) {
                console.error(error);
            }
        },
    },
    data() {
        return {
            showReplyForm: false,
        };
    },
    async mounted() {
        if (!this.comment.replies) {
            try {
                const response = await axios.get(`/api/posts/${this.postId}/comments`, {
                    params: {
                        parent_id: this.comment.id,
                    },
                });
                this.comment.replies = response.data;
            } catch (error) {
                console.error(error);
            }
        }
    },
    // mounted() {
    //     this.fetchReplies();
    // },
};
</script>

<style scoped>
.comment {
    display: flex;
    align-items: center;
    margin-bottom: 1rem;
}

.comment img {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    margin-right: 0.5rem;
}

.comment-info {
    font-size: 0.9rem;
    color: #888;
}

.comment-author {
    font-weight: bold;
    margin-right: 0.5rem;
}

.comment-text {
    margin: 0.5rem 0;
}
</style>
