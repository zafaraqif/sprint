<template>
    <div class="bg-gray-50 flex justify-between px-12 my-4">
        <div>
            <a href="/home">
                <img src="/img/sprint-logo.png" class="w-32" />
            </a>
        </div>
        <div class="flex justify-between gap-x-4">
            <Link
                href="/login"
                as="button"
                class="px-4 py-2 text-md font-semibold bg-indigo-500 text-white rounded-md"
                >Login</Link
            >
            <Link
                href="/account/create"
                as="button"
                class="px-4 py-2 text-md font-semibold border border-indigo-500 text-indigo-600 rounded-md"
                >Register</Link
            >
        </div>
    </div>
    <div class="bg-white h-screen">
        <slot></slot>
    </div>
</template>

<script setup>
import { Link } from "@inertiajs/inertia-vue3";
</script>
