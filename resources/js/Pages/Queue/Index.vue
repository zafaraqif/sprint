<template>
    <h1>Print Queue</h1>
    <div v-if="orders == 0">No Order(s) Yet</div>
    <div v-for="(order, index) in orders" :key="order.order_id">
        Order ID: #{{ order.order_id }}<br />
        Pickup Date: {{ order.order_pickup_date }}<br />
        Pickup Time: {{ order.order_pickup_time }}<br />
        Price: RM{{ order.total_price }}<br />
        Order Status:
        <span v-if="order.order_status === 3">
            Approved<br />
            <Link :href="'/printing/' + order.order_id" method="put"
                >Print Order</Link
            ><br />
        </span>
        <span v-else-if="order.order_status === 4">
            Printing<br />
            <Link :href="'/complete/' + order.order_id" method="put"
                >Complete Order</Link
            ><br />
        </span>
        <Link :href="'/order/' + order.order_id + '/file'"
            >File ({{ files[index] }})</Link
        ><br /><br />
    </div>
</template>

<script setup>
import { Link } from "@inertiajs/inertia-vue3";

const props = defineProps({
    orders: Object,
    files: Array,
});
</script>
