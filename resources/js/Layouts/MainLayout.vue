<template>
    <div>
        <h1>SPRINT</h1>
    </div>
    <div>
        <Link href="/">Home</Link>&nbsp;
        <Link href="community">Community</Link>&nbsp;
        <Link href="community/create">New Community</Link>&nbsp;
        <Link href="service">Service</Link>&nbsp;
        <Link href="service/create">New Service</Link>&nbsp;
        <Link href="login">Login</Link>&nbsp;
    </div>
    <div v-if="flashSuccess">{{ flashSuccess }}</div>
    <slot></slot>
</template>

<script setup>
import { computed } from "vue";
import { Link, usePage } from "@inertiajs/inertia-vue3";
const page = usePage();
const flashSuccess = computed(() => page.props.value.flash.success);
defineProps({
    message: String,
});
</script>
