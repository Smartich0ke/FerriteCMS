<template>
    <div class="comment-list">
        <CommentForm :postId="postId" />
        <div v-for="(comment, index) in comments" :key="index">
            <Comment :comment="comment" :postId="postId" :postSlug="postSlug" />
        </div>


    </div>
</template>

<script>
import CommentForm from './CommentForm.vue';
import {ref, onMounted, defineAsyncComponent, watch} from 'vue';
import axios from 'axios';
import Comment from './Comment.vue';

const AsyncComment = defineAsyncComponent(() => import('./Comment.vue'));

export default {
    components: {
        CommentForm,
        AsyncComment,
        Comment,
    },
    props: {
        postSlug: String,
        postId: String,
    },
    setup(props, context) {
        const comments = ref([]);

        const fetchComments = async () => {
            if (!props.postSlug) {
                console.error('postSlug is not defined');
                return;
            }

            try {
                const response = await axios.get(`/api/posts/${props.postSlug}/comments`);
                comments.value = response.data;
            } catch (error) {
                console.error(error);
            }
        };

        onMounted(fetchComments);

        return {
            comments,
        };
    },
};
</script>
