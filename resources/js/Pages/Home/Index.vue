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
                <div class="h-full w-auto rounded-full bg-indigo-100">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24"
                        fill="currentColor"
                        class="p-3 w-auto h-full fill-indigo-500"
                    >
                        <path
                            fill-rule="evenodd"
                            d="M6.912 3a3 3 0 00-2.868 2.118l-2.411 7.838a3 3 0 00-.133.882V18a3 3 0 003 3h15a3 3 0 003-3v-4.162c0-.299-.045-.596-.133-.882l-2.412-7.838A3 3 0 0017.088 3H6.912zm13.823 9.75l-2.213-7.191A1.5 1.5 0 0017.088 4.5H6.912a1.5 1.5 0 00-1.434 1.059L3.265 12.75H6.11a3 3 0 012.684 1.658l.256.513a1.5 1.5 0 001.342.829h3.218a1.5 1.5 0 001.342-.83l.256-.512a3 3 0 012.684-1.658h2.844z"
                            clip-rule="evenodd"
                        />
                    </svg>
                </div>
                <div>
                    <Heading1>{{ pending }}</Heading1>
                    <Heading5>Pending Order</Heading5>
                </div>
            </SmallCard>
            <SmallCard>
                <div class="h-full w-auto rounded-full bg-indigo-100">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24"
                        fill="currentColor"
                        class="p-3 w-auto h-full fill-indigo-500"
                    >
                        <path
                            fill-rule="evenodd"
                            d="M7.502 6h7.128A3.375 3.375 0 0118 9.375v9.375a3 3 0 003-3V6.108c0-1.505-1.125-2.811-2.664-2.94a48.972 48.972 0 00-.673-.05A3 3 0 0015 1.5h-1.5a3 3 0 00-2.663 1.618c-.225.015-.45.032-.673.05C8.662 3.295 7.554 4.542 7.502 6zM13.5 3A1.5 1.5 0 0012 4.5h4.5A1.5 1.5 0 0015 3h-1.5z"
                            clip-rule="evenodd"
                        />
                        <path
                            fill-rule="evenodd"
                            d="M3 9.375C3 8.339 3.84 7.5 4.875 7.5h9.75c1.036 0 1.875.84 1.875 1.875v11.25c0 1.035-.84 1.875-1.875 1.875h-9.75A1.875 1.875 0 013 20.625V9.375zm9.586 4.594a.75.75 0 00-1.172-.938l-2.476 3.096-.908-.907a.75.75 0 00-1.06 1.06l1.5 1.5a.75.75 0 001.116-.062l3-3.75z"
                            clip-rule="evenodd"
                        />
                    </svg>
                </div>
                <div>
                    <Heading1>{{ approved }}</Heading1>
                    <Heading5>Approved Order</Heading5>
                </div>
            </SmallCard>
            <SmallCard>
                <div class="h-full w-auto rounded-full bg-indigo-100">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24"
                        fill="currentColor"
                        class="p-3 w-auto h-full fill-indigo-500"
                    >
                        <path
                            d="M3.375 4.5C2.339 4.5 1.5 5.34 1.5 6.375V13.5h12V6.375c0-1.036-.84-1.875-1.875-1.875h-8.25zM13.5 15h-12v2.625c0 1.035.84 1.875 1.875 1.875h.375a3 3 0 116 0h3a.75.75 0 00.75-.75V15z"
                        />
                        <path
                            d="M8.25 19.5a1.5 1.5 0 10-3 0 1.5 1.5 0 003 0zM15.75 6.75a.75.75 0 00-.75.75v11.25c0 .087.015.17.042.248a3 3 0 015.958.464c.853-.175 1.522-.935 1.464-1.883a18.659 18.659 0 00-3.732-10.104 1.837 1.837 0 00-1.47-.725H15.75z"
                        />
                        <path
                            d="M19.5 19.5a1.5 1.5 0 10-3 0 1.5 1.5 0 003 0z"
                        />
                    </svg>
                </div>
                <div>
                    <Heading1>{{ completed }}</Heading1>
                    <Heading5>Completed Order</Heading5>
                </div>
            </SmallCard>
            <SmallCard v-if="isCustomer">
                <div class="h-full w-auto rounded-full bg-indigo-100">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24"
                        fill="currentColor"
                        class="p-3 w-auto h-full fill-indigo-500"
                    >
                        <path
                            d="M5.566 4.657A4.505 4.505 0 016.75 4.5h10.5c.41 0 .806.055 1.183.157A3 3 0 0015.75 3h-7.5a3 3 0 00-2.684 1.657zM2.25 12a3 3 0 013-3h13.5a3 3 0 013 3v6a3 3 0 01-3 3H5.25a3 3 0 01-3-3v-6zM5.25 7.5c-.41 0-.806.055-1.184.157A3 3 0 016.75 6h10.5a3 3 0 012.683 1.657A4.505 4.505 0 0018.75 7.5H5.25z"
                        />
                    </svg>
                </div>
                <div>
                    <Heading1>{{ total }}</Heading1>
                    <Heading5>Total Order</Heading5>
                </div>
            </SmallCard>
            <SmallCard v-if="!isCustomer">
                <div class="h-full w-auto rounded-full bg-indigo-100">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24"
                        fill="currentColor"
                        class="p-3 w-auto h-full fill-indigo-500"
                    >
                        <path
                            d="M10.464 8.746c.227-.18.497-.311.786-.394v2.795a2.252 2.252 0 01-.786-.393c-.394-.313-.546-.681-.546-1.004 0-.323.152-.691.546-1.004zM12.75 15.662v-2.824c.347.085.664.228.921.421.427.32.579.686.579.991 0 .305-.152.671-.579.991a2.534 2.534 0 01-.921.42z"
                        />
                        <path
                            fill-rule="evenodd"
                            d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zM12.75 6a.75.75 0 00-1.5 0v.816a3.836 3.836 0 00-1.72.756c-.712.566-1.112 1.35-1.112 2.178 0 .829.4 1.612 1.113 2.178.502.4 1.102.647 1.719.756v2.978a2.536 2.536 0 01-.921-.421l-.879-.66a.75.75 0 00-.9 1.2l.879.66c.533.4 1.169.645 1.821.75V18a.75.75 0 001.5 0v-.81a4.124 4.124 0 001.821-.749c.745-.559 1.179-1.344 1.179-2.191 0-.847-.434-1.632-1.179-2.191a4.122 4.122 0 00-1.821-.75V8.354c.29.082.559.213.786.393l.415.33a.75.75 0 00.933-1.175l-.415-.33a3.836 3.836 0 00-1.719-.755V6z"
                            clip-rule="evenodd"
                        />
                    </svg>
                </div>
                <div>
                    <Heading1>RM{{ total }}</Heading1>
                    <Heading5>Total Earned</Heading5>
                </div>
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
                v-for="(o, index) in orders"
                :key="{ orders: o.order_id }"
                class="bg-white p-6 rounded-lg shadow-sm"
            >
                <div class="flex justify-between">
                    <div class="text-xl font-semibold">
                        Order #{{ o.order_id }}
                    </div>
                    <div class="text-sm align-middle">
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
                        <div class="mt-4 text-indigo-500 font-semibold text-sm">
                            {{ s.service_name }}
                        </div>
                        <div class="mt-2 flex justify-start gap-x-6">
                            <div>
                                <div class="text-xs text-gray-400">Price</div>
                                <div class="text-sm font-regular">
                                    RM{{ o.total_price }}
                                </div>
                            </div>
                            <div>
                                <div class="text-xs text-gray-400">
                                    Contact No
                                </div>
                                <div class="text-sm font-regular">
                                    {{ s.contact_number }}
                                </div>
                            </div>
                            <div>
                                <div class="text-xs text-gray-400">
                                    Pickup Address
                                </div>
                                <div class="text-sm font-regular">
                                    {{ s.pickup_address }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div v-if="!isCustomer">
                    <div class="mt-4 text-indigo-500 font-semibold text-sm">
                        Order Details
                    </div>
                    <div class="grid grid-cols-4">
                        <div class="col-span-1">
                            <div class="mt-2 text-xs text-gray-400">
                                Number of File(s)
                            </div>
                            <div class="text-sm font-regular">
                                {{ o.file_count }}
                            </div>
                        </div>
                        <div class="col-span-1">
                            <div class="mt-2 text-xs text-gray-400">
                                Page(s) to Print
                            </div>
                            <div class="text-sm font-regular">
                                {{ o.print_page_count }}
                            </div>
                        </div>
                        <div class="col-span-1">
                            <div class="mt-2 text-xs text-gray-400">
                                Sheet(s) to Print
                            </div>
                            <div class="text-sm font-regular">
                                {{ o.print_sheets_count }}
                            </div>
                        </div>
                        <div class="col-span-1">
                            <div class="mt-2 text-xs text-gray-400">Price</div>
                            <div class="text-sm font-regular">
                                RM{{ o.total_price }}
                            </div>
                        </div>
                    </div>

                    <div class="mt-4 text-indigo-500 font-semibold text-sm">
                        Payment Details
                    </div>
                    <div v-for="p in payments" :key="{ payments: p.order_id }">
                        <div
                            v-if="p.order_id === o.order_id"
                            class="grid grid-cols-2"
                        >
                            <div class="col-span-1">
                                <div class="mt-2 text-xs text-gray-400">
                                    Payment Method
                                </div>
                                <div
                                    v-if="p.payment_type === 1"
                                    class="text-sm font-regular"
                                >
                                    Full Payment
                                </div>
                                <div
                                    v-if="p.payment_type === 2"
                                    class="text-sm font-regular"
                                >
                                    Deposit
                                </div>
                                <div
                                    v-if="p.payment_type === 3"
                                    class="text-sm font-regular"
                                >
                                    Cash on Delivery
                                </div>
                            </div>
                            <div class="col-span-1">
                                <div class="mt-2 text-xs text-gray-400">
                                    Remaining Payment
                                </div>
                                <div class="text-sm font-regular">
                                    RM{{ p.remaining_payment }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div
                    class="flex justify-between mt-4 pt-4 border-t border-gray-100"
                >
                    <div>
                        <div class="text-xs text-gray-400">
                            Pickup Date & Time
                        </div>
                        <div class="text-md font-semibold">
                            {{ moment(o.order_pickup_date).format("DD MMM") }},
                            {{ moment(ordersTime[index]).format("hh:mmA") }}
                        </div>
                    </div>

                    <div v-if="isCustomer" class="mt-2">
                        <Link
                            :href="'/order/' + o.order_id"
                            class="mr-2 px-4 py-2 text-sm font-semibold rounded-md bg-indigo-500 text-white"
                            >View Order</Link
                        >
                        <Link
                            v-if="o.order_status < 4"
                            :href="'/cancel/' + o.order_id"
                            method="put"
                            class="px-2 py-2 text-sm font-semibold rounded-md text-indigo-500"
                            >Cancel Order</Link
                        >
                        <span
                            v-else
                            class="px-2 py-2 text-sm font-semibold text-gray-300 rounded-md"
                        >
                            Cancel Order
                        </span>
                    </div>
                    <div v-if="!isCustomer">
                        <div class="flex gap-x-2 mt-1">
                            <Link
                                v-if="o.order_status < 4"
                                v-bind:href="'/approve/' + o.order_id"
                                method="put"
                                class="px-4 py-2 text-sm font-semibold bg-indigo-500 text-white rounded-md"
                                >Approve</Link
                            >
                            <Link
                                v-if="o.order_status < 4"
                                v-bind:href="'/reject/' + o.order_id"
                                method="put"
                                class="px-4 py-2 text-sm font-semibold bg-indigo-100 text-indigo-500 rounded-md"
                                >Reject</Link
                            >
                            <Link
                                :href="'/order/' + o.order_id"
                                class="pl-2 py-2 text-sm font-semibold rounded-md text-indigo-500"
                                >View Order</Link
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
                v-for="(p, index) in pickups"
                :key="{ orders: p.order_id }"
                class="bg-white p-6 rounded-lg shadow-sm"
            >
                <div class="flex justify-between">
                    <div class="text-xl font-semibold">
                        Order #{{ p.order_id }}
                    </div>
                    <div class="text-sm align-middle">
                        <span
                            class="bg-emerald-100 text-emerald-700 px-2 py-1 rounded-md font-semibold align-middle"
                            >Completed</span
                        >
                    </div>
                </div>
                <div v-for="s in services" :key="{ services: s.service_id }">
                    <div v-if="p.service_id === s.service_id">
                        <div class="mt-4 text-indigo-500 font-semibold text-sm">
                            {{ s.service_name }}
                        </div>
                        <div class="flex justify-start gap-x-6">
                            <div>
                                <div class="mt-2 text-xs text-gray-400">
                                    Price
                                </div>
                                <div class="text-sm font-regular">
                                    RM{{ p.total_price }}
                                </div>
                            </div>
                            <div>
                                <div class="mt-2 text-xs text-gray-400">
                                    Contact No
                                </div>
                                <div class="text-sm font-regular">
                                    {{ s.contact_number }}
                                </div>
                            </div>
                            <div>
                                <div class="mt-2 text-xs text-gray-400">
                                    Pickup Location
                                </div>
                                <div class="text-sm font-regular">
                                    {{ s.pickup_address }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div v-if="!isCustomer">
                    <div class="mt-4 text-indigo-500 font-semibold text-sm">
                        Order Details
                    </div>
                    <div class="grid grid-cols-4">
                        <div class="col-span-1">
                            <div class="mt-2 text-xs text-gray-400">
                                Number of File(s)
                            </div>
                            <div class="text-sm font-regular">
                                {{ p.file_count }}
                            </div>
                        </div>
                        <div class="col-span-1">
                            <div class="mt-2 text-xs text-gray-400">
                                Page(s) to Print
                            </div>
                            <div class="text-sm font-regular">
                                {{ p.print_page_count }}
                            </div>
                        </div>
                        <div class="col-span-1">
                            <div class="mt-2 text-xs text-gray-400">
                                Sheet(s) to Print
                            </div>
                            <div class="text-sm font-regular">
                                {{ p.print_sheets_count }}
                            </div>
                        </div>
                        <div class="col-span-1">
                            <div class="mt-2 text-xs text-gray-400">Price</div>
                            <div class="text-sm font-regular">
                                RM{{ p.total_price }}
                            </div>
                        </div>
                    </div>

                    <div class="mt-4 text-indigo-500 font-semibold text-sm">
                        Payment Details
                    </div>
                    <div
                        v-for="pm in payments"
                        :key="{ payments: pm.order_id }"
                    >
                        <div
                            v-if="pm.order_id === p.order_id"
                            class="grid grid-cols-2"
                        >
                            <div class="col-span-1">
                                <div class="mt-2 text-xs text-gray-400">
                                    Payment Method
                                </div>
                                <div
                                    v-if="pm.payment_type === 1"
                                    class="text-sm font-regular"
                                >
                                    Full Payment
                                </div>
                                <div
                                    v-if="pm.payment_type === 2"
                                    class="text-sm font-regular"
                                >
                                    Deposit
                                </div>
                                <div
                                    v-if="pm.payment_type === 3"
                                    class="text-sm font-regular"
                                >
                                    Cash on Delivery
                                </div>
                            </div>
                            <div class="col-span-1">
                                <div class="mt-2 text-xs text-gray-400">
                                    Remaining Payment
                                </div>
                                <div class="text-sm font-regular">
                                    RM{{ pm.remaining_payment }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div
                    class="flex justify-between mt-4 pt-4 border-t border-gray-100"
                >
                    <div>
                        <div class="text-xs text-gray-400">
                            Pickup Date & Time
                        </div>

                        <div class="text-md font-semibold">
                            {{ moment(p.order_pickup_date).format("DD MMM") }},
                            {{ moment(pickupsTime[index]).format("hh:mmA") }}
                        </div>
                    </div>
                    <div v-if="isCustomer" class="mt-2">
                        <div>
                            <Link
                                :href="'/order/' + p.order_id"
                                class="px-4 py-2 text-sm font-semibold rounded-md bg-indigo-500 text-white"
                                >View Order</Link
                            >
                        </div>
                    </div>
                    <div
                        v-if="!isCustomer"
                        class="flex justify-end gap-x-2 mt-2"
                    >
                        <div>
                            <Link
                                :href="'/pickup/' + p.order_id"
                                method="put"
                                class="px-4 py-2 text-sm font-semibold bg-indigo-500 text-white rounded-md"
                                >Order Collected</Link
                            >
                            <Link
                                :href="'/order/' + p.order_id"
                                class="pl-4 py-2 text-sm font-semibold rounded-md bg-white text-indigo-500"
                                >View Order</Link
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
    orders: Object,
    pickups: Object,
    services: Array,
    payments: Array,
    ordersTime: Array,
    pickupsTime: Array,
});

const page = usePage();
const isCustomer = computed(() => page.props.value.user.user_type == 1);
</script>

<script>
import moment from "moment";

export default {
    data() {
        return {
            moment: moment,
        };
    },
};
</script>
