<template>
    <div class="tag-input">
        <div class="mb-2">
      <span
          v-for="(tag, index) in tags"
          :key="index"
          class="badge bg-secondary me-1 mt-1 d-inline-flex flex-row align-items-center justify-content-center tag-badge"
      >
        {{ tag }}
        <input
            type="hidden"
            :name="`${inputName}[${index}]`"
            :value="tag"
        />
        <button
            @click="removeTag(index)"
            class="ms-2 remove-button"
            type="button"
            aria-label="Remove tag"
        ><iconify-icon class="d-flex flex-row justify-content-center align-items-center" width="20" height="20" style="color: white;" icon="mdi:close-circle-outline"></iconify-icon></button>
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
import { ref } from "vue";

export default {
    props: {
        inputName: {
            type: String,
            required: true,
        },
    },
    setup() {
        const tags = ref([]);
        const newTag = ref("");

        const addTag = () => {
            if (!newTag.value.trim()) return;

            tags.value.push(newTag.value.trim());
            newTag.value = "";
        };

        const removeTag = (index) => {
            tags.value.splice(index, 1);
        };

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
