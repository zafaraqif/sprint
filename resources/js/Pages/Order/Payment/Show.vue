<template>
    <Show></Show>
</template>

<script setup>
import Show from "@/Pages/Order/Show.vue";

defineProps({
    order: Object,
    service: Object,
    files: Array,
});
</script>
