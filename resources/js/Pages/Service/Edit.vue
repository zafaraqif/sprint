<template>
    <Navbar>
        <PageTitle>
            <Title>Update Service</Title>
            <Breadcrumb
                ><span
                    >Print Service &nbsp;/&nbsp; Update Service</span
                ></Breadcrumb
            >
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
            class="flex gap-x-4 w-1/4 bg-white p-6 rounded-lg shadow-sm"
        >
            <div class="h-full w-auto rounded-full bg-indigo-100">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 24 24"
                    fill="currentColor"
                    class="w-auto h-full p-3 fill-indigo-500"
                >
                    <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                    <path
                        fill-rule="evenodd"
                        d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z"
                        clip-rule="evenodd"
                    />
                </svg>
            </div>
            <div>
                <Heading1 class="text-indigo-500">Open</Heading1>
                <Heading5>Unhide service for 24h</Heading5>
            </div>
        </Link>
        <span class="flex gap-x-4 w-1/4 p-6 rounded-lg shadow-sm bg-indigo-500">
            <div class="h-full w-auto rounded-full bg-indigo-400">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 24 24"
                    fill="currentColor"
                    class="w-auto h-full p-3 fill-white"
                >
                    <path
                        d="M3.53 2.47a.75.75 0 00-1.06 1.06l18 18a.75.75 0 101.06-1.06l-18-18zM22.676 12.553a11.249 11.249 0 01-2.631 4.31l-3.099-3.099a5.25 5.25 0 00-6.71-6.71L7.759 4.577a11.217 11.217 0 014.242-.827c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113z"
                    />
                    <path
                        d="M15.75 12c0 .18-.013.357-.037.53l-4.244-4.243A3.75 3.75 0 0115.75 12zM12.53 15.713l-4.243-4.244a3.75 3.75 0 004.243 4.243z"
                    />
                    <path
                        d="M6.75 12c0-.619.107-1.213.304-1.764l-3.1-3.1a11.25 11.25 0 00-2.63 4.31c-.12.362-.12.752 0 1.114 1.489 4.467 5.704 7.69 10.675 7.69 1.5 0 2.933-.294 4.242-.827l-2.477-2.477A5.25 5.25 0 016.75 12z"
                    />
                </svg>
            </div>
            <div>
                <Heading1 class="text-white">Close</Heading1>
                <Heading5 class="text-slate-300">Service hidden</Heading5>
            </div>
        </span>
    </div>
    <div
        v-if="service.service_status == 1"
        class="flex my-8 justify-start gap-x-4"
    >
        <span class="flex gap-x-4 w-1/4 p-6 rounded-lg shadow-sm bg-indigo-500">
            <div class="h-full w-auto rounded-full bg-indigo-400">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 24 24"
                    fill="currentColor"
                    class="w-auto h-full p-3 fill-white"
                >
                    <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                    <path
                        fill-rule="evenodd"
                        d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z"
                        clip-rule="evenodd"
                    />
                </svg>
            </div>
            <div>
                <Heading1 class="text-white">Open</Heading1>
                <Heading5 class="text-slate-300">Service visible</Heading5>
            </div>
        </span>
        <Link
            :href="'/close/' + service.service_id"
            method="put"
            class="flex gap-x-4 w-1/4 bg-white p-6 rounded-lg shadow-sm"
        >
            <div class="h-full w-auto rounded-full bg-indigo-100">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 24 24"
                    fill="currentColor"
                    class="w-auto h-full p-3 fill-indigo-500"
                >
                    <path
                        d="M3.53 2.47a.75.75 0 00-1.06 1.06l18 18a.75.75 0 101.06-1.06l-18-18zM22.676 12.553a11.249 11.249 0 01-2.631 4.31l-3.099-3.099a5.25 5.25 0 00-6.71-6.71L7.759 4.577a11.217 11.217 0 014.242-.827c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113z"
                    />
                    <path
                        d="M15.75 12c0 .18-.013.357-.037.53l-4.244-4.243A3.75 3.75 0 0115.75 12zM12.53 15.713l-4.243-4.244a3.75 3.75 0 004.243 4.243z"
                    />
                    <path
                        d="M6.75 12c0-.619.107-1.213.304-1.764l-3.1-3.1a11.25 11.25 0 00-2.63 4.31c-.12.362-.12.752 0 1.114 1.489 4.467 5.704 7.69 10.675 7.69 1.5 0 2.933-.294 4.242-.827l-2.477-2.477A5.25 5.25 0 016.75 12z"
                    />
                </svg>
            </div>
            <div>
                <Heading1 class="text-indigo-500">Close</Heading1>
                <Heading5>Hide service for 24h</Heading5>
            </div>
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
                <label class="block mb-1 text-gray-500">New Location?</label>
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
                <div
                    v-if="form.errors.service_name"
                    class="mt-1 text-xs text-red-500"
                >
                    {{ form.errors.service_name }}
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
                <div
                    v-if="form.errors.pickup_address"
                    class="mt-1 text-xs text-red-500"
                >
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
                <div
                    v-if="form.errors.contact_number"
                    class="mt-1 text-xs text-red-500"
                >
                    {{ form.errors.contact_number }}
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
                <div
                    v-if="form.errors.start_time"
                    class="mt-1 text-xs text-red-500"
                >
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
                <div
                    v-if="form.errors.end_time"
                    class="mt-1 text-xs text-red-500"
                >
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
                <div
                    v-if="form.errors.start_pickup_time"
                    class="mt-1 text-xs text-red-500"
                >
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
                <div
                    v-if="form.errors.end_pickup_time"
                    class="mt-1 text-xs text-red-500"
                >
                    {{ form.errors.end_pickup_time }}
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
                <div
                    v-if="form.errors.page_limit"
                    class="mt-1 text-xs text-red-500"
                >
                    {{ form.errors.page_limit }}
                </div>
            </div>

            <div class="col-span-2">
                <label class="block mb-1 text-gray-500"
                    >B&W Print Price (RM)</label
                >
                <input
                    v-model="form.price_bnw"
                    type="number"
                    step="0.01"
                    min="0"
                    placeholder="Enter price (RM)"
                    class="block w-full p-2 rounded-md border border-gray-200 text-gray-500"
                />
                <div
                    v-if="form.errors.price_bnw"
                    class="mt-1 text-xs text-red-500"
                >
                    {{ form.errors.price_bnw }}
                </div>
            </div>

            <div class="col-span-2">
                <label class="block mb-1 text-gray-500"
                    >Color Print Price (RM)</label
                >
                <input
                    v-model="form.price_color"
                    type="number"
                    step="0.01"
                    min="0"
                    placeholder="Enter price (RM)"
                    class="block w-full p-2 rounded-md border border-gray-200 text-gray-500"
                />
                <div
                    v-if="form.errors.price_color"
                    class="mt-1 text-xs text-red-500"
                >
                    {{ form.errors.price_color }}
                </div>
            </div>

            <div class="col-span-2">
                <label class="block mb-1 text-gray-500"
                    >80gsm Paper Charge (RM)</label
                >
                <input
                    v-model="form.charge_80gsm"
                    type="number"
                    step="0.01"
                    min="0"
                    placeholder="Enter price (RM)"
                    class="block w-full p-2 rounded-md border border-gray-200 text-gray-500"
                />
                <div
                    v-if="form.errors.charge_80gsm"
                    class="mt-1 text-xs text-red-500"
                >
                    {{ form.errors.charge_80gsm }}
                </div>
            </div>

            <div class="mt-4 col-span-2">
                <button
                    type="submit"
                    class="px-4 py-2 bg-indigo-500 text-sm text-white rounded-md font-semibold"
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
