<template>
    <div class="comment-form">
        <form @submit.prevent="submitComment">
            <label for="name">Name:</label>
            <input type="text" id="name" v-model="name" required />

            <label for="email">Email:</label>
            <input type="email" id="email" v-model="email" required />

            <label for="comment">Comment:</label>
            <textarea id="comment" v-model="comment" required></textarea>

            <!-- Include the reCAPTCHA widget here -->

            <button type="submit">Submit Comment</button>
        </form>
    </div>
</template>

<script>
import { ref } from 'vue';
import axios from 'axios';

export default {
    props: {
        parentCommentId: {
            type: Number,
            default: null,
        },
        postId : {
            type: String,
            default: null,
        }
    },
    setup(props, context) {
        const name = ref('');
        const email = ref('');
        const comment = ref('');

        const submitComment = async () => {
            try {
                await axios.post('/api/comments', {
                    author: name.value,
                    email: email.value,
                    text: comment.value,
                    post_id: props.postId,
                    parent_id: props.parentCommentId,
                });
                name.value = '';
                email.value = '';
                comment.value = '';
                // Emit the event
                context.emit('commentSubmitted');
            } catch (error) {
                console.error(error);
            }
        };

        return {
            name,
            email,
            comment,
            submitComment,
        };
    },
};
</script>
