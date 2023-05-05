<template>
    <Navbar>
        <PageTitle>
            <Title>3. Enter Order Details</Title>
            <Breadcrumb
                >Print Order &nbsp;/&nbsp;
                <a href="/community">Community</a>&nbsp; / &nbsp;<a
                    @click="back"
                    >Sprinter</a
                >
                &nbsp;/&nbsp; <span>Order Details</span></Breadcrumb
            >
        </PageTitle>
        <RightSide></RightSide>
    </Navbar>
    <div class="flex justify-between gap-4 mb-6">
        <div class="w-full h-2 bg-indigo-500 rounded-full"></div>
        <div class="w-full h-2 bg-indigo-500 rounded-full"></div>
        <div class="w-full h-2 bg-indigo-500 rounded-full"></div>
        <div class="w-full h-2 bg-indigo-100 rounded-full"></div>
        <div class="w-full h-2 bg-indigo-100 rounded-full"></div>
    </div>

    <form @submit.prevent="create" class="bg-white p-6 rounded-md shadow-sm">
        <div class="grid grid-cols-2 gap-4">
            <div class="col-span-1">
                <label class="block mb-1 text-gray-500">Pickup Date</label>
                <select
                    v-model="form.order_pickup_date"
                    class="block w-full p-2 rounded-md border border-gray-200 text-gray-500"
                >
                    <option
                        v-for="item in date"
                        :value="item"
                        class="text-gray-400 font-medium"
                    >
                        {{ item }}
                    </option>
                </select>
                <div v-if="form.errors.order_pickup_date">
                    {{ form.errors.order_pickup_date }}
                </div>
            </div>

            <div class="col-span-1">
                <label class="block mb-1 text-gray-500">Pickup Time</label>
                <select
                    v-model="form.order_pickup_time"
                    class="block w-full p-2 rounded-md border border-gray-200 text-gray-500"
                >
                    <option
                        v-for="item in time"
                        :value="item"
                        class="text-gray-400 font-medium"
                    >
                        {{ item }}
                    </option>
                </select>
                <div v-if="form.errors.order_pickup_time">
                    {{ form.errors.order_pickup_time }}
                </div>
            </div>

            <div class="flex justify-start gap-x-2 mt-4">
                <Link
                    href="#"
                    @click="back"
                    class="px-4 py-2 text-sm font-semibold bg-indigo-100 text-indigo-500 rounded-md"
                    >Back</Link
                >
                <button
                    type="submit"
                    class="px-4 py-2 bg-indigo-500 text-sm text-white rounded-md font-bold"
                >
                    Next
                </button>
            </div>
        </div>
    </form>
</template>

<script setup>
import { useForm, usePage, Link } from "@inertiajs/inertia-vue3";
import Navbar from "@/Layouts/Topbar/Navbar.vue";
import PageTitle from "@/Layouts/Topbar/PageTitle.vue";
import Title from "@/Layouts/Topbar/Title.vue";
import Breadcrumb from "@/Layouts/Topbar/Breadcrumb.vue";
import RightSide from "@/Layouts/Topbar/RightSide.vue";

defineProps({
    service: Object,
    date: Array,
    time: Array,
});

const page = usePage();
const form = useForm({
    user_id: page.props.value.user.user_id,
    service_id: page.props.value.service.service_id,
    order_pickup_date: null,
    order_pickup_time: null,
});

const create = () => form.post(route("order.store"));
const back = () => window.history.back();
</script>
