<template>
    <div class="tag-input">
        <div class="mb-2">
      <span
          v-for="(tag, index) in tags"
          :key="index"
          class="badge bg-secondary me-1 mt-1 d-inline-flex flex-row align-items-center justify-content-center tag-badge"
      >
        {{ tag }}
        <button
            @click="removeTag(index)"
            class="ms-2 remove-button"
            type="button"
            aria-label="Remove tag"
        >
            <iconify-icon class="d-flex flex-row justify-content-center align-items-center" width="20" height="20" style="color: white;" icon="mdi:close-circle-outline"></iconify-icon>
        </button>
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
            type: String,
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

<style>
.remove-button {
    background: none;
    border: none;
    padding: 0;
}
.tag-badge {
    font-size: 0.8rem;
}
</style>
