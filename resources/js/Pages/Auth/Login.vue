<template>
    <form @submit.prevent="login">
        <div>
            <div>
                <label for="email">E-mail</label>
                <input id="email" v-model="form.email" type="email" />
                <div v-if="form.errors.email">{{ form.errors.email }}</div>
            </div>
            <div class="mt-4">
                <label for="password">Password</label>
                <input id="password" v-model="form.password" type="password" />
                <div v-if="form.errors.password">
                    {{ form.errors.password }}
                </div>
            </div>
            <div class="mt-4">
                <button type="submit">Login</button>
            </div>
        </div>
    </form>
</template>

<script setup>
import { useForm } from "@inertiajs/inertia-vue3";
const form = useForm({
    email: null,
    password: null,
});
const login = () => form.post(route("login.store"));
</script>

<!-- <script>
import MainLayout from "@/Layouts/MainLayout.vue";
export default {
    layout: MainLayout,
};
</script> -->
