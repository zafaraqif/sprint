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
        <div class="bg-white p-6 rounded-md shadow-sm w-full">
            <div class="mb-4 text-xl font-semibold">Search Community</div>
            <form @submit.prevent="search">
                <div class="grid grid-cols-9 gap-4">
                    <div class="col-span-8">
                        <input
                            v-model="form.search"
                            type="text"
                            placeholder="Enter community name, city or locality"
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
            </form>
            <div v-if="!isCustomer" class="mt-2 text-sm text-gray-400">
                Community Not Exist?
                <Link
                    :href="'/community/create'"
                    class="font-medium text-indigo-500"
                    >Create Community</Link
                >
            </div>
        </div>
    </div>

    <form @submit.prevent="filter" class="mt-6">
        <div class="flex justify-between mx-6">
            <div v-if="total <= 1" class="mt-2 text-lg font-semibold">
                {{ total }} Community
            </div>
            <div v-else class="mt-2 text-lg font-semibold">
                {{ total }} Communities
            </div>
            <div class="flex gap-x-4">
                <div class="mt-2 font-semibold text-gray-400">
                    Filter by state:
                </div>
                <div class="">
                    <select
                        v-model="form1.state"
                        class="w-full p-2 rounded-md border border-gray-200"
                    >
                        <option
                            class="font-semibold text-gray-500 px-2"
                            value="Johor"
                        >
                            Johor
                        </option>
                        <option
                            class="font-semibold text-gray-500 px-2"
                            value="Kedah"
                        >
                            Kedah
                        </option>
                        <option
                            class="font-semibold text-gray-500 px-2"
                            value="Kelantan"
                        >
                            Kelantan
                        </option>
                        <option
                            class="font-semibold text-gray-500 px-2"
                            value="Melaka"
                        >
                            Melaka
                        </option>
                        <option
                            class="font-semibold text-gray-500 px-2"
                            value="Negeri Sembilan"
                        >
                            Negeri Sembilan
                        </option>
                        <option
                            class="font-semibold text-gray-500 px-2"
                            value="Pahang"
                        >
                            Pahang
                        </option>
                        <option
                            class="font-semibold text-gray-500 px-2"
                            value="Perak"
                        >
                            Perak
                        </option>
                        <option
                            class="font-semibold text-gray-500 px-2"
                            value="Perlis"
                        >
                            Perlis
                        </option>
                        <option
                            class="font-semibold text-gray-500 px-2"
                            value="Pulau Pinang"
                        >
                            Pulau Pinang
                        </option>
                        <option
                            class="font-semibold text-gray-500 px-2"
                            value="Sabah"
                        >
                            Sabah
                        </option>
                        <option
                            class="font-semibold text-gray-500 px-2"
                            value="Sarawak"
                        >
                            Sarawak
                        </option>
                        <option
                            class="font-semibold text-gray-500 px-2"
                            value="Selangor"
                        >
                            Selangor
                        </option>
                        <option
                            class="font-semibold text-gray-500 px-2"
                            value="Terengganu"
                        >
                            Terengganu
                        </option>
                        <option
                            class="font-semibold text-gray-500 px-2"
                            value="Wilayah Persekutuan "
                        >
                            Wilayah Persekutuan
                        </option>
                    </select>
                </div>
                <div class="flex gap-x-2">
                    <button
                        type="submit"
                        method="post"
                        class="px-6 py-2 font-semibold bg-indigo-500 text-white rounded-md"
                    >
                        Filter
                    </button>
                    <Link
                        :href="'/community'"
                        as="button"
                        class="px-6 py-2 font-semibold bg-indigo-100 text-indigo-500 rounded-md"
                    >
                        Clear
                    </Link>
                </div>
            </div>
        </div>
    </form>

    <div
        v-if="sprinter === 0"
        class="text-gray-400 font-semibold mt-8 text-center"
    >
        Community not exist.
        <Link :href="'/community'"
            ><span class="text-indigo-500">Back to community list</span></Link
        >
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

defineProps({
    communities: Array,
    service: Object,
    sprinter: Array,
    total: Number,
});

const form = useForm({
    search: null,
});

const form1 = useForm({
    state: null,
    district: null,
});

const page = usePage();
const isCustomer = computed(() => page.props.value.user.user_type == 1);
const search = () => form.post(route("search.store"));
const filter = () => form1.post(route("filter.store"));
</script>
