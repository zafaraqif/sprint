<template>
    <h1>Service</h1>
    <div v-for="service in services" :key="service.service_id">
        {{ service.service_name }}
        <Link :href="route('service.edit', { service: service.service_id })"
            >Edit</Link
        >
    </div>
</template>

<script setup>
import { Link } from "@inertiajs/inertia-vue3";
defineProps({
    services: Object,
});
</script>
