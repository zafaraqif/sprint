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
        <div class="w-full h-2 bg-indigo-500 rounded-full"></div>
        <div class="w-full h-2 bg-indigo-100 rounded-full"></div>
        <div class="w-full h-2 bg-indigo-100 rounded-full"></div>
        <div class="w-full h-2 bg-indigo-100 rounded-full"></div>
        <div class="w-full h-2 bg-indigo-100 rounded-full"></div>
    </div>
    <div v-else-if="service == null" class="flex justify-between gap-4 mb-6">
        <div class="w-full h-2 bg-indigo-500 rounded-sm"></div>
        <div class="w-full h-2 bg-indigo-100 rounded-sm"></div>
    </div>
    <div class="flex justify-between gap-x-4">
        <form
            @submit.prevent="search"
            class="bg-white p-6 rounded-md shadow-sm w-full"
        >
            <div class="mb-4 text-xl font-semibold">Search Community</div>
            <div class="grid grid-cols-12 gap-4">
                <div class="col-span-11">
                    <input
                        v-model="form.search"
                        type="text"
                        placeholder="Enter state / district / locality / city / area"
                        class="block w-full p-2 rounded-md border border-gray-200 text-gray-500 placeholder:text-gray-300"
                    />
                </div>
                <button
                    type="submit"
                    method="post"
                    class="col-span-1 px-4 py-2 font-semibold bg-indigo-500 rounded-md"
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        stroke="currentColor"
                        class="mx-auto w-6 h-6 stroke-white stroke-2"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"
                        />
                    </svg>
                </button>
            </div>
            <div v-if="!isCustomer" class="mt-2 text-sm text-gray-400">
                Community Not Exist?
                <Link
                    :href="'/community/create'"
                    class="font-medium text-indigo-500"
                    >Create Community</Link
                >
            </div>
        </form>
    </div>

    <div class="mt-6 grid grid-cols-2 gap-4">
        <div
            v-for="(community, index) in communities"
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
            <div class="mt-6 flex justify-between">
                <div v-if="isCustomer">
                    <span
                        v-if="sprinter[index] !== 0"
                        class="text-indigo-500 text-sm font-semibold"
                    >
                        <span>{{ sprinter[index] }}</span>
                        Available Sprinter(s)
                    </span>
                    <span v-else class="text-gray-500 text-sm font-semibold">
                        <span>{{ sprinter[index] }}</span>
                        Available Sprinter(s)
                    </span>
                </div>
                <div class="text-right">
                    <Link
                        v-if="isCustomer && sprinter[index] !== 0"
                        :href="'/community/' + community.community_id"
                        class="px-4 py-2 text-sm font-semibold bg-indigo-500 text-white rounded-md"
                    >
                        Select Community
                    </Link>
                    <a
                        v-else-if="isCustomer && sprinter[index] === 0"
                        class="px-4 py-2 text-sm font-semibold bg-gray-100 text-gray-500 rounded-md"
                    >
                        Select Community
                    </a>
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
import { Link, usePage, useForm } from "@inertiajs/inertia-vue3";
import Navbar from "@/Layouts/Topbar/Navbar.vue";
import PageTitle from "@/Layouts/Topbar/PageTitle.vue";
import Title from "@/Layouts/Topbar/Title.vue";
import Breadcrumb from "@/Layouts/Topbar/Breadcrumb.vue";
import RightSide from "@/Layouts/Topbar/RightSide.vue";
import Heading2 from "@/Layouts/UI/Heading2.vue";

defineProps({
    communities: Array,
    service: Object,
    sprinter: Array,
});

const form = useForm({
    search: null,
});

const page = usePage();
const isCustomer = computed(() => page.props.value.user.user_type == 1);
const search = () => form.post(route("search.store"));
</script>
