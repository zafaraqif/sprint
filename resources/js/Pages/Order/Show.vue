<template>
    <span v-if="isOrder">
        <Navbar>
            <PageTitle>
                <Title>5. Confirm Order</Title>
                <Breadcrumb
                    >Print Order &nbsp;/&nbsp; <span>Community</span>&nbsp; /
                    &nbsp;<span>Sprinter</span> &nbsp;/&nbsp;
                    <span>Order Details</span>&nbsp; /&nbsp;
                    <span>File(s)</span>&nbsp; /&nbsp;
                    <span>Order Summary</span></Breadcrumb
                >
            </PageTitle>
            <RightSide></RightSide>
        </Navbar>
    </span>
    <span v-else>
        <Navbar>
            <PageTitle>
                <Title>Order Summary</Title>
                <Breadcrumb
                    ><a href="/order">Order History</a> &nbsp;/&nbsp;
                    <span>Order #{{ order.order_id }}</span></Breadcrumb
                >
            </PageTitle>
            <RightSide></RightSide>
        </Navbar>
    </span>
    <div v-if="isOrder" class="flex justify-between gap-4 mb-6">
        <div class="w-full h-2 bg-indigo-500 rounded-sm"></div>
        <div class="w-full h-2 bg-indigo-500 rounded-sm"></div>
        <div class="w-full h-2 bg-indigo-500 rounded-sm"></div>
        <div class="w-full h-2 bg-indigo-500 rounded-sm"></div>
        <div class="w-full h-2 bg-indigo-500 rounded-sm"></div>
    </div>
    <div class="w-1/2 p-6 bg-white rounded-lg">
        <div class="flex justify-between">
            <div class="text-xl font-semibold">Order #{{ order.order_id }}</div>
            <div v-if="!isOrder" class="text-sm align-middle mt-1">
                <span
                    v-if="order.order_status === 0"
                    class="bg-red-100 text-red-700 px-2 py-1 rounded-md font-semibold"
                    >Rejected</span
                >
                <span
                    v-if="order.order_status === 1"
                    class="bg-gray-100 text-gray-700 px-2 py-1 rounded-md font-semibold"
                    >Cancelled</span
                >
                <span
                    v-if="order.order_status === 2"
                    class="bg-amber-100 text-amber-700 px-2 py-1 rounded-md font-semibold"
                    >Pending</span
                >
                <span
                    v-else-if="order.order_status === 3"
                    class="bg-blue-100 text-blue-700 px-2 py-1 rounded-md font-semibold"
                    >Approved</span
                >
                <span
                    v-else-if="order.order_status === 4"
                    class="bg-purple-100 text-purple-700 px-2 py-1 rounded-md font-semibold"
                    >Printing</span
                >
            </div>
        </div>

        <div>
            <div class="text-xs mt-4 text-gray-400">Service Name</div>
            <div>{{ service.service_name }}</div>
        </div>
        <div>
            <div class="text-xs mt-2 text-gray-400">Pickup Location</div>
            <div>{{ service.pickup_address }}</div>
        </div>
        <div>
            <div class="text-xs mt-2 text-gray-400">Pickup Date & Time</div>
            <div class="font-semibold">
                {{ order.order_pickup_date }}, {{ order.order_pickup_time }}
            </div>
        </div>

        <div v-for="(file, index) in files" :key="file.file_id">
            <h2 class="mt-6 text-lg font-semibold">File {{ index + 1 }}</h2>
            <div class="flex justify-between">
                <div>
                    <div class="text-xs mt-2 text-gray-400">Per Sheet</div>
                    <div>{{ file.pages_per_sheet }} page(s)</div>
                </div>
                <div>
                    <div class="text-xs mt-2 text-gray-400">Print Color</div>
                    <div>
                        <span v-if="file.print_color === 1"> B&W<br /> </span>
                        <span v-else> Color <br /> </span>
                    </div>
                </div>
                <div>
                    <div class="text-xs mt-2 text-gray-400">Print Method</div>
                    <div>
                        <span v-if="file.print_method === 1">
                            One-Sided<br />
                        </span>
                        <span v-else> Two-Sided <br /> </span>
                    </div>
                </div>
                <div>
                    <div class="text-xs mt-2 text-gray-400">
                        Page Orientation
                    </div>
                    <div>
                        <span v-if="file.orientation === 1">
                            Portrait<br />
                        </span>
                        <span v-else>Landscape <br /> </span>
                    </div>
                </div>
                <div>
                    <div class="text-xs mt-2 text-gray-400">
                        Paper Thickness
                    </div>
                    <div>
                        <span v-if="file.paper_weight === 0">
                            70gsm Paper<br />
                        </span>
                        <span v-else> 80gsm Paper</span>
                    </div>
                </div>
            </div>
        </div>
        <div v-if="isOrder">
            <div class="mt-8">
                <Link
                    as="button"
                    v-bind:href="'/order/' + order.order_id + '/payment/create'"
                    class="px-4 py-2 bg-indigo-500 text-sm text-white rounded-md font-bold"
                    >Confirm & Pay</Link
                >
            </div>
        </div>
    </div>
</template>

<script setup>
import { computed } from "vue";
import { usePage, Link } from "@inertiajs/inertia-vue3";
import Navbar from "@/Layouts/Topbar/Navbar.vue";
import PageTitle from "@/Layouts/Topbar/PageTitle.vue";
import Title from "@/Layouts/Topbar/Title.vue";
import Breadcrumb from "@/Layouts/Topbar/Breadcrumb.vue";
import RightSide from "@/Layouts/Topbar/RightSide.vue";

const page = usePage();

defineProps({
    order: Object,
    service: Object,
    files: Array,
    page: String,
});

const isOrder = computed(() => page.props.value.page == "order");
</script>
