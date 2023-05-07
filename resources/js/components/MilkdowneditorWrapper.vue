<script setup lang="ts">
import Milkdown from './MilkdownEditor.vue'
import { MilkdownProvider } from '@milkdown/vue';
import {defineProps} from "vue";

const props = defineProps({
    postbody: {
        type: String,
        required: false,
        default: ''
    },
});
</script>

<template>
    <MilkdownProvider>
        <Milkdown :postbody="props.postbody" />
    </MilkdownProvider>
</template>
