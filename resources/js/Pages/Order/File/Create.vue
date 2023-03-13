<template>
    <form @submit.prevent="upload">
        <input type="file" accept=".pdf" @input="addFiles" />

        <div>
            <label>Pages Per Sheet</label>
            <input
                v-model.number="form.pages_per_sheet"
                type="number"
                min="0"
                placeholder="Enter pages per sheet"
            />
        </div>

        <div>
            <label>Print Color</label>
            <input
                v-model.number="form.print_color"
                type="number"
                min="0"
                placeholder="Enter print color"
            />
        </div>

        <div>
            <label>Print Method</label>
            <input
                v-model.number="form.print_method"
                type="number"
                min="0"
                placeholder="Enter print method"
            />
        </div>

        <div>
            <label>Paper Weight</label>
            <input
                v-model.number="form.paper_weight"
                type="number"
                min="0"
                placeholder="Enter paper weight"
            />
        </div>

        <button type="submit">Submit</button>
        <button type="reset" @click="reset">Reset</button>
    </form>
</template>

<script setup>
import { useForm } from "@inertiajs/inertia-vue3";

const props = defineProps({
    order: Object,
});

const form = useForm({
    files: [],
    pages_per_sheet: null,
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

const reset = () => form.reset("files");
</script>

<style scoped>
label {
    margin-right: 2em;
}

div {
    padding: 2px;
}
</style>
