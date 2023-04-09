<template>
    <div class="px-16 mt-44">
        <div class="flex">
            <div
                class="bg-indigo-100 text-sm text-indigo-500 font-bold rounded-md px-2 py-1"
            >
                ABOUT
            </div>
        </div>
        <div class="w-1/2 mt-8 text-5xl font-bold text-gray-700">
            No printer?
        </div>
        <div class="w-1/2 mt-2 text-5xl font-bold text-gray-700">
            No problem, Use <span class="text-indigo-500">SPRINT</span>
        </div>
        <div class="w-1/2 mt-6 text-lg text-gray-500">
            A community-based, on-demand document printing platform. Get or
            provide document printing service from or for your community now.
        </div>
        <span class="mt-8 flex justify-start gap-x-2">
            <button
                href="/home"
                class="mr-2 px-4 py-2 text-md font-semibold bg-indigo-500 text-white rounded-md shadow-xl shadow-indigo-200"
            >
                Go to dashboard
            </button>
            <button
                href="/account/create"
                class="mr-2 px-4 py-2 text-md font-semibold border border-indigo-500 text-indigo-500 rounded-md"
            >
                Join us
            </button>
        </span>
    </div>
</template>

<script setup></script>

<script>
import LandingPage from "@/Layouts/LandingPage.vue";
export default {
    layout: LandingPage,
};
</script>
