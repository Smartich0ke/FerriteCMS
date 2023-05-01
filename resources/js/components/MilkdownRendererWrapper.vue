<script setup lang="ts">
import { defineProps } from 'vue';
import Milkdown from './MilkdownReadOnlyViewer.vue'
import { MilkdownProvider } from '@milkdown/vue';

const props = defineProps({
    postbody: {
        type: String,
        required: true,
    },
});

</script>

<template>
    <MilkdownProvider>
        <Milkdown :postbody="props.postbody" />
    </MilkdownProvider>
</template>
