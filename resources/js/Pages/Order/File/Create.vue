<template>
    <Navbar>
        <PageTitle>
            <Title>4. Upload File(s)</Title>
            <Breadcrumb
                >Print Order &nbsp;/&nbsp; <span>Community</span>&nbsp; /
                &nbsp;<span>Sprinter</span> &nbsp;/&nbsp;
                <span>Order Details</span>&nbsp; /&nbsp;
                <span>File(s)</span></Breadcrumb
            >
        </PageTitle>
        <RightSide></RightSide>
    </Navbar>
    <div class="flex justify-between gap-4 mb-6">
        <div class="w-full h-2 bg-indigo-500 rounded-full"></div>
        <div class="w-full h-2 bg-indigo-500 rounded-full"></div>
        <div class="w-full h-2 bg-indigo-500 rounded-full"></div>
        <div class="w-full h-2 bg-indigo-500 rounded-full"></div>
        <div class="w-full h-2 bg-indigo-100 rounded-full"></div>
    </div>
    <form @submit.prevent="upload" class="bg-white p-6 rounded-md shadow-sm">
        <div class="font-medium text-gray-400 mb-2">
            File Limit:
            <span v-if="form.counter > 0" class="text-indigo-500"
                >{{ form.counter }} file(s) left</span
            >
            <span v-else class="text-red-500"
                >{{ form.counter }} file(s) left</span
            >
        </div>
        <div class="grid grid-cols-2 gap-4">
            <div class="col-span-1">
                <label class="block mb-1 text-gray-500">Upload File</label>
                <input
                    type="file"
                    accept=".pdf"
                    @input="addFiles"
                    class="w-full text-gray-500 border rounded-md file:px-4 file:py-2 border-gray-200 file:text-white file:border-0 file:bg-indigo-500 file:mr-4 file:font-semibold file:hover:cursor-pointer"
                />
            </div>
            <div class="col-span-1">
                <label class="block mb-1 text-gray-500">Pages Per Sheet</label>
                <select
                    v-model.number="form.pages_per_sheet"
                    class="block w-full p-2 rounded-md border border-gray-200 text-gray-500"
                >
                    <option disabled selected hidden>
                        Choose pages per sheet
                    </option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="4">4</option>
                    <option value="6">6</option>
                    <option value="9">9</option>
                    <option value="16">16</option>
                </select>
                <div
                    v-if="form.errors.pages_per_sheet"
                    class="mt-1 text-xs text-red-500"
                >
                    {{ form.errors.pages_per_sheet }}
                </div>
            </div>

            <div class="col-span-1">
                <label class="block mb-1 text-gray-500">Page Orientation</label>
                <select
                    v-model.number="form.orientation"
                    class="block w-full p-2 rounded-md border border-gray-200 text-gray-500"
                >
                    <option disabled selected hidden>
                        Choose page orientation
                    </option>
                    <option value="1">Portrait</option>
                    <option value="2">Landscape</option>
                </select>
                <div
                    v-if="form.errors.orientation"
                    class="mt-1 text-xs text-red-500"
                >
                    {{ form.errors.orientation }}
                </div>
            </div>

            <div class="col-span-1">
                <label class="block mb-1 text-gray-500">Print Color</label>
                <select
                    v-model.number="form.print_color"
                    class="block w-full p-2 rounded-md border border-gray-200 text-gray-500"
                >
                    <option disabled selected hidden>Choose print color</option>
                    <option value="1">Black & White</option>
                    <option value="2">Color</option>
                </select>
                <div
                    v-if="form.errors.print_color"
                    class="mt-1 text-xs text-red-500"
                >
                    {{ form.errors.print_color }}
                </div>
            </div>

            <div class="col-span-1">
                <label class="block mb-1 text-gray-500">Print Method</label>
                <select
                    v-model.number="form.print_method"
                    class="block w-full p-2 rounded-md border border-gray-200 text-gray-500"
                >
                    <option disabled selected hidden>
                        Choose print method
                    </option>
                    <option value="1">One-Sided</option>
                    <option value="2">Two-Sided</option>
                </select>
                <div
                    v-if="form.errors.print_method"
                    class="mt-1 text-xs text-red-500"
                >
                    {{ form.errors.print_method }}
                </div>
            </div>

            <div class="col-span-1">
                <label class="block mb-1 text-gray-500">Paper Thickness</label>
                <select
                    v-model.number="form.paper_weight"
                    class="block w-full p-2 rounded-md border border-gray-200 text-gray-500"
                >
                    <option value="0">70gsm Paper</option>
                    <option value="1">80gsm Paper</option>
                </select>
                <div
                    v-if="form.errors.paper_weight"
                    class="mt-1 text-xs text-red-500"
                >
                    {{ form.errors.paper_weight }}
                </div>
            </div>
            <div class="col-span-2 mt-2">
                <div class="flex justify-between">
                    <div class="flex justify-start gap-x-2">
                        <div
                            v-if="!canUpload || form.counter <= 0"
                            class="px-4 py-2 bg-gray-100 text-sm text-gray-400 rounded-md font-semibold"
                        >
                            Upload
                        </div>
                        <button
                            v-else
                            type="submit"
                            class="px-4 py-2 bg-indigo-500 text-sm text-white rounded-md font-semibold"
                        >
                            Upload
                        </button>
                        <div
                            v-if="!canUpload || form.counter <= 0"
                            class="px-4 py-2 bg-white text-sm text-gray-400 rounded-md font-semibold"
                        >
                            Reset
                        </div>
                        <button
                            v-else
                            @click="reset"
                            class="px-4 py-2 text-sm bg-indigo-100 text-indigo-500 font-semibold rounded-md"
                        >
                            Reset
                        </button>
                    </div>
                    <div class="flex justify-start gap-x-2">
                        <Link
                            :href="'/order/' + order.order_id"
                            method="delete"
                            class="px-4 py-2 bg-indigo-100 text-sm text-indigo-500 rounded-md font-semibold"
                            >Cancel</Link
                        >

                        <Link
                            v-if="form.counter < 5"
                            as="button"
                            :href="
                                route('order.show', { order: order.order_id })
                            "
                            class="px-4 py-2 bg-indigo-500 text-sm text-white rounded-md font-semibold"
                            >Next</Link
                        >

                        <span
                            v-else
                            class="px-4 py-2 bg-gray-100 text-sm text-gray-400 rounded-md font-semibold"
                            >Next</span
                        >
                    </div>
                </div>
            </div>
        </div>
    </form>
