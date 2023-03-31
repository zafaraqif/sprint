<template>
    <Navbar>
        <PageTitle>
            <Title>2. Service Details</Title>
            <Breadcrumb><span>Print Service</span></Breadcrumb>
        </PageTitle>
        <RightSide></RightSide>
    </Navbar>
    <div class="flex justify-between gap-4 mb-6">
        <div class="w-full h-2 bg-indigo-500 rounded-sm"></div>
        <div class="w-full h-2 bg-indigo-500 rounded-sm"></div>
    </div>
    <form
        @submit.prevent="create"
        class="my-8 bg-white p-6 rounded-lg shadow-sm"
    >
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
                    class="block w-full p-2 rounded-md border border-gray-200 text-gray-500"
                />
                <div v-if="form.errors.pickup_address">
                    {{ form.errors.pickup_address }}
                </div>
            </div>

            <div class="col-span-2">
                <label class="block mb-1 text-gray-500">Contact number</label>
                <input
                    v-model="form.contact_number"
                    type="text"
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
                    class="block w-full p-2 rounded-md border border-gray-200 text-gray-500"
                />
                <div v-if="form.errors.page_limit">
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
                    class="block w-full p-2 rounded-md border border-gray-200 text-gray-500"
                />
                <div v-if="form.errors.price_bnw">
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
                    class="block w-full p-2 rounded-md border border-gray-200 text-gray-500"
                />
                <div v-if="form.errors.price_color">
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
                    Create Service
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

defineProps({
    community: Object,
});

const page = usePage();

const form = useForm({
    user_id: page.props.value.user.user_id,
    community_id: page.props.value.community.community_id,
    service_name: null,
    start_time: null,
    end_time: null,
    start_pickup_time: null,
    end_pickup_time: null,
    pickup_address: null,
    contact_number: null,
    page_limit: null,
    price_bnw: null,
    price_color: null,
    charge_80gsm: null,
});

const create = () => form.post(route("service.store"));
</script>
