<template>
    <h1>Service Page</h1>
    <div v-for="service in services" :key="service.service_id">
        {{ service.service_name }}
        <Link href="`service/${service.service_id}/edit`">Edit</Link>
    </div>
</template>

<script setup>
import { Link } from "@inertiajs/inertia-vue3";
defineProps({
    services: Array,
});
</script>
