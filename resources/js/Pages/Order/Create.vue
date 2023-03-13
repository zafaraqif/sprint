<template>
    <h1>Print Order</h1>
    <form @submit.prevent="create">
        <div>
            <div>
                <label>Service ID</label>
                <input
                    v-model.number="form.service_id"
                    type="number"
                    placeholder="Enter User ID"
                />
                <div v-if="form.errors.service_id">
                    {{ form.errors.service_id }}
                </div>
            </div>

            <div>
                <label>Pickup Date</label>
                <input
                    v-model="form.order_pickup_date"
                    type="date"
                    placeholder="Enter Pickup Date"
                />
                <div v-if="form.errors.order_pickup_date">
                    {{ form.errors.order_pickup_date }}
                </div>
            </div>

            <div>
                <label>Pickup Time</label>
                <input
                    v-model="form.order_pickup_time"
                    type="time"
                    placeholder="Enter pickup time"
                />
                <div v-if="form.errors.order_pickup_time">
                    {{ form.errors.order_pickup_time }}
                </div>
            </div>

            <div class="mt-4">
                <button
                    type="submit"
                    class="px-4 py-2 bg-indigo-700 text-white rounded-md font-bold"
                >
                    Create Order
                </button>
            </div>
        </div>
    </form>
</template>

<script setup>
import { useForm, usePage } from "@inertiajs/inertia-vue3";

const page = usePage();

const form = useForm({
    user_id: page.props.value.user.user_id,
    service_id: null,
    order_pickup_date: null,
    order_pickup_time: null,
});

const create = () => form.post(route("order.store"));
</script>

<style scoped>
label {
    margin-right: 2em;
}

div {
    padding: 2px;
}
</style>
