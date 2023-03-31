<template>
    <Navbar>
        <PageTitle>
            <Title>Profile</Title>
            <Breadcrumb><span>Profile</span></Breadcrumb>
        </PageTitle>
        <RightSide></RightSide>
    </Navbar>
    <div class="flex gap-4">
        <div class="w-1/2 flex flex-col gap-4">
            <div class="p-6 bg-white rounded-lg shadow-sm">
                <div class="text-xl font-semibold">Account Details</div>
                <div class="flex justify-start gap-x-32">
                    <div>
                        <div class="mt-4 text-xs text-gray-400">Email</div>
                        <div class="text-md font-regular">{{ user.email }}</div>
                    </div>
                    <div>
                        <div class="mt-4 text-xs text-gray-400">
                            Phone Number
                        </div>
                        <div class="text-md font-regular">
                            {{ user.phone_number }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="p-6 bg-white rounded-lg shadow-sm">
                <div class="text-xl font-semibold">Change Password</div>
                <form
                    @submit.prevent="update"
                    class="grid grid-cols-1 gap-4 mt-6"
                >
                    <div class="col-span-1">
                        <label for="password" class="block mb-1 text-gray-500"
                            >New Password</label
                        >
                        <input
                            id="password"
                            v-model="form.password"
                            type="password"
                            class="block w-full p-2 rounded-md border border-gray-200 text-gray-500"
                        />
                        <div v-if="form.errors.password">
                            {{ form.errors.password }}
                        </div>
                    </div>
                    <div class="col-span-1">
                        <label
                            for="password_confirmation"
                            class="block mb-1 text-gray-500"
                            >Confirm Password</label
                        >
                        <input
                            id="password_confirmation"
                            v-model="form.password_confirmation"
                            type="password"
                            class="block w-full p-2 rounded-md border border-gray-200 text-gray-500"
                        />
                    </div>
                    <div class="col-span-1">
                        <button
                            type="submit"
                            class="mt-4 px-4 py-2 bg-indigo-500 text-white rounded-md text-sm font-semibold"
                        >
                            Change Password
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <div v-if="!isCustomer" class="w-1/2 p-6 bg-white rounded-lg shadow-sm">
            <div class="flex justify-between">
                <div class="text-xl font-semibold">Service Details</div>
                <div v-if="!(service == null)">
                    <div
                        v-if="service.service_status == 0"
                        class="px-4 py-1 bg-red-100 text-red-600 text-sm font-semibold rounded-full"
                    >
                        Closed
                    </div>
                    <div
                        v-if="service.service_status == 1"
                        class="px-4 py-1 bg-emerald-100 text-emerald-600 text-sm font-semibold rounded-full"
                    >
                        Open
                    </div>
                </div>
            </div>
            <div v-if="service == null" class="text-sm text-gray-500">
                Service not created
            </div>
            <div v-else>
                <div>
                    <div class="mt-4 text-xs text-gray-400">Community Name</div>
                    <div class="text-md font-regular">
                        {{ community.community_name }}
                    </div>
                </div>
                <div>
                    <div class="mt-2 text-xs text-gray-400">Contact Number</div>
                    <div class="text-md font-regular">
                        {{ service.contact_number }}
                    </div>
                </div>
                <div>
                    <div class="mt-2 text-xs text-gray-400">Pickup Address</div>
                    <div class="text-md font-regular">
                        {{ service.pickup_address }}
                    </div>
                </div>
                <div class="mt-4 font-semibold">Service Duration</div>
                <div class="flex justify-start gap-x-28">
                    <div>
                        <div class="mt-2 text-xs text-gray-400">
                            Operational Hours
                        </div>
                        <div class="text-md font-regular">
                            {{ service.start_time }} -
                            {{ service.end_time }}
                        </div>
                    </div>
                    <div>
                        <div class="mt-2 text-xs text-gray-400">
                            Pickup Hours
                        </div>
                        <div class="text-md font-regular">
                            {{ service.start_pickup_time }} -
                            {{ service.end_pickup_time }}
                        </div>
                    </div>
                </div>
                <div class="mt-4 font-semibold">Pricing & Limit</div>
                <div class="flex justify-between">
                    <div>
                        <div class="mt-2 text-xs text-gray-400">
                            B&W (per page)
                        </div>
                        <div class="text-md font-regular">
                            RM{{ service.price_bnw }}
                        </div>
                    </div>
                    <div>
                        <div class="mt-2 text-xs text-gray-400">
                            Color (per page)
                        </div>
                        <div class="text-md font-regular">
                            RM{{ service.price_color }}
                        </div>
                    </div>
                    <div>
                        <div class="mt-2 text-xs text-gray-400">
                            80gsm Paper (per sheet)
                        </div>
                        <div class="text-md font-regular">
                            RM{{ service.charge_80gsm }}
                        </div>
                    </div>
                    <div>
                        <div class="mt-2 text-xs text-gray-400">
                            Print Page Limit
                        </div>
                        <div class="text-md font-regular">
                            {{ service.page_limit }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { computed } from "vue";
import { usePage, useForm } from "@inertiajs/inertia-vue3";
import Navbar from "@/Layouts/Topbar/Navbar.vue";
import PageTitle from "@/Layouts/Topbar/PageTitle.vue";
import Title from "@/Layouts/Topbar/Title.vue";
import Breadcrumb from "@/Layouts/Topbar/Breadcrumb.vue";
import RightSide from "@/Layouts/Topbar/RightSide.vue";

const page = usePage();
const user = computed(() => page.props.value.user);

defineProps({
    service: Object,
    community: Object,
});

const form = useForm({
    password: null,
    password_confirmation: null,
});

const update = () =>
    form.put(
        route("account.update", { account: page.props.value.user.user_id })
    );

const isCustomer = computed(() => page.props.value.user.user_type == 1);
</script>
