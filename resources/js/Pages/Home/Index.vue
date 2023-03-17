<template>
    <h1>Home</h1>
    <h2>Hi, {{ user.name }}!</h2>

    <div>Pending Order: {{ pending }}</div>
    <div>Approved Order: {{ approved }}</div>
    <div>Completed Order: {{ completed }}</div>

    <!--  Customer  -->
    <div v-if="isCustomer">
        Total Order: {{ total }}
        <h2>Order Status</h2>
        <div v-if="orders == 0">No Order(s) Yet &nbsp;</div>
    </div>

    <!--  Sprinter  -->
    <div v-else>
        Total Earned: RM{{ total }}
        <h2>Pending Order</h2>
        <div v-if="orders == 0">No Pending Order(s) &nbsp;</div>
    </div>

    <!--  Order Status (Customer) / Pending Order (Sprinter)  -->
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
        <span
            >Order Status:
            <span v-if="o.order_status === 0">Rejected</span>
            <span v-else-if="o.order_status === 1">Cancelled</span>
            <span v-else-if="o.order_status === 2">Pending</span>
            <span v-else-if="o.order_status === 3">Approved</span>
            <span v-else-if="o.order_status === 4">Printing</span>
            <span v-else-if="o.order_status === 5">Completed</span>
            <span v-else-if="o.order_status === 6">Collected</span> </span
        ><br />
        <span v-if="isCustomer">
            <span v-if="o.order_status < 4"
                ><Link :href="'/cancel/' + o.order_id" method="put"
                    >Cancel</Link
                ></span
            ><span v-else> Cancel </span><br />
        </span>
        <span v-if="!isCustomer">
            Price: RM{{ o.total_price }} <br />
            <Link v-bind:href="'/approve/' + o.order_id" method="put"
                >Approve</Link
            ><br />
            <Link v-bind:href="'/reject/' + o.order_id" method="put"
                >Reject</Link
            ><br />
        </span>
        <br />
    </div>

    <!--  Pickup Order (Customer) / Completed Order (Sprinter)  -->
    <div v-if="isCustomer">
        <h2>Collect Order</h2>
        <div v-if="pickups == 0">No Order(s) to be Collected &nbsp;</div>
    </div>
    <div v-else>
        <h2>Order Collection</h2>
        <div v-if="pickups == 0">No Order(s) Collection&nbsp;</div>
    </div>

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
        <span
            >Order Status:
            <span v-if="p.order_status === 0">Rejected</span>
            <span v-else-if="p.order_status === 1">Cancelled</span>
            <span v-else-if="p.order_status === 2">Pending</span>
            <span v-else-if="p.order_status === 3">Approved</span>
            <span v-else-if="p.order_status === 4">Printing</span>
            <span v-else-if="p.order_status === 5">Completed</span>
            <span v-else-if="p.order_status === 6">Collected</span> </span
        ><br />
        <span v-if="!isCustomer">
            <Link v-bind:href="'/pickup/' + p.order_id" method="put"
                >Order Collected</Link
            ><br /><br />
        </span>
    </div>
</template>

<script setup>
import { computed } from "vue";
import { Link, usePage } from "@inertiajs/inertia-vue3";

defineProps({
    pending: Number,
    approved: Number,
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
