<template>
    <div class="bg-white flex justify-between px-16 py-6 shadow-sm">
        <div class="inline">
            <a href="/">
                <img src="/img/sprint-logo.png" class="h-10" />
            </a>
        </div>
        <div class="mt-3">
            <Link
                href="/login"
                class="mr-2 px-4 py-2 text-md font-semibold bg-indigo-500 text-white rounded-md"
                >Login</Link
            >
            <Link
                href="/account/create"
                class="px-4 py-2 text-md font-semibold border border-indigo-500 text-indigo-600 rounded-md"
                >Register</Link
            >
        </div>
    </div>
    <div>
        <slot></slot>
    </div>
</template>

<script setup>
import { Link } from "@inertiajs/inertia-vue3";
</script>
