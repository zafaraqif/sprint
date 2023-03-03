<template>
    <h1>Community Page</h1>
    <div v-for="community in communities" :key="community.community_id">
        {{ community.community_name }}, {{ community.locality }},
        {{ community.district }}, {{ community.state }}
    </div>
</template>

<script setup>
defineProps({
    communities: Array,
});
</script>
