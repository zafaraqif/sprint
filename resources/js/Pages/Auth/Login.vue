<template>
    <div class="flex justify-center">
        <form
            @submit.prevent="login"
            class="w-1/3 mt-44 bg-white p-8 rounded-lg shadow-sm"
        >
            <div>
                <div class="text-2xl font-bold text-gray-800">
                    Log in to Your Account
                </div>
            </div>
            <div class="mt-4 grid grid-cols-2 gap-y-2">
                <div class="col-span-2">
                    <label for="email" class="block mb-1 text-gray-500"
                        >E-mail</label
                    >
                    <input
                        id="email"
                        v-model="form.email"
                        type="email"
                        class="block w-full p-2 rounded-md border border-gray-200 text-gray-500"
                    />
                    <div
                        v-if="form.errors.email"
                        class="mt-1 text-xs text-red-500"
                    >
                        {{ form.errors.email }}
                    </div>
                </div>
                <div class="col-span-2">
                    <label for="password" class="block mb-1 text-gray-500"
                        >Password</label
                    >
                    <input
                        id="password"
                        v-model="form.password"
                        type="password"
                        class="block w-full p-2 rounded-md border border-gray-200 text-gray-500"
                    />
                    <div
                        v-if="form.errors.password"
                        class="mt-1 text-xs text-red-500"
                    >
                        {{ form.errors.password }}
                    </div>
                </div>
            </div>
            <div class="mt-6 flex justify-between">
                <div>
                    <button
                        type="submit"
                        class="bg-indigo-500 px-4 py-2 text-white font-semibold rounded-md"
                    >
                        Login
                    </button>
                </div>
                <div class="mt-2 text-gray-500">
                    Don't have an account?
                    <span class="font-semibold text-indigo-500"
                        ><a href="/account/create">Register</a></span
                    >
                </div>
            </div>
        </form>
    </div>
</template>

<script setup>
import { useForm } from "@inertiajs/inertia-vue3";
const form = useForm({
    email: null,
    password: null,
});
const login = () => form.post(route("login.store"));
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
