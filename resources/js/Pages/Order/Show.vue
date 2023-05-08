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
        <div class="w-full h-2 bg-indigo-500 rounded-full"></div>
        <div class="w-full h-2 bg-indigo-500 rounded-full"></div>
        <div class="w-full h-2 bg-indigo-500 rounded-full"></div>
        <div class="w-full h-2 bg-indigo-500 rounded-full"></div>
        <div class="w-full h-2 bg-indigo-500 rounded-full"></div>
    </div>
    <div class="flex items-start justify-between gap-x-4">
        <div class="w-1/2">
            <div class="w-full p-6 bg-white rounded-lg">
                <div class="flex justify-between">
                    <div class="text-xl font-semibold">
                        Order #{{ order.order_id }}
                    </div>
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
                    <div class="text-xs mt-4 text-gray-400">Sprinter</div>
                    <div>{{ service.service_name }}</div>
                </div>
                <div>
                    <div class="text-xs mt-2 text-gray-400">
                        Pickup Location
                    </div>
                    <div>{{ service.pickup_address }}</div>
                </div>
                <div>
                    <div class="text-xs mt-2 text-gray-400">
                        Pickup Date & Time
                    </div>
                    <div class="font-semibold">
                        {{ moment(order.order_pickup_date).format("DD MMM") }},
                        {{ moment(time).format("hh:mmA") }}
                    </div>
                </div>

                <div
                    class="flex justify-between mt-4 border-t border-gray-100"
                ></div>

                <div v-for="(file, index) in files" :key="file.file_id">
                    <h2 class="mt-4 text-lg font-semibold">
                        File {{ index + 1 }}
                    </h2>
                    <div class="flex justify-between">
                        <div>
                            <div class="text-xs mt-2 text-gray-400">
                                Per Sheet
                            </div>
                            <div>{{ file.pages_per_sheet }} page(s)</div>
                        </div>
                        <div>
                            <div class="text-xs mt-2 text-gray-400">
                                Print Color
                            </div>
                            <div>
                                <span v-if="file.print_color === 1">
                                    B&W<br />
                                </span>
                                <span v-else> Color <br /> </span>
                            </div>
                        </div>
                        <div>
                            <div class="text-xs mt-2 text-gray-400">
                                Print Method
                            </div>
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

                <div
                    class="flex justify-between mt-4 border-t border-gray-100"
                ></div>

                <div class="mt-4 text-lg font-semibold">Total</div>
                <div class="text-xl font-semibold text-indigo-500">
                    RM{{ order.total_price }}
                </div>
            </div>
            <div v-if="!isOrder" class="mt-6">
                <Link
                    :href="route('order.index')"
                    class="bg-indigo-100 text-indigo-500 font-semibold text-sm px-4 py-2 rounded-md"
                    >Back</Link
                >
            </div>
        </div>

        <div
            v-if="isOrder && order.total_price > 4"
            class="w-1/2 p-6 bg-indigo-500 text-white rounded-lg"
        >
            <div>
                <div class="text-lg font-semibold">Select Payment Type</div>
                <form @submit.prevent="create" class="mt-4">
                    <div class="grid grid-cols-2 gap-x-4">
                        <div class="col-span-1">
                            <div
                                class="p-2 flex justify-start rounded-md border-2 border-slate-300"
                            >
                                <div>
                                    <input
                                        v-model="form.payment_type"
                                        type="radio"
                                        value="1"
                                        class="p-1 m-2"
                                    />
                                </div>
                                <div class="flex-col">
                                    <div class="font-semibold">
                                        Full Payment
                                    </div>
                                    <div class="text-xs text-slate-300">
                                        Pay in full
                                    </div>
                                </div>
                            </div>
                            <div
                                v-if="form.errors.payment_type"
                                class="mt-1 text-xs text-red-500"
                            >
                                {{ form.errors.payment_type }}
                            </div>
                        </div>
                        <div class="col-span-1">
                            <div
                                class="p-2 flex justify-start rounded-md border-2 border-slate-300"
                            >
                                <div>
                                    <input
                                        v-model="form.payment_type"
                                        type="radio"
                                        value="2"
                                        class="p-1 m-2"
                                    />
                                </div>
                                <div class="flex-col">
                                    <div class="font-semibold">Deposit</div>
                                    <div class="text-xs text-slate-300">
                                        Pay 50% upfront
                                    </div>
                                </div>
                            </div>
                            <div
                                v-if="form.errors.payment_type"
                                class="mt-1 text-xs text-red-500"
                            >
                                {{ form.errors.payment_type }}
                            </div>
                        </div>
                    </div>
                    <button
                        type="submit"
                        @click="redirectToCheckout"
                        class="mt-6 px-4 py-2 bg-white text-sm text-indigo-500 rounded-md font-semibold"
                    >
                        Confirm & Pay
                    </button>
                </form>
            </div>
        </div>
        <div
            v-if="isOrder && order.total_price < 4"
            class="w-1/2 p-6 bg-indigo-500 rounded-lg"
        >
            <div>
                <div class="text-lg font-semibold text-white">
                    Payment Details
                </div>
                <Heading5 class="mt-2 text-slate-300 text-sm"
                    >All orders below RM4.00 is not eligible for online payment.
                    Please pay directly to Sprinter upon collection.</Heading5
                >
                <div class="pt-6 pb-2">
                    <Link
                        :href="'/checkout/' + order.order_id"
                        method="post"
                        class="px-4 py-2 bg-white text-sm text-indigo-500 rounded-md font-semibold"
                    >
                        Confirm & Pay Later
                    </Link>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { computed } from "vue";
import { usePage, useForm, Link } from "@inertiajs/inertia-vue3";
import Navbar from "@/Layouts/Topbar/Navbar.vue";
import PageTitle from "@/Layouts/Topbar/PageTitle.vue";
import Title from "@/Layouts/Topbar/Title.vue";
import Breadcrumb from "@/Layouts/Topbar/Breadcrumb.vue";
import RightSide from "@/Layouts/Topbar/RightSide.vue";
import Heading5 from "@/Layouts/UI/Heading5.vue";

const page = usePage();

defineProps({
    order: Object,
    service: Object,
    files: Array,
    time: Object,
    page: String,
});

const isOrder = computed(() => page.props.value.page == "order");

const form = useForm({
    order_id: page.props.value.order.order_id,
    payment_type: null,
});

const create = () => form.post(route("payment.store"));
</script>

<script>
import axios from "axios";
import moment from "moment";

export default {
    data() {
        return {
            moment: moment,
        };
    },
    methods: {
        redirectToCheckout() {
            axios.get("/stripe/session").then((response) => {
                this.$inertia.visit(response.data.url);
            });
        },
    },
};
</script>
