<template>
    <Navbar>
        <PageTitle>
            <Title>Order History</Title>
            <Breadcrumb><span>Order History</span></Breadcrumb>
        </PageTitle>
        <RightSide></RightSide>
    </Navbar>
    <div>
        <table
            class="w-full table-auto mt-4 bg-white rounded-lg text-left shadow-sm"
        >
            <thead>
                <tr class="border-b border-gray-200">
                    <th class="text-md font-semibold p-6">Order ID</th>
                    <th class="text-md font-semibold p-6">Pickup Date</th>
                    <th class="text-md font-semibold p-6">Pickup Time</th>
                    <th class="text-md font-semibold p-6">Total Price</th>
                    <th class="text-md font-semibold p-6">Order Status</th>
                    <th class="text-md font-semibold p-6">Action</th>
                </tr>
            </thead>
            <tbody v-if="orders == 0">
                <tr class="text-center">
                    <td class="p-6 text-gray-500 font-semibold" colspan="6">
                        No orders yet
                    </td>
                </tr>
            </tbody>
            <tbody v-for="order in orders" :key="order.order_id">
                <tr class="border-b border-gray-100">
                    <td class="p-6 font-semibold">#{{ order.order_id }}</td>
                    <td class="p-6">
                        {{ order.order_pickup_date }}
                    </td>
                    <td class="p-6">
                        {{ order.order_pickup_time }}
                    </td>
                    <td class="p-6">RM{{ order.total_price }}</td>
                    <td class="p-6 text-sm" v-if="order.order_status === 0">
                        <span
                            class="bg-red-100 text-red-700 px-2 py-1 rounded-md font-semibold"
                            >Rejected</span
                        >
                    </td>
                    <td
                        class="p-6 text-sm"
                        v-else-if="order.order_status === 1"
                    >
                        <span
                            class="bg-gray-100 text-gray-700 px-2 py-1 rounded-md font-semibold"
                            >Cancelled</span
                        >
                    </td>
                    <td
                        class="p-6 text- text-sm"
                        v-else-if="order.order_status === 2"
                    >
                        <span
                            class="bg-amber-100 text-amber-700 px-2 py-1 rounded-md font-semibold"
                            >Pending</span
                        >
                    </td>
                    <td
                        class="p-6 text- text-sm"
                        v-else-if="order.order_status === 3"
                    >
                        <span
                            class="bg-blue-100 text-blue-700 px-2 py-1 rounded-md font-semibold"
                            >Approved</span
                        >
                    </td>
                    <td
                        class="p-6 text- text-sm"
                        v-else-if="order.order_status === 4"
                    >
                        <span
                            class="bg-purple-100 text-purple-700 px-2 py-1 rounded-md font-semibold"
                            >Printing</span
                        >
                    </td>
                    <td
                        class="p-6 text- text-sm"
                        v-else-if="order.order_status === 5"
                    >
                        <span
                            class="bg-emerald-100 text-emerald-700 px-2 py-1 rounded-md font-semibold"
                            >Completed</span
                        >
                    </td>
                    <td
                        class="p-6 text- text-sm"
                        v-else-if="order.order_status === 6"
                    >
                        <span
                            class="bg-teal-100 text-teal-700 px-2 py-1 rounded-md font-semibold"
                            >Collected</span
                        >
                    </td>
                    <td class="p-6 justify-start grid grid-cols-1 gap-x-4">
                        <Link
                            :href="
                                route('order.show', { order: order.order_id })
                            "
                            class="px-3 py-2 border border-indigo-500 text-indigo-500 rounded-md text-sm font-semibold text-center"
                        >
                            View Order
                        </Link>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script setup>
import { Link } from "@inertiajs/inertia-vue3";
import Navbar from "@/Layouts/Topbar/Navbar.vue";
import PageTitle from "@/Layouts/Topbar/PageTitle.vue";
import Title from "@/Layouts/Topbar/Title.vue";
import Breadcrumb from "@/Layouts/Topbar/Breadcrumb.vue";
import RightSide from "@/Layouts/Topbar/RightSide.vue";
defineProps({
    orders: Object,
});
</script>