</template>

<script setup>
import { computed } from "vue";
import { Link, useForm } from "@inertiajs/inertia-vue3";
import Navbar from "@/Layouts/Topbar/Navbar.vue";
import PageTitle from "@/Layouts/Topbar/PageTitle.vue";
import Title from "@/Layouts/Topbar/Title.vue";
import Breadcrumb from "@/Layouts/Topbar/Breadcrumb.vue";
import RightSide from "@/Layouts/Topbar/RightSide.vue";

const props = defineProps({
    order: Object,
});
const form = useForm({
    order_id: props.order.order_id,
    files: [],
    pages_per_sheet: null,
    orientation: null,
    print_color: null,
    print_method: null,
    paper_weight: null,
    counter: 5,
});

const canUpload = computed(() => form.files.length);

const upload = () => {
    form.post(route("order.file.store", { order: props.order.order_id }), {
        onSuccess: () => {
            form.reset("files");
            form.reset("pages_per_sheet");
            form.reset("orientation");
            form.reset("print_color");
            form.reset("print_method");
            form.reset("paper_weight");
            form.counter = form.counter - 1;
        },
    });
};

const addFiles = (event) => {
    for (const file of event.target.files) {
        form.files.push(file);
    }
};

const reset = () => {
    form.reset("files");
    form.reset("pages_per_sheet");
    form.reset("orientation");
    form.reset("print_color");
    form.reset("print_method");
    form.reset("paper_weight");
};
</script>
