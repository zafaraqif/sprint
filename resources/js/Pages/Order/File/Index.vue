<template>
    <Navbar>
        <PageTitle>
            <Title>View File</Title>
            <Breadcrumb
                ><a href="/queue">Print Queue</a> &nbsp;/ &nbsp;<span
                    >Order #{{ order.order_id }}</span
                ></Breadcrumb
            >
        </PageTitle>
        <RightSide></RightSide>
    </Navbar>
    <div>
        <table
            class="w-full table-auto mt-4 bg-white rounded-lg text-left shadow-sm"
        >
            <thead>
                <tr class="border-b border-gray-200">
                    <th class="text-md font-semibold p-6">File</th>
                    <th class="text-md font-semibold p-6">Page Per Sheet</th>
                    <th class="text-md font-semibold p-6">Orientation</th>
                    <th class="text-md font-semibold p-6">Print Color</th>
                    <th class="text-md font-semibold p-6">Print Method</th>
                    <th class="text-md font-semibold p-6">Paper Thickness</th>
                    <th class="text-md font-semibold p-6">Number of Sheet</th>
                    <th class="text-md font-semibold p-6">Action</th>
                </tr>
            </thead>
            <tbody v-for="(file, index) in files" :key="file.file_id">
                <tr class="border-b border-gray-100">
                    <td class="p-6 font-semibold">{{ index + 1 }}</td>
                    <td class="p-6">{{ file.pages_per_sheet }} pages(s)</td>
                    <td v-if="file.orientation === 1" class="p-6">Portrait</td>
                    <td v-else class="p-6">Landscape</td>
                    <td v-if="file.print_color === 1" class="p-6">
                        Black & White
                    </td>
                    <td v-else class="p-6">Color</td>
                    <td v-if="file.print_method === 1" class="p-6">
                        One-Sided
                    </td>
                    <td v-else class="p-6">Two-Sided</td>
                    <td v-if="file.print_method === 0" class="p-6">70gsm</td>
                    <td v-else class="p-6">80gsm</td>
                    <td class="p-6">{{ file.sheets_to_print }} sheet(s)</td>
                    <td class="p-6 justify-start grid grid-cols-1 gap-x-4">
                        <a
                            :href="
                                '/order/' +
                                order.order_id +
                                '/file/' +
                                file.file_id
                            "
                            target="_blank"
                            class="px-3 py-2 bg-indigo-500 text-white rounded-md text-sm font-semibold text-center"
                            >Open File</a
                        >
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script setup>
import Navbar from "@/Layouts/Topbar/Navbar.vue";
import PageTitle from "@/Layouts/Topbar/PageTitle.vue";
import Title from "@/Layouts/Topbar/Title.vue";
import Breadcrumb from "@/Layouts/Topbar/Breadcrumb.vue";
import RightSide from "@/Layouts/Topbar/RightSide.vue";

defineProps({
    files: Object,
    order: Object,
});
</script>
