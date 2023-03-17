<template>
    <h1>Order ID #{{ order.order_id }}</h1>
    <div v-for="(file, index) in files" :key="file.file_id">
        <h2>File {{ index + 1 }}</h2>
        <a
            :href="'/order/' + order.order_id + '/file/' + file.file_id"
            target="_blank"
            >View File</a
        >
    </div>
</template>

<script setup>
import { Link, usePage } from "@inertiajs/inertia-vue3";

const page = usePage();

defineProps({
    files: Object,
    order: Object,
});
</script>
