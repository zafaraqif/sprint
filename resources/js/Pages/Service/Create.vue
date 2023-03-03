<template>
    <form @submit.prevent="create">
        <div>
            <div>
                <label>Sprinter ID</label>
                <input
                    v-model="form.sprinter_id"
                    type="number"
                    placeholder="Enter Sprinter ID"
                />
                <div v-if="form.errors.sprinter_id">
                    {{ form.errors.sprinter_id }}
                </div>
            </div>

            <div>
                <label>Community Name</label>
                <input
                    v-model="form.community_id"
                    type="number"
                    placeholder="Select Community"
                />
                <div v-if="form.errors.community_id">
                    {{ form.errors.community_id }}
                </div>
            </div>

            <div>
                <label>Service Name</label>
                <input
                    v-model="form.service_name"
                    type="text"
                    placeholder="Enter Service Name"
                />
                <div v-if="form.errors.service_name">
                    {{ form.errors.service_name }}
                </div>
            </div>

            <div>
                <label>Service Start Time</label>
                <input
                    v-model="form.start_time"
                    type="time"
                    placeholder="Enter service start time"
                />
                <div v-if="form.errors.start_time">
                    {{ form.errors.start_time }}
                </div>
            </div>

            <div>
                <label>Service End Time</label>
                <input
                    v-model="form.end_time"
                    type="time"
                    placeholder="Enter service end time"
                />
                <div v-if="form.errors.end_time">
                    {{ form.errors.end_time }}
                </div>
            </div>

            <div>
                <label>Order Pickup Start Time</label>
                <input
                    v-model="form.start_pickup_time"
                    type="time"
                    placeholder="Enter start pickup time"
                />
                <div v-if="form.errors.start_pickup_time">
                    {{ form.errors.start_pickup_time }}
                </div>
            </div>

            <div>
                <label>Order Pickup End Time</label>
                <input
                    v-model="form.end_pickup_time"
                    type="time"
                    placeholder="Enter end pickup time"
                />
                <div v-if="form.errors.end_pickup_time">
                    {{ form.errors.end_pickup_time }}
                </div>
            </div>

            <div>
                <label>Pickup Address</label>
                <input
                    v-model="form.pickup_address"
                    type="text"
                    placeholder="Enter pickup address"
                />
                <div v-if="form.errors.pickup_address">
                    {{ form.errors.pickup_address }}
                </div>
            </div>
            <div>
                <label>Print Page Limit</label>
                <input
                    v-model="form.page_limit"
                    type="number"
                    min="1"
                    placeholder="Enter print page limit"
                />
                <div v-if="form.errors.page_limit">
                    {{ form.errors.page_limit }}
                </div>
            </div>

            <div>
                <label>Print Price (B&W)</label>
                <input
                    v-model="form.price_bnw"
                    type="number"
                    step="0.01"
                    min="0"
                    placeholder="Enter price (RM)"
                />
                <div v-if="form.errors.price_bnw">
                    {{ form.errors.price_bnw }}
                </div>
            </div>

            <div>
                <label>Print Price (Color)</label>
                <input
                    v-model="form.price_color"
                    type="number"
                    step="0.01"
                    min="0"
                    placeholder="Enter price (RM)"
                />
                <div v-if="form.errors.price_color">
                    {{ form.errors.price_color }}
                </div>
            </div>

            <div>
                <label>80gsm Paper Extra Charges</label>
                <input
                    v-model="form.charge_80gsm"
                    type="number"
                    step="0.01"
                    min="0"
                    placeholder="Enter price (RM)"
                />
                <div v-if="form.errors.charge_80gsm">
                    {{ form.errors.charge_80gsm }}
                </div>
            </div>

            <div class="mt-4">
                <button
                    type="submit"
                    class="px-4 py-2 bg-indigo-700 text-white rounded-md font-bold"
                >
                    Create Service
                </button>
            </div>
        </div>
    </form>
</template>

<script setup>
import { useForm } from "@inertiajs/inertia-vue3";

const form = useForm({
    sprinter_id: null,
    community_id: null,
    service_name: null,
    start_time: null,
    end_time: null,
    start_pickup_time: null,
    end_pickup_time: null,
    pickup_address: null,
    page_limit: null,
    price_bnw: null,
    price_color: null,
    charge_80gsm: null,
});

const create = () => form.post(route("service.store"));
</script>

<style scoped>
label {
    margin-right: 2em;
}

div {
    padding: 2px;
}
</style>
