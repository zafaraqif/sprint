<template>
    <h1>Profile</h1>

    <h2>{{ user.name }}</h2>
    Email: {{ user.email }}
    <br />
    Phone Number: {{ user.phone_number }}
    <br />

    <div>
        <h2>Change Password</h2>
        <form @submit.prevent="update">
            <div>
                <label for="password">New Password</label>
                <input id="password" v-model="form.password" type="password" />
                <div v-if="form.errors.password">
                    {{ form.errors.password }}
                </div>
            </div>
            <div>
                <label for="password_confirmation">Confirm Password</label>
                <input
                    id="password_confirmation"
                    v-model="form.password_confirmation"
                    type="password"
                />
            </div>
            <button type="submit">Change Password</button>
        </form>
    </div>

    <div v-if="!isCustomer">
        <h2>Service</h2>
        <div v-if="service == null">Service Not Created</div>
        <div v-else>
            Service Status:
            <span v-if="service.service_status == 0">Close</span>
            <span v-if="service.service_status == 1">Open</span><br />
            <span>Service Name: {{ service.service_name }}</span
            ><br />
            <span>Community: {{ service.community_id }}</span
            ><br />
            <span>Pickup Address: {{ service.pickup_address }}</span
            ><br />
            <span>Contact Number: {{ service.contact_number }}</span
            ><br />
            <span
                >Operational Hours: {{ service.start_time }} -
                {{ service.end_time }}</span
            ><br />
            <span
                >Pickup Hours: {{ service.start_pickup_time }} -
                {{ service.end_pickup_time }}</span
            ><br />
            <span>B&W Print Price (per page): RM{{ service.price_bnw }}</span
            ><br />
            <span
                >Color Print Price (per page): RM{{ service.price_color }}</span
            ><br />
            <span
                >80gsm Paper Charges (per sheet): RM{{
                    service.charge_80gsm
                }}</span
            ><br />
            <span>Print Page Limit: {{ service.page_limit }}</span
            ><br />
        </div>
    </div>
</template>

<script setup>
import { computed } from "vue";
import { usePage, useForm } from "@inertiajs/inertia-vue3";

const page = usePage();
const user = computed(() => page.props.value.user);

defineProps({
    service: Object,
});

const form = useForm({
    password: null,
    password_confirmation: null,
});

const update = () =>
    form.put(
        route("account.update", { account: page.props.value.user.user_id })
    );

const isCustomer = computed(() => page.props.value.user.user_type == 1);
</script>

<style scoped>
label {
    margin-right: 2em;
}

div {
    padding: 2px;
}
</style>
