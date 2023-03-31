<template>
    <Navbar>
        <PageTitle>
            <Title>Update Service</Title>
            <Breadcrumb><span>Print Service</span></Breadcrumb>
        </PageTitle>
        <RightSide></RightSide>
    </Navbar>
    <div
        v-if="service.service_status == 0"
        class="flex my-8 justify-start gap-x-4"
    >
        <Link
            :href="'/open/' + service.service_id"
            method="put"
            class="w-1/4 bg-white p-6 rounded-lg shadow-sm"
        >
            <Heading1>Open</Heading1>
            <Heading5>Unhide Service</Heading5>
        </Link>
        <span class="w-1/4 p-6 rounded-lg shadow-sm bg-indigo-500">
            <Heading1 class="text-white">Close</Heading1>
            <Heading5 class="text-slate-300">Service Hidden</Heading5>
        </span>
    </div>
    <div
        v-if="service.service_status == 1"
        class="flex my-8 justify-start gap-x-4"
    >
        <span class="w-1/4 p-6 rounded-lg shadow-sm bg-indigo-500">
            <Heading1 class="text-white">Open</Heading1>
            <Heading5 class="text-slate-300">Service Visible</Heading5>
        </span>
        <Link
            :href="'/close/' + service.service_id"
            method="put"
            class="w-1/4 bg-white p-6 rounded-lg shadow-sm"
        >
            <Heading1>Close</Heading1>
            <Heading5>Hide Service</Heading5>
        </Link>
    </div>

    <form @submit.prevent="update" class="bg-white p-6 rounded-lg shadow-sm">
        <div class="grid grid-cols-8 gap-4">
            <div class="col-span-6">
                <label class="block mb-1 text-gray-500">Community Name</label>
                <input
                    v-model="community.community_name"
                    class="block w-full p-2 rounded-md border border-gray-200 text-gray-500"
                    disabled
                />
            </div>

            <div class="col-span-2">
                <label class="block mb-1 text-gray-500">Change Location?</label>
                <Link
                    class="w-full py-2 bg-indigo-500 text-white font-semibold rounded-md"
                    href="/community"
                    as="button"
                    >Change Community</Link
                >
            </div>

            <div class="col-span-8">
                <label class="block mb-1 text-gray-500">Service Name</label>
                <input
                    v-model="form.service_name"
                    type="text"
                    placeholder="Enter Service Name"
                    class="block w-full p-2 rounded-md border border-gray-200 text-gray-500"
                />
                <div v-if="form.errors.service_name">
                    {{ form.errors.service_name }}
                </div>
            </div>

            <div class="col-span-4">
                <label class="block mb-1 text-gray-500"
                    >Service Start Time</label
                >
                <input
                    v-model="form.start_time"
                    type="time"
                    placeholder="Enter service start time"
                    class="block w-full p-2 rounded-md border border-gray-200 text-gray-500"
                />
                <div v-if="form.errors.start_time">
                    {{ form.errors.start_time }}
                </div>
            </div>

            <div class="col-span-4">
                <label class="block mb-1 text-gray-500">Service End Time</label>
                <input
                    v-model="form.end_time"
                    type="time"
                    placeholder="Enter service end time"
                    class="block w-full p-2 rounded-md border border-gray-200 text-gray-500"
                />
                <div v-if="form.errors.end_time">
                    {{ form.errors.end_time }}
                </div>
            </div>

            <div class="col-span-4">
                <label class="block mb-1 text-gray-500"
                    >Order Pickup Start Time</label
                >
                <input
                    v-model="form.start_pickup_time"
                    type="time"
                    placeholder="Enter start pickup time"
                    class="block w-full p-2 rounded-md border border-gray-200 text-gray-500"
                />
                <div v-if="form.errors.start_pickup_time">
                    {{ form.errors.start_pickup_time }}
                </div>
            </div>

            <div class="col-span-4">
                <label class="block mb-1 text-gray-500"
                    >Order Pickup End Time</label
                >
                <input
                    v-model="form.end_pickup_time"
                    type="time"
                    placeholder="Enter end pickup time"
                    class="block w-full p-2 rounded-md border border-gray-200 text-gray-500"
                />
                <div v-if="form.errors.end_pickup_time">
                    {{ form.errors.end_pickup_time }}
                </div>
            </div>

            <div class="col-span-6">
                <label class="block mb-1 text-gray-500">Pickup Address</label>
                <input
                    v-model="form.pickup_address"
                    type="text"
                    placeholder="Enter pickup address"
                    class="block w-full p-2 rounded-md border border-gray-200 text-gray-500"
                />
                <div v-if="form.errors.pickup_address">
                    {{ form.errors.pickup_address }}
                </div>
            </div>

            <div class="col-span-2">
                <label class="block mb-1 text-gray-500">Contact Number</label>
                <input
                    v-model="form.contact_number"
                    type="text"
                    placeholder="Enter contact number"
                    class="block w-full p-2 rounded-md border border-gray-200 text-gray-500"
                />
                <div v-if="form.errors.contact_number">
                    {{ form.errors.contact_number }}
                </div>
            </div>

            <div class="col-span-2">
                <label class="block mb-1 text-gray-500">Print Page Limit</label>
                <input
                    v-model="form.page_limit"
                    type="number"
                    min="1"
                    placeholder="Enter print page limit"
                    class="block w-full p-2 rounded-md border border-gray-200 text-gray-500"
                />
                <div v-if="form.errors.page_limit">
                    {{ form.errors.page_limit }}
                </div>
            </div>

            <div class="col-span-2">
                <label class="block mb-1 text-gray-500"
                    >Print Price (B&W)</label
                >
                <input
                    v-model="form.price_bnw"
                    type="number"
                    step="0.01"
                    min="0"
                    placeholder="Enter price (RM)"
                    class="block w-full p-2 rounded-md border border-gray-200 text-gray-500"
                />
                <div v-if="form.errors.price_bnw">
                    {{ form.errors.price_bnw }}
                </div>
            </div>

            <div class="col-span-2">
                <label class="block mb-1 text-gray-500"
                    >Print Price (Color)</label
                >
                <input
                    v-model="form.price_color"
                    type="number"
                    step="0.01"
                    min="0"
                    placeholder="Enter price (RM)"
                    class="block w-full p-2 rounded-md border border-gray-200 text-gray-500"
                />
                <div v-if="form.errors.price_color">
                    {{ form.errors.price_color }}
                </div>
            </div>

            <div class="col-span-2">
                <label class="block mb-1 text-gray-500"
                    >80gsm Paper Extra Charges</label
                >
                <input
                    v-model="form.charge_80gsm"
                    type="number"
                    step="0.01"
                    min="0"
                    placeholder="Enter price (RM)"
                    class="block w-full p-2 rounded-md border border-gray-200 text-gray-500"
                />
                <div v-if="form.errors.charge_80gsm">
                    {{ form.errors.charge_80gsm }}
                </div>
            </div>

            <div class="mt-4 col-span-2">
                <button
                    type="submit"
                    class="px-4 py-2 bg-indigo-500 text-sm text-white rounded-md font-bold"
                >
                    Update Service
                </button>
            </div>
        </div>
    </form>
