<template>
    <h1>SPRINT</h1>
    <Link href="/login" as="button">Login</Link>&nbsp;
    <Link href="/account/create" as="button">Register</Link>&nbsp;
    <slot></slot>
</template>

<script setup>
import { Link } from "@inertiajs/inertia-vue3";
</script>
