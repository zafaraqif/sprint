<template>
    <form @submit.prevent="upload">
        <input type="file" accept=".pdf" @input="addFiles" />

        <div>
            <label>Number of Pages (per sheet)</label>
            <select v-model.number="form.pages_per_sheet">
                <option disabled selected hidden>Choose pages per sheet</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="4">4</option>
                <option value="6">6</option>
                <option value="9">9</option>
                <option value="16">16</option>
            </select>
        </div>

        <div>
            <label>Page Orientation</label>
            <select v-model.number="form.orientation">
                <option disabled selected hidden>
                    Choose page orientation
                </option>
                <option value="1">Portrait</option>
                <option value="2">Landscape</option>
            </select>
        </div>

        <div>
            <label>Print Color</label>
            <select v-model.number="form.print_color">
                <option disabled selected hidden>Choose print color</option>
                <option value="1">Black & White</option>
                <option value="2">Color</option>
            </select>
        </div>

        <div>
            <label>Print Method</label>
            <select v-model.number="form.print_method">
                <option disabled selected hidden>Choose print method</option>
                <option value="1">One-Sided</option>
                <option value="2">Two-Sided</option>
            </select>
        </div>

        <div>
            <label>Paper Thickness</label>
            <select v-model.number="form.paper_weight">
                <option disabled selected hidden>Choose paper thickness</option>
                <option value="0">70gsm Paper</option>
                <option value="1">80gsm Paper</option>
            </select>
        </div>

        <button type="submit">Submit</button>
        <button type="reset" @click="reset">Reset</button>
    </form>
    <Link as="button" :href="route('order.show', { order: order.order_id })"
        >Next</Link
    >
</template>

<script setup>
import { Link, useForm, usePage } from "@inertiajs/inertia-vue3";

const page = usePage();

const props = defineProps({
    order: Object,
});

const form = useForm({
    files: [],
    pages_per_sheet: null,
    orientation: null,
    print_color: null,
    print_method: null,
    paper_weight: null,
});

const upload = () => {
    form.post(route("order.file.store", { order: props.order.order_id }), {
        onSuccess: () => form.reset("files"),
    });
};

const addFiles = (event) => {
    for (const file of event.target.files) {
        form.files.push(file);
    }
};

const reset = () => form.reset("file");
</script>

<style scoped>
label {
    margin-right: 2em;
}

div {
    padding: 2px;
}
</style>
