<template>
    <Navbar>
        <PageTitle>
            <Title>Home</Title>
            <Breadcrumb><span>Home</span></Breadcrumb>
        </PageTitle>
        <RightSide></RightSide>
    </Navbar>
    <div>
        <div class="flex my-8 justify-between gap-x-4">
            <SmallCard>
                <Heading1>{{ pending }}</Heading1>
                <Heading5>Pending Order</Heading5>
            </SmallCard>
            <SmallCard>
                <Heading1>{{ approved }}</Heading1>
                <Heading5>Approved Order</Heading5>
            </SmallCard>
            <SmallCard>
                <Heading1>{{ completed }}</Heading1>
                <Heading5>Completed Order</Heading5>
            </SmallCard>
            <SmallCard v-if="isCustomer">
                <Heading1>{{ total }}</Heading1>
                <Heading5>Total Order</Heading5>
            </SmallCard>
            <SmallCard v-if="!isCustomer">
                <Heading1>RM{{ total }}</Heading1>
                <Heading5>Total Earned</Heading5>
            </SmallCard>
        </div>

        <!--  Customer  -->
        <div v-if="isCustomer">
            <Heading2>Active Order</Heading2>
            <div v-if="orders == 0">
                <Heading5>No Orders Yet</Heading5>
            </div>
            <div v-if="!(orders == 0)">
                <Heading5>Check your order status</Heading5>
            </div>
        </div>

        <!--  Sprinter  -->
        <div v-else>
            <Heading2>Pending Order</Heading2>
            <div v-if="orders == 0">
                <Heading5>No Pending Orders</Heading5>
            </div>
            <div v-if="!(orders == 0)">
                <Heading5>Approve or reject orders</Heading5>
            </div>
        </div>

        <!--  Order Status (Customer) / Pending Order (Sprinter)  -->
        <div class="mt-4 grid grid-cols-2 gap-4">
            <div
                v-for="o in orders"
                :key="{ orders: o.order_id }"
                class="bg-white p-6 rounded-lg shadow-sm"
            >
                <div class="flex justify-between">
                    <div class="text-xl font-semibold">
                        Order #{{ o.order_id }}
                    </div>
                    <div class="text-sm align-middle mt-1">
                        <span
                            v-if="o.order_status === 2"
                            class="bg-amber-100 text-amber-700 px-2 py-1 rounded-md font-semibold align-middle"
                            >Pending</span
                        >
                        <span
                            v-else-if="o.order_status === 3"
                            class="bg-blue-100 text-blue-700 px-2 py-1 rounded-md font-semibold align-middle"
                            >Approved</span
                        >
                        <span
                            v-else-if="o.order_status === 4"
                            class="bg-purple-100 text-purple-700 px-2 py-1 rounded-md font-semibold align-middle"
                            >Printing</span
                        >
                    </div>
                </div>
                <div v-for="s in services" :key="{ services: s.service_id }">
                    <div v-if="o.service_id === s.service_id">
                        <div class="mt-4 text-xs text-gray-400">Sprinter</div>
                        <div class="text-md font-regular">
                            {{ s.service_name }}
                        </div>
                    </div>
                    <div v-if="o.service_id === s.service_id">
                        <div class="mt-2 text-xs text-gray-400">
                            Contact Number
                        </div>
                        <div class="text-md font-regular">
                            {{ s.contact_number }}
                        </div>
                    </div>
                    <div v-if="o.service_id === s.service_id">
                        <div class="mt-2 text-xs text-gray-400">
                            Pickup Location
                        </div>
                        <div class="text-md font-regular">
                            {{ s.pickup_address }}
                        </div>
                    </div>
                </div>
                <div v-if="!isCustomer">
                    <div class="mt-2 text-xs text-gray-400">Price</div>
                    <div class="text-md font-regular">
                        RM{{ o.total_price }}
                    </div>
                </div>
                <div class="flex justify-between mt-2">
                    <div>
                        <div class="mt-2 text-xs text-gray-400">
                            Pickup Date & Time
                        </div>
                        <div class="font-semibold">
                            {{ o.order_pickup_date }}, {{ o.order_pickup_time }}
                        </div>
                    </div>

                    <div
                        v-if="isCustomer"
                        class="mt-4 inline-block align-middle"
                    >
                        <Link
                            v-if="o.order_status < 4"
                            :href="'/cancel/' + o.order_id"
                            method="put"
                            class="px-3 py-2 text-sm font-semibold border border-indigo-400 text-indigo-400 rounded-md hover:text-indigo-500 hover:border-indigo-500"
                            >Cancel Order</Link
                        >
                        <span
                            v-else
                            class="px-4 py-2 text-sm font-semibold border border-gray-300 text-gray-300 rounded-md"
                        >
                            Cancel Order
                        </span>
                    </div>
                    <div v-if="!isCustomer" class="mt-2">
                        <div class="flex gap-x-2">
                            <Link
                                v-if="o.order_status < 4"
                                v-bind:href="'/approve/' + o.order_id"
                                method="put"
                                class="px-3 py-2 text-sm font-semibold bg-indigo-500 text-white rounded-md"
                                >Approve</Link
                            >
                            <Link
                                v-if="o.order_status < 4"
                                v-bind:href="'/reject/' + o.order_id"
                                method="put"
                                class="px-3 py-2 text-sm font-semibold border border-indigo-500 text-indigo-500 rounded-md"
                                >Reject</Link
                            >
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br />

        <!--  Pickup Order (Customer) / Completed Order (Sprinter)  -->

        <Heading2>Completed Order</Heading2>
        <div v-if="pickups == 0">
            <Heading5>No orders to be collected</Heading5>
        </div>
        <div v-if="!(pickups == 0)">
            <Heading5>Ready for collection</Heading5>
        </div>

        <div class="mt-4 grid grid-cols-2 gap-4">
            <div
                v-for="p in pickups"
                :key="{ orders: p.order_id }"
                class="bg-white p-6 rounded-lg shadow-sm"
            >
                <div class="flex justify-between">
                    <div class="text-xl font-semibold">
                        Order #{{ p.order_id }}
                    </div>
                    <div class="text-sm align-middle mt-1">
                        <span
                            class="bg-emerald-100 text-emerald-700 px-2 py-1 rounded-md font-semibold align-middle"
                            >Completed</span
                        >
                    </div>
                </div>
                <div v-for="s in services" :key="{ services: s.service_id }">
                    <div v-if="p.service_id === s.service_id">
                        <div class="mt-4 text-xs text-gray-400">
                            Service Name
                        </div>
                        <div class="text-md font-regular">
                            {{ s.service_name }}
                        </div>
                    </div>
                    <div v-if="p.service_id === s.service_id">
                        <div class="mt-2 text-xs text-gray-400">
                            Contact Number
                        </div>
                        <div class="text-md font-regular">
                            {{ s.contact_number }}
                        </div>
                    </div>
                    <div v-if="p.service_id === s.service_id">
                        <div class="mt-2 text-xs text-gray-400">
                            Pickup Location
                        </div>
                        <div class="text-md font-regular">
                            {{ s.pickup_address }}
                        </div>
                    </div>
                </div>
                <div v-if="!isCustomer">
                    <div class="mt-2 text-xs text-gray-400">Price</div>
                    <div class="text-md font-regular">
                        RM{{ p.total_price }}
                    </div>
                </div>
                <div class="flex justify-between mt-2">
                    <div>
                        <div class="mt-2 text-xs text-gray-400">
                            Pickup Date & Time
                        </div>
                        <div class="text-md font-semibold">
                            {{ p.order_pickup_date }}, {{ p.order_pickup_time }}
                        </div>
                    </div>
                    <div v-if="!isCustomer" class="mt-2">
                        <div class="flex gap-x-2">
                            <Link
                                v-bind:href="'/pickup/' + p.order_id"
                                method="put"
                                class="px-3 py-2 text-sm font-semibold bg-indigo-500 text-white rounded-md"
                                >Order Collected</Link
                            >
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { computed } from "vue";
import { Link, usePage } from "@inertiajs/inertia-vue3";
import Navbar from "@/Layouts/Topbar/Navbar.vue";
import PageTitle from "@/Layouts/Topbar/PageTitle.vue";
import Title from "@/Layouts/Topbar/Title.vue";
import Breadcrumb from "@/Layouts/Topbar/Breadcrumb.vue";
import RightSide from "@/Layouts/Topbar/RightSide.vue";
import Heading1 from "@/Layouts/UI/Heading1.vue";
import Heading2 from "@/Layouts/UI/Heading2.vue";
import Heading5 from "@/Layouts/UI/Heading5.vue";
import SmallCard from "@/Layouts/UI/SmallCard.vue";

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
</script>
