<template>
    <h1>Home</h1>
    <h2>Hi, {{ user.name }}!</h2>
    <div>Pending Order {{ pending }}</div>
    <div>Completed Order {{ completed }}</div>
    <div>Total Order {{ total }}</div>

    <div v-if="isCustomer">
        <h2>Customer View</h2>
        <h2>Order Status</h2>
        <div v-for="o in orders" :key="{ orders: o.order_id }">
            Order ID: #{{ o.order_id }} <br />
            <span v-for="s in services" :key="{ services: s.service_id }">
                <span v-if="o.service_id === s.service_id">
                    Service Name: {{ s.service_name }}<br
                /></span>
            </span>
            <span v-for="s in services" :key="{ services: s.service_id }">
                <span v-if="o.service_id === s.service_id">
                    Contact Number: {{ s.contact_number }}<br
                /></span>
            </span>
            <span v-for="s in services" :key="{ services: s.service_id }">
                <span v-if="o.service_id === s.service_id">
                    Pickup Location: {{ s.pickup_address }}<br
                /></span>
            </span>
            Pickup Date: {{ o.order_pickup_date }} <br />
            Pickup Time: {{ o.order_pickup_time }} <br />
            Order Status: {{ o.order_status }} <br />

            <span v-if="o.order_status < 3"
                ><Link
                    :href="route('order.destroy', { order: o.order_id })"
                    method="delete"
                    >Cancel</Link
                ></span
            >
            <br />
            <br />
        </div>

        <h2>Pickup Order</h2>
        <div v-for="p in pickups" :key="{ pickups: p.order_id }">
            Order ID: #{{ p.order_id }} <br />
            <span v-for="s in services" :key="{ services: s.service_id }">
                <span v-if="p.service_id === s.service_id">
                    Service Name: {{ s.service_name }}<br
                /></span>
            </span>
            <span v-for="s in services" :key="{ services: s.service_id }">
                <span v-if="p.service_id === s.service_id">
                    Contact Number: {{ s.contact_number }}<br
                /></span>
            </span>
            <span v-for="s in services" :key="{ services: s.service_id }">
                <span v-if="p.service_id === s.service_id">
                    Pickup Location: {{ s.pickup_address }}<br
                /></span>
            </span>
            Pickup Date: {{ p.order_pickup_date }} <br />
            Pickup Time: {{ p.order_pickup_time }} <br />
            Order Status: {{ p.order_status }} <br />
            <br />
        </div>
    </div>

    <div v-else>
        <h2>Sprinter View</h2>
    </div>
</template>

<script setup>
import { computed } from "vue";
import { Link, usePage } from "@inertiajs/inertia-vue3";

defineProps({
    pending: Number,
    completed: Number,
    total: Number,
    orders: Array,
    pickups: Array,
    services: Array,
});

const page = usePage();
const isCustomer = computed(() => page.props.value.user.user_type == 1);
const user = computed(() => page.props.value.user);
</script>
