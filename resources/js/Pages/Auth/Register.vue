<template>
    <div class="flex justify-center">
        <form
            @submit.prevent="register"
            class="w-1/3 mt-12 bg-white p-8 rounded-lg shadow-sm"
        >
            <div>
                <div class="text-2xl font-bold text-gray-800">
                    Register a New Account
                </div>
            </div>
            <div class="mt-4 grid grid-cols-2 gap-x-4 gap-y-2">
                <div class="col-span-2">
                    <label for="name" class="block mb-1 text-gray-500"
                        >Full Name</label
                    >
                    <input
                        id="name"
                        v-model="form.name"
                        type="text"
                        class="block w-full p-2 rounded-md border border-gray-200 text-gray-500"
                    />
                    <div
                        v-if="form.errors.name"
                        class="mt-1 text-xs text-red-500"
                    >
                        {{ form.errors.name }}
                    </div>
                </div>
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
                <div class="col-span-1">
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
                <div class="col-span-1">
                    <label
                        for="password_confirmation"
                        class="block mb-1 text-gray-500"
                        >Confirm Password</label
                    >
                    <input
                        id="password_confirmation"
                        v-model="form.password_confirmation"
                        type="password"
                        class="block w-full p-2 rounded-md border border-gray-200 text-gray-500"
                    />
                    <div
                        v-if="form.errors.password_confirmation"
                        class="mt-1 text-xs text-red-500"
                    >
                        {{ form.errors.password_confirmation }}
                    </div>
                </div>
                <div class="col-span-2">
                    <label for="phone_number" class="block mb-1 text-gray-500"
                        >Phone Number</label
                    >
                    <input
                        id="phone_number"
                        v-model="form.phone_number"
                        type="text"
                        class="block w-full p-2 rounded-md border border-gray-200 text-gray-500"
                    />
                    <div
                        v-if="form.errors.phone_number"
                        class="mt-1 text-xs text-red-500"
                    >
                        {{ form.errors.phone_number }}
                    </div>
                </div>
                <div class="-mb-1 col-span-2">
                    <label for="user_type" class="text-gray-500"
                        >Register As</label
                    >
                </div>
                <div class="col-span-1">
                    <div
                        class="flex justify-start rounded-md border border-gray-200"
                    >
                        <div>
                            <input
                                v-model="form.user_type"
                                type="radio"
                                value="1"
                                class="p-1 m-4 mr-2"
                            />
                        </div>
                        <div class="my-2 flex-col">
                            <div class="font-semibold">Customer</div>
                            <div class="-mt-1 text-xs text-gray-500">
                                Get printing services
                            </div>
                        </div>
                    </div>
                    <div
                        v-if="form.errors.user_type"
                        class="mt-1 text-xs text-red-500"
                    >
                        {{ form.errors.user_type }}
                    </div>
                </div>
                <div class="col-span-1">
                    <div
                        class="flex justify-start rounded-md border border-gray-200"
                    >
                        <div>
                            <input
                                v-model="form.user_type"
                                type="radio"
                                value="2"
                                class="p-1 m-4 mr-2"
                            />
                        </div>
                        <div class="my-2 flex-col">
                            <div class="font-semibold">Sprinter</div>
                            <div class="-mt-1 text-xs text-gray-500">
                                Provide printing services
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-6 flex justify-between">
                <div>
                    <button
                        type="submit"
                        class="bg-indigo-500 px-4 py-2 text-white font-semibold rounded-md"
                    >
                        Register
                    </button>
                </div>
                <div class="mt-2 text-gray-500">
                    Already have an account?
                    <span class="font-semibold text-indigo-500"
                        ><a href="/login">Login</a></span
                    >
                </div>
            </div>
        </form>
    </div>
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
