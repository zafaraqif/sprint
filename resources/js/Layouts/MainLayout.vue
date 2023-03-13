<template>
    <div>
        <h1><Link href="/">SPRINT</Link></h1>
    </div>
    <div>
        <Link href="/home">Home</Link>&nbsp;
        <span v-if="isCustomer">
            <Link href="/order/create">Print Order</Link>&nbsp;
        </span>
        <span v-else>
            <Link href="/queue">Print Queue</Link>&nbsp;
            <Link href="/service">Print Service</Link>&nbsp;
        </span>
        <Link href="/order">Order History</Link>&nbsp;
        <Link href="/profile">Profile</Link>&nbsp;
        <Link href="/logout" method="delete" as="button">Logout</Link>&nbsp;{{
            user.name
        }}
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
    services: Array,
});
const user = computed(() => page.props.value.user);
const isCustomer = computed(() => page.props.value.user.user_type == 1);
</script>
