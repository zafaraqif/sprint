<template>
    <h1>Order ID #{{ order.order_id }}</h1>
    <span>Service Name: {{ service.service_name }}</span> <br />
    <span>Pickup Date: {{ order.order_pickup_date }}</span> <br />
    <span>Pickup Time: {{ order.order_pickup_time }}</span> <br />
    <span>Pickup Location: {{ service.pickup_address }}</span> <br />
    <span v-if="!isOrder">
        <span
            >Order Status:
            <span v-if="order.order_status === 0">Rejected</span>
            <span v-else-if="order.order_status === 1">Cancelled</span>
            <span v-else-if="order.order_status === 2">Pending</span>
            <span v-else-if="order.order_status === 3">Approved</span>
            <span v-else-if="order.order_status === 4">Printing</span>
            <span v-else-if="order.order_status === 5">Completed</span>
            <span v-else-if="order.order_status === 6">Collected</span> </span
        ><br /><br />
    </span>

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
    </div>
    <div v-if="isOrder">
        <div>
            <Link
                as="button"
                v-bind:href="'/order/' + order.order_id + '/payment/create'"
                >Next</Link
            >
        </div>
    </div>
</template>

<script setup>
import { computed } from "vue";
import { usePage, Link } from "@inertiajs/inertia-vue3";

const page = usePage();

defineProps({
    order: Object,
    service: Object,
    files: Array,
    page: String,
});

const isOrder = computed(() => page.props.value.page == "order");
</script>
