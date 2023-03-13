<template>
    <h1>Create Community</h1>
    <form @submit.prevent="create">
        <div>
            <div>
                <label>State</label>
                <input
                    v-model="form.state"
                    type="text"
                    placeholder="Enter state"
                />
                <div v-if="form.errors.state">
                    {{ form.errors.state }}
                </div>
            </div>

            <div>
                <label>District</label>
                <input
                    v-model="form.district"
                    type="text"
                    placeholder="Enter district"
                />
                <div v-if="form.errors.district">
                    {{ form.errors.district }}
                </div>
            </div>

            <div>
                <label>Locality Area</label>
                <input
                    v-model="form.locality"
                    type="text"
                    placeholder="Enter locality area"
                />
                <div v-if="form.errors.locality">
                    {{ form.errors.locality }}
                </div>
            </div>
            <div>
                <label>Community Name</label>
                <input
                    v-model="form.community_name"
                    type="text"
                    placeholder="Enter community name"
                />
                <div v-if="form.errors.community_name">
                    {{ form.errors.community_name }}
                </div>
            </div>

            <div class="mt-4">
                <button
                    type="submit"
                    class="px-4 py-2 bg-indigo-700 text-white rounded-md font-bold"
                >
                    Create Community
                </button>
            </div>
        </div>
    </form>
</template>

<script setup>
import { useForm } from "@inertiajs/inertia-vue3";

const form = useForm({
    community_name: null,
    locality: null,
    district: null,
    state: null,
});

const create = () => form.post(route("community.store"));
</script>

<style scoped>
label {
    margin-right: 2em;
}

div {
    padding: 2px;
}
</style>
