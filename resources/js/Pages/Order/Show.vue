<template>
    <h1>Order ID #{{ order.order_id }}</h1>
    <span>Service Name: {{ service.service_name }}</span> <br />
    <span>Pickup Date: {{ order.order_pickup_date }}</span> <br />
    <span>Pickup Time: {{ order.order_pickup_time }}</span> <br />
    <span>Pickup Location: {{ service.pickup_address }}</span> <br />

    <div v-for="file in files" :key="file.file_id">
        <h2>File {{ (counter += 1) }}</h2>
        File Pages: {{ file.page_no }} <br />
        Pages Per Sheet: {{ file.pages_per_sheet }} <br />
        Print Color: {{ file.print_color }} <br />
        Print Method: {{ file.print_method }} <br />
        Paper Weight: {{ file.paper_weight }} <br />
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

const counter = 0;

const isOrder = computed(() => page.props.value.page == "order");
</script>
