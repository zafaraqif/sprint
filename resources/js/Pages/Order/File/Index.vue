<template>
    <h1>Order ID #{{ order.order_id }}</h1>
    <div v-for="(file, index) in files" :key="file.file_id">
        <h2>File {{ index + 1 }}</h2>
        Pages Per Sheet: {{ file.pages_per_sheet }} <br />
        Page Orientation:
        <span v-if="file.orientation === 1"> Portrait<br /> </span>
        <span v-else> Landscape <br /> </span>
        Print Color:
        <span v-if="file.print_color === 1"> Black & White<br /> </span>
        <span v-else> Color <br /> </span>
        Print Method:
        <span v-if="file.print_method === 1"> One-Sided<br /> </span>
        <span v-else> Two-Sided <br /> </span>
        Paper Thickness:
        <span v-if="file.paper_weight === 0"> 70gsm Paper<br /> </span>
        <span v-else> 80gsm Paper <br /> </span>
        Total Sheets: {{ file.sheets_to_print }} <br />
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
