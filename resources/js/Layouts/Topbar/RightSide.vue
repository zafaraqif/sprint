<template>
    <div class="mt-3">
        <div
            v-if="flashSuccess"
            class="-mt-1 w-auto bg-indigo-200 px-2 py-1 inline-flex justify-between text-indigo-700 shadow-md font-semibold rounded-md text-sm"
        >
            <div class="pr-2">
                {{ flashSuccess }}
            </div>
            <div @click="dismiss">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="16"
                    height="16"
                    fill="rgb(67 56 202)"
                    class="bi bi-x"
                    viewBox="0 0 12 12"
                >
                    <path
                        d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"
                    />
                </svg>
            </div>
        </div>
        <div class="inline-block px-4 text-sm font-medium text-white">
            Hi, {{ user.name }}
        </div>
        <Link
            href="/logout"
            method="delete"
            class="px-4 py-2 text-sm font-semibold border-2 border-white text-white rounded-md"
            >Logout</Link
        >
    </div>
</template>

<script setup>
import { computed } from "vue";
import { Link, usePage } from "@inertiajs/inertia-vue3";

const page = usePage();
const flashSuccess = computed(() => page.props.value.flash.success);
const user = computed(() => page.props.value.user);
const dismiss = () => (page.props.value.flash.success = false);
</script>
