<template>
    <div class="absolute bg-indigo-500 w-full h-20 z-0"></div>
    <div class="flex z-20">
        <div class="sticky top-0 h-screen p-6">
            <aside
                class="h-full w-64 py-6 px-8 border-gray-200 bg-white rounded-xl shadow-sm"
            >
                <div class="w-full mt-4 flex justify-center">
                    <Link :href="'/home'">
                        <img src="/img/sprint-logo.png" class="w-40" />
                    </Link>
                </div>

                <div class="flex flex-col gap-4 pt-12">
                    <Link
                        href="/home"
                        class="flex gap-x-4 py-2 px-4 rounded-md font-semibold text-gray-500 hover:bg-indigo-50 hover:text-indigo-500 transition ease-in-out hover:scale-105 duration-200"
                        >Home</Link
                    >
                    <Link
                        v-if="isCustomer"
                        href="/community"
                        class="flex gap-x-4 py-2 px-4 rounded-md font-semibold text-gray-500 hover:bg-indigo-50 hover:text-indigo-500 transition ease-in-out hover:scale-105 duration-200"
                        >Print Order</Link
                    >
                    <Link
                        v-if="!isCustomer"
                        href="/queue"
                        class="flex gap-x-4 py-2 px-4 rounded-md font-semibold text-gray-500 hover:bg-indigo-50 hover:text-indigo-500 transition ease-in-out hover:scale-105 duration-200"
                        >Print Queue</Link
                    >
                    <Link
                        v-if="!isCustomer"
                        href="/service"
                        class="flex gap-x-4 py-2 px-4 rounded-md font-semibold text-gray-500 hover:bg-indigo-50 hover:text-indigo-500 transition ease-in-out hover:scale-105 duration-200"
                        >Print Service</Link
                    >
                    <Link
                        href="/order"
                        class="flex gap-x-4 py-2 px-4 rounded-md font-semibold text-gray-500 hover:bg-indigo-50 hover:text-indigo-500 transition ease-in-out hover:scale-105 duration-200"
                        >Order History</Link
                    >
                    <Link
                        href="/account"
                        class="flex gap-x-4 py-2 px-4 rounded-md font-semibold text-gray-500 hover:bg-indigo-50 hover:text-indigo-500 transition ease-in-out hover:scale-105 duration-200"
                        >Profile</Link
                    >
                </div>
            </aside>
        </div>

        <div class="w-full p-6 pt-4 pl-2 z-20">
            <slot></slot>
        </div>
    </div>
</template>

<script setup>
import { computed } from "vue";
import { Link, usePage } from "@inertiajs/inertia-vue3";

const page = usePage();
const isCustomer = computed(() => page.props.value.user.user_type == 1);
</script>
