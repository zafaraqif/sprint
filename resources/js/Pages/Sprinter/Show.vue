<template>
    <Navbar>
        <PageTitle>
            <Title>2. Select Sprinter</Title>
            <Breadcrumb
                >Print Order &nbsp;/&nbsp;
                <a href="/community">Community</a> &nbsp;/&nbsp;
                <span>Sprinter</span></Breadcrumb
            >
        </PageTitle>
        <RightSide></RightSide>
    </Navbar>
    <div class="flex justify-between gap-4 mb-6">
        <div class="w-full h-2 bg-indigo-500 rounded-sm"></div>
        <div class="w-full h-2 bg-indigo-500 rounded-sm"></div>
        <div class="w-full h-2 bg-indigo-100 rounded-sm"></div>
        <div class="w-full h-2 bg-indigo-100 rounded-sm"></div>
        <div class="w-full h-2 bg-indigo-100 rounded-sm"></div>
    </div>
    <div class="grid grid-cols-2 gap-4">
        <div
            v-for="service in services"
            :key="service.service_id"
            class="bg-white p-6 rounded-lg shadow-sm"
        >
            <div class="text-xl font-semibold">
                {{ service.service_name }}
            </div>
            <div class="mt-6 text-sm text-indigo-500 font-semibold">
                Pricing & Details
            </div>
            <div class="mt-2 grid grid-cols-2 justify-items-start">
                <div>
                    <div class="text-xs text-gray-500">B&W (per page)</div>
                    <div class="text-md font-semibold">
                        RM{{ service.price_bnw }}
                    </div>
                </div>
                <div>
                    <div class="text-xs text-gray-500">Color (per page)</div>
                    <div class="text-md font-semibold">
                        RM{{ service.price_color }}
                    </div>
                </div>
            </div>
            <div class="mt-2 grid grid-cols-2 justify-items-start">
                <div>
                    <div class="text-xs text-gray-500">
                        80gsm Charge (per sheet)
                    </div>
                    <div class="text-md font-semibold">
                        RM{{ service.charge_80gsm }}
                    </div>
                </div>
                <div>
                    <div class="text-xs text-gray-500">Print Page Limit</div>
                    <div class="text-md font-semibold">
                        {{ service.page_limit }}
                    </div>
                </div>
            </div>
            <div class="flex justify-between mt-6">
                <div>
                    <div class="text-xs text-gray-500">Pickup Hours</div>
                    <div class="text-md font-semibold">
                        {{ service.start_pickup_time }} -
                        {{ service.end_pickup_time }}
                    </div>
                </div>
                <div class="mt-2">
                    <Link
                        :href="
                            '/service/' + service.service_id + '/order/create'
                        "
                        class="px-4 py-2 text-sm font-semibold bg-indigo-500 text-white rounded-md"
                        >Select Sprinter</Link
                    >
                </div>
            </div>
        </div>
    </div>
    <div class="mt-6">
        <Link
            href="#"
            @click="back"
            class="px-4 py-2 text-sm font-semibold border border-indigo-500 text-indigo-500 rounded-md"
            >Back</Link
        >
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
    services: Array,
});
const back = () => window.history.back();
</script>
