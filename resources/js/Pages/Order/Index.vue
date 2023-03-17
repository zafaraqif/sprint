<template>
    <h1>Order History</h1>
    <div v-if="orders == 0">No Order(s) Yet&nbsp;</div>
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
    </div>
</template>

<script setup>
import { Link } from "@inertiajs/inertia-vue3";
defineProps({
    orders: Array,
});
</script>
