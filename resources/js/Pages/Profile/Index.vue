<template>
    <h1>Profile</h1>
    <div>
        <h2>{{ user.name }}</h2>
        Email: {{ user.email }}
        <br />
        Phone Number: {{ user.phone_number }}
        <br />
    </div>
    <div>
        <h2>Change Password</h2>
        <form @submit.prevent="update">
            <div>
                <label for="password">Password</label>
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
</template>

<script setup>
import { computed } from "vue";
import { usePage, useForm } from "@inertiajs/inertia-vue3";

const form = useForm({
    password: null,
    password_confirmation: null,
});
const page = usePage();
const user = computed(() => page.props.value.user);
const update = () =>
    form.put(
        route("account.update", { account: page.props.value.user.user_id })
    );
</script>

<style scoped>
label {
    margin-right: 2em;
}

div {
    padding: 2px;
}
</style>
