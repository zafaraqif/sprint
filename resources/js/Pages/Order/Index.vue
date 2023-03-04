<template>
    <h1>Order Page</h1>
    <div v-for="order in orders" :key="order.order_id">
        {{ order.total_price }}
    </div>
</template>

<script setup>
import { Link } from "@inertiajs/inertia-vue3";
defineProps({
    orders: Array,
});
</script>
