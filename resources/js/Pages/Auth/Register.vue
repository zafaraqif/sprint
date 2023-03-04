<template>
    <form @submit.prevent="register">
        <div>
            <div>
                <label for="name">Full Name</label>
                <input id="name" v-model="form.name" type="text" />
                <div v-if="form.errors.name">
                    {{ form.errors.name }}
                </div>
            </div>
            <div>
                <label for="email">E-mail</label>
                <input id="email" v-model="form.email" type="email" />
                <div v-if="form.errors.email">{{ form.errors.email }}</div>
            </div>
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
            <div>
                <label for="user_type">User Type</label>
                <input
                    id="user_type"
                    v-model.number="form.user_type"
                    type="number"
                />
                <div v-if="form.errors.user_type">
                    {{ form.errors.user_type }}
                </div>
            </div>
            <div>
                <label for="phone_number">Phone Number</label>
                <input
                    id="phone_number"
                    v-model="form.phone_number"
                    type="text"
                />
                <div v-if="form.errors.phone_number">
                    {{ form.errors.phone_number }}
                </div>
            </div>
            <div>
                <button type="submit">Register</button>
            </div>
        </div>
    </form>
</template>

<script setup>
import { useForm } from "@inertiajs/inertia-vue3";
const form = useForm({
    name: null,
    email: null,
    password: null,
    password_confirmation: null,
    user_type: null,
    phone_number: null,
});
const register = () => form.post(route("account.store"));
</script>

<script>
import LandingPage from "@/Layouts/LandingPage.vue";
export default {
    layout: LandingPage,
};
</script>

<style scoped>
label {
    margin-right: 2em;
}

div {
    padding: 2px;
}
</style>
