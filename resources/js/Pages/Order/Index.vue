<template>
    <h1>Order History</h1>
    <div v-for="order in orders" :key="order.order_id">
        <Link :href="route('order.show', { order: order.order_id })"
            ><span>Order ID: #{{ order.order_id }}</span
            ><br
        /></Link>
        <span>Pickup Date: {{ order.order_pickup_date }}</span
        ><br />
        <span>Pickup Time: {{ order.order_pickup_time }}</span
        ><br />
        <span>Price: RM{{ order.total_price }}</span
        ><br />
        <span>Order Status: {{ order.order_status }}</span
        ><br /><br />
    </div>
</template>

<script setup>
import { Link } from "@inertiajs/inertia-vue3";
defineProps({
    orders: Array,
});
</script>