</template>

<script setup>
import { Link, useForm, usePage } from "@inertiajs/inertia-vue3";
import Navbar from "@/Layouts/Topbar/Navbar.vue";
import PageTitle from "@/Layouts/Topbar/PageTitle.vue";
import Title from "@/Layouts/Topbar/Title.vue";
import Breadcrumb from "@/Layouts/Topbar/Breadcrumb.vue";
import RightSide from "@/Layouts/Topbar/RightSide.vue";
import Heading1 from "@/Layouts/UI/Heading1.vue";
import Heading5 from "@/Layouts/UI/Heading5.vue";

const props = defineProps({
    service: Object,
    community: Array,
});

const page = usePage();

const form = useForm({
    user_id: page.props.value.user.user_id,
    community_id: props.community.community_id,
    service_name: props.service.service_name,
    start_time: props.service.start_time,
    end_time: props.service.end_time,
    start_pickup_time: props.service.start_pickup_time,
    end_pickup_time: props.service.end_pickup_time,
    pickup_address: props.service.pickup_address,
    contact_number: props.service.contact_number,
    page_limit: props.service.page_limit,
    price_bnw: props.service.price_bnw,
    price_color: props.service.price_color,
    charge_80gsm: props.service.charge_80gsm,
});

const update = () =>
    form.put(route("service.update", { service: props.service.service_id }));
</script>
