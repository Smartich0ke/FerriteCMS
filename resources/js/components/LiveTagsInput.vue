<template>
    <div class="tag-input">
        <div class="mb-2">
      <span
          v-for="(tag, index) in tags"
          :key="index"
          class="badge bg-secondary me-1 mt-1"
      >
        {{ tag }}
        <button
            @click="removeTag(index)"
            class="btn-close ms-2"
            type="button"
            aria-label="Remove tag"
        ></button>
      </span>
        </div>
        <input
            type="text"
            class="form-control"
            placeholder="Enter a tag and press enter"
            @keydown.enter.prevent="addTag"
            v-model="newTag"
        />
    </div>
</template>

<script>
import { ref, reactive, watch } from "vue";
import axios from "axios";

export default {
    props: {
        itemId: {
            type: Number,
            required: true,
        },
    },
    setup(props, { emit }) {
        const tags = ref([]);
        const newTag = ref("");

        const addTag = async () => {
            if (!newTag.value.trim()) return;

            const response = await axios.post(`/api/posts/${props.itemId}/tags`, {
                tag: newTag.value.trim(),
            });

            if (response.status === 200) {
                tags.value.push(newTag.value.trim());
                newTag.value = "";
                emit("tag-added");
            }
        };

        const removeTag = async (index) => {
            const tagToRemove = tags.value[index];
            const response = await axios.delete(`/api/posts/${props.itemId}/tags`, {
                data: { tag: tagToRemove },
            });

            if (response.status === 200) {
                tags.value.splice(index, 1);
                emit("tag-removed");
            }
        };

        const fetchTags = async () => {
            const response = await axios.get(`/api/posts/${props.itemId}/tags`);
            if (response.status === 200) {
                tags.value = response.data;
            }
        };

        fetchTags();

        return { tags, newTag, addTag, removeTag };
    },
};
</script>
