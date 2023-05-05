<template>
    <div class="flex">
        <div class="w-1/2 ml-16 mt-48">
            <div class="flex">
                <div
                    class="border border-indigo-500 text-xs text-indigo-500 font-semibold rounded-md px-2 py-1"
                >
                    ABOUT SPRINT
                </div>
            </div>
            <div class="mt-8 text-5xl font-bold text-gray-700">
                No printer? <br />No problem, Use
                <span class="text-indigo-500">SPRINT</span>
            </div>
            <div class="mt-6 text-lg text-gray-500">
                A community-based, on-demand document printing platform. Get or
                provide document printing service from or for your community
                now.
            </div>
            <span class="mt-8 flex justify-start gap-x-2">
                <Link
                    href="/home"
                    class="mr-2 px-4 py-2 text-md font-semibold bg-indigo-500 text-white rounded-md shadow-xl shadow-indigo-200"
                >
                    Go to dashboard
                </Link>
                <Link
                    href="/account/create"
                    class="mr-2 px-4 py-2 text-md font-semibold bg-indigo-100 text-indigo-500 rounded-md"
                >
                    Join us
                </Link>
            </span>
        </div>
        <div class="p-24">
            <img src="/img/illustration.png" class="ml-16 w-5/6" />
        </div>
    </div>
</template>

<script setup>
import { Link } from "@inertiajs/inertia-vue3";
</script>

<script>
import LandingPage from "@/Layouts/LandingPage.vue";
export default {
    layout: LandingPage,
};
</script>
