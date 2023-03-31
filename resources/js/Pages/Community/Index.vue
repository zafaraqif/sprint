<template>
    <Navbar>
        <PageTitle v-if="isCustomer">
            <Title>1. Select Community</Title>
            <Breadcrumb>Print Order &nbsp;/&nbsp; Community</Breadcrumb>
        </PageTitle>
        <PageTitle v-else-if="service == null">
            <Title>1. Select Community</Title>
            <Breadcrumb
                ><a href="/service">Print Service</a>&nbsp; / &nbsp;<span
                    >Community</span
                ></Breadcrumb
            >
        </PageTitle>
        <PageTitle v-else>
            <Title>Change Community</Title>
            <Breadcrumb
                ><a href="/service">Print Service</a> &nbsp;/&nbsp;<span
                    >Community</span
                ></Breadcrumb
            >
        </PageTitle>
        <RightSide></RightSide>
    </Navbar>
    <div v-if="isCustomer" class="flex justify-between gap-4 mb-6">
        <div class="w-full h-2 bg-indigo-500 rounded-sm"></div>
        <div class="w-full h-2 bg-indigo-100 rounded-sm"></div>
        <div class="w-full h-2 bg-indigo-100 rounded-sm"></div>
        <div class="w-full h-2 bg-indigo-100 rounded-sm"></div>
        <div class="w-full h-2 bg-indigo-100 rounded-sm"></div>
    </div>
    <div v-else-if="service == null" class="flex justify-between gap-4 mb-6">
        <div class="w-full h-2 bg-indigo-500 rounded-sm"></div>
        <div class="w-full h-2 bg-indigo-100 rounded-sm"></div>
    </div>

    <div class="grid grid-cols-2 gap-4">
        <div
            v-for="community in communities"
            :key="community.community_id"
            class="bg-white p-6 rounded-lg shadow-sm"
        >
            <div class="flex justify-between">
                <div class="text-xl font-semibold">
                    {{ community.community_name }}
                </div>
                <div class="text-sm mt-1">
                    <span
                        class="bg-indigo-100 text-indigo-700 px-2 py-1 rounded-md font-semibold align-middle"
                        >{{ community.state }}</span
                    >
                </div>
            </div>
            <div class="text-sm text-gray-500">
                {{ community.locality }}, {{ community.district }}
            </div>
            <div class="mt-4 flex justify-between">
                <div
                    v-if="isCustomer"
                    class="text-indigo-500 text-sm font-semibold"
                >
                    12 Available Sprinter(s)
                </div>
                <div class="text-right">
                    <Link
                        v-if="isCustomer"
                        :href="'/community/' + community.community_id"
                        class="px-4 py-2 text-sm font-semibold bg-indigo-500 text-white rounded-md"
                    >
                        Select Community
                    </Link>
                    <Link
                        v-else-if="service == null"
                        :href="
                            '/community/' +
                            community.community_id +
                            '/service/create'
                        "
                        class="px-4 py-2 text-sm font-semibold bg-indigo-500 text-white rounded-md"
                    >
                        Select Community
                    </Link>
                    <Link
                        v-else
                        :href="
                            '/service/' +
                            service.service_id +
                            '/change/' +
                            community.community_id
                        "
                        method="put"
                        class="px-4 py-2 text-sm font-semibold bg-indigo-500 text-white rounded-md"
                    >
                        Select Community
                    </Link>
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

defineProps({
    communities: Array,
    service: Object,
});

const page = usePage();
const isCustomer = computed(() => page.props.value.user.user_type == 1);
</script>
