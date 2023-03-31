<template>
    <Navbar>
        <PageTitle>
            <Title>Create Community</Title>
            <Breadcrumb
                ><a href="/service">Print Service</a>&nbsp; / &nbsp;<span
                    >Create Community</span
                ></Breadcrumb
            >
        </PageTitle>
        <RightSide></RightSide>
    </Navbar>
    <form @submit.prevent="create" class="bg-white p-6 rounded-lg shadow-sm">
        <div class="grid grid-cols-2 gap-4">
            <div class="col-span-1">
                <label class="block mb-1 text-gray-500">State</label>
                <select
                    v-model="form.state"
                    class="block w-full p-2 rounded-md border border-gray-200 text-gray-500"
                >
                    <option value="Johor">Johor</option>
                    <option value="Kedah">Kedah</option>
                    <option value="Kelantan">Kelantan</option>
                    <option value="Melaka">Melaka</option>
                    <option value="Negeri Sembilan">Negeri Sembilan</option>
                    <option value="Pahang">Pahang</option>
                    <option value="Perak">Perak</option>
                    <option value="Perlis">Perlis</option>
                    <option value="Pulau Pinang">Pulau Pinang</option>
                    <option value="Sabah">Sabah</option>
                    <option value="Sarawak">Sarawak</option>
                    <option value="Selangor">Selangor</option>
                    <option value="Terengganu">Terengganu</option>
                    <option value="Wilayah Persekutuan">
                        Wilayah Persekutuan
                    </option>
                </select>
                <div v-if="form.errors.state">
                    {{ form.errors.state }}
                </div>
            </div>

            <div class="col-span-1">
                <label class="block mb-1 text-gray-500">District</label>
                <select
                    v-if="form.state === 'Johor'"
                    v-model="form.district"
                    class="block w-full p-2 rounded-md border border-gray-200 text-gray-500"
                >
                    <option value="Batu Pahat">Batu Pahat</option>
                    <option value="Johor Bahru">Johor Bahru</option>
                    <option value="Kluang">Kluang</option>
                    <option value="Kota Tinggi">Kota Tinggi</option>
                    <option value="Kulai">Kulai</option>
                    <option value="Mersing">Mersing</option>
                    <option value="Muar">Muar</option>
                    <option value="Pontian">Pontian</option>
                    <option value="Segamat">Segamat</option>
                    <option value="Tangkak">Tangkak</option>
                </select>
                <select
                    v-else-if="form.state === 'Kedah'"
                    v-model="form.district"
                    class="block w-full p-2 rounded-md border border-gray-200 text-gray-500"
                >
                    <option value="Baling">Baling</option>
                    <option value="Bandar Baharu">Bandar Baharu</option>
                    <option value="Kota Setar">Kota Setar</option>
                    <option value="Kuala Muda">Kuala Mudai</option>
                    <option value="Kubang Pasu">Kubang Pasu</option>
                    <option value="Kulim">Kulim</option>
                    <option value="Langkawi">Langkawi</option>
                    <option value="Padang Terap">Padang Terap</option>
                    <option value="Pendang">Pendang</option>
                    <option value="Pokok Sena">Pokok Sena</option>
                    <option value="Sik">Sik</option>
                    <option value="Yan">Yan</option>
                </select>
                <select
                    v-else-if="form.state === 'Kelantan'"
                    v-model="form.district"
                    class="block w-full p-2 rounded-md border border-gray-200 text-gray-500"
                >
                    <option value="Bachok">Bachok</option>
                    <option value="Gua Musang">Gua Musang</option>
                    <option value="Jeli">Jeli</option>
                    <option value="Kota Bharu">Kota Bharu</option>
                    <option value="Kuala Krai">Kuala Krai</option>
                    <option value="Machang">Machang</option>
                    <option value="Pasir Mas">Pasir Mas</option>
                    <option value="Pasir Puteh">Pasir Puteh</option>
                    <option value="Tanah Merah">Tanah Merah</option>
                    <option value="Tumpat">Tumpat</option>
                </select>
                <select
                    v-else-if="form.state === 'Melaka'"
                    v-model="form.district"
                    class="block w-full p-2 rounded-md border border-gray-200 text-gray-500"
                >
                    <option value="Alor Gajah">Alor Gajah</option>
                    <option value="Jasin">Jasin</option>
                    <option value="Melaka Tengah">Melaka Tengah</option>
                </select>
                <select
                    v-else-if="form.state === 'Negeri Sembilan'"
                    v-model="form.district"
                    class="block w-full p-2 rounded-md border border-gray-200 text-gray-500"
                >
                    <option value="Jelebu">Jelebu</option>
                    <option value="Jempol">Jempol</option>
                    <option value="Kuala Pilah">Kuala Pilah</option>
                    <option value="Port Dickson">Port Dickson</option>
                    <option value="Rembau">Rembau</option>
                    <option value="Seremban">Seremban</option>
                    <option value="Tampin">Tampin</option>
                </select>
                <select
                    v-else-if="form.state === 'Pahang'"
                    v-model="form.district"
                    class="block w-full p-2 rounded-md border border-gray-200 text-gray-500"
                >
                    <option value="Bentong">Bentong</option>
                    <option value="Bera">Bera</option>
                    <option value="Cameron Highlands">Cameron Highlands</option>
                    <option value="Jerantut">Jerantut</option>
                    <option value="Kuantan">Kuantan</option>
                    <option value="Lipis">Lipis</option>
                    <option value="Maran">Maran</option>
                    <option value="Pekan">Pekan</option>
                    <option value="Raub">Raub</option>
                    <option value="Rompin">Rompin</option>
                    <option value="Temerloh">Temerloh</option>
                </select>
                <select
                    v-else-if="form.state === 'Perak'"
                    v-model="form.district"
                    class="block w-full p-2 rounded-md border border-gray-200 text-gray-500"
                >
                    <option value="Bagan Datuk">Bagan Datuk</option>
                    <option value="Batang Padang">Batang Padang</option>
                    <option value="Hilir Perak">Hilir Perak</option>
                    <option value="Hulu Perak">Hulu Perak</option>
                    <option value="Kampar">Kampar</option>
                    <option value="Kerian">Kerian</option>
                    <option value="Kinta">Kinta</option>
                    <option value="Kuala Kangsar">Kuala Kangsar</option>
                    <option value="Larut, Matang & Selama">
                        Larut, Matang & Selama
                    </option>
                    <option value="Manjung">Manjung</option>
                    <option value="Muallim">Muallim</option>
                    <option value="Perak Tengah">Perak Tengah</option>
                </select>
                <select
                    v-else-if="form.state === 'Perlis'"
                    v-model="form.district"
                    class="block w-full p-2 rounded-md border border-gray-200 text-gray-500"
                >
                    <option value="Perlis">Perlis</option>
                </select>
                <select
                    v-else-if="form.state === 'Pulau Pinang'"
                    v-model="form.district"
                    class="block w-full p-2 rounded-md border border-gray-200 text-gray-500"
                >
                    <option value="Barat Daya Pulau Pinang">
                        Barat Daya Pulau Pinang
                    </option>
                    <option value="Seberang Perai Selatan">
                        Seberang Perai Selatan
                    </option>
                    <option value="Seberang Perai Tengah">
                        Seberang Perai Tengah
                    </option>
                    <option value="Seberang Perai Utara">
                        Seberang Perai Utara
                    </option>
                    <option value="Timur Laut Pulau Pinang">
                        Timur Laut Pulau Pinang
                    </option>
                </select>
                <select
                    v-else-if="form.state === 'Sabah'"
                    v-model="form.district"
                    class="block w-full p-2 rounded-md border border-gray-200 text-gray-500"
                >
                    <option value="Beaufort">Beaufort</option>
                    <option value="Beluran">Beluran</option>
                    <option value="Kalabakan">Kalabakan</option>
                    <option value="Keningau">Keningau</option>
                    <option value="Kinabatangan">Kinabatangan</option>
                    <option value="Kota Belut">Kota Belut</option>
                    <option value="Kota Kinabalu">Kota Kinabalu</option>
                    <option value="Kota Marudu">Kota Marudu</option>
                    <option value="Kuala Penyu">Kuala Penyu</option>
                    <option value="Kudat">Kudat</option>
                    <option value="Kunak">Kunak</option>
                    <option value="Lahad Datu">Lahad Datu</option>
                    <option value="Membakul">Membakul</option>
                    <option value="Nabawan">Nabawan</option>
                    <option value="Papar">Papar</option>
                    <option value="Penampang">Penampang</option>
                    <option value="Pitas">Pitas</option>
                    <option value="Putatan">Putatan</option>
                    <option value="Ranau">Ranau</option>
                    <option value="Sandakan">Sandakan</option>
                    <option value="Semporna">Semporna</option>
                    <option value="Sipitang">Sipitang</option>
                    <option value="Tambunan">Tambunan</option>
                    <option value="Tawau">Tawau</option>
                    <option value="Telupid">Telupid</option>
                    <option value="Tenom">Tenom</option>
                    <option value="Tongod">Tongod</option>
                    <option value="Tuaran">Tuaran</option>
                    <option value="Kunak">Kunak</option>
                </select>
                <select
                    v-else-if="form.state === 'Sarawak'"
                    v-model="form.district"
                    class="block w-full p-2 rounded-md border border-gray-200 text-gray-500"
                >
                    <option value="Asajaya">Asajaya</option>
                    <option value="Bau">Bau</option>
                    <option value="Belaga">Belaga</option>
                    <option value="Betong">Betong</option>
                    <option value="Bintulu">Bintulu</option>
                    <option value="Dalat">Dalat</option>
                    <option value="Daro">Daro</option>
                    <option value="Julau">Julau</option>
                    <option value="Kanowit">Kanowit</option>
                    <option value="Kapit">Kapit</option>
                    <option value="Kuching">Kuching</option>
                    <option value="Lawas">Lawas</option>
                    <option value="Limbang">Limbang</option>
                    <option value="Lubok Antu">Lubok Antu</option>
                    <option value="Lundu">Lundu</option>
                    <option value="Maradong">Maradong</option>
                    <option value="Marudi">Marudi</option>
                    <option value="Matu">Matu</option>
                    <option value="Miri">Miri</option>
                    <option value="Mukah">Mukah</option>
                    <option value="Padawan">Padawan</option>
                    <option value="Pakan">Pakan</option>
                    <option value="Samarahan">Samarahan</option>
                    <option value="Saratok">Saratok</option>
                    <option value="Sarikei">Sarikei</option>
                    <option value="Selagau">Selagau</option>
                    <option value="Serian">Serian</option>
                    <option value="Sibu">Sibu</option>
                    <option value="Simunjan">Simunjan</option>
                    <option value="Song">Song</option>
                    <option value="Sri Aman">Sri Aman</option>
                    <option value="Tatau">Tatau</option>
                </select>
                <select
                    v-else-if="form.state === 'Selangor'"
                    v-model="form.district"
                    class="block w-full p-2 rounded-md border border-gray-200 text-gray-500"
                >
                    <option value="Gombak">Gombak</option>
                    <option value="Hulu Langat">Hulu Langat</option>
                    <option value="Hulu Selangor">Hulu Selangor</option>
                    <option value="Klang">Klang</option>
                    <option value="Kuala Langat">Kuala Langat</option>
                    <option value="Kuala Selangor">Kuala Selangor</option>
                    <option value="Petaling">Petaling</option>
                    <option value="Sabak Bernam">Sabak Bernam</option>
                    <option value="Sepang">Sepang</option>
                </select>
                <select
                    v-else-if="form.state === 'Terengganu'"
                    v-model="form.district"
                    class="block w-full p-2 rounded-md border border-gray-200 text-gray-500"
                >
                    <option value="Besut">Besut</option>
                    <option value="Dungun">Dungun</option>
                    <option value="Hulu Terengganu">Hulu Terengganu</option>
                    <option value="Kemaman">Kemaman</option>
                    <option value="Kuala Nerus">Kuala Nerus</option>
                    <option value="Kuala Terengganu">Kuala Terengganu</option>
                    <option value="Marang">Marang</option>
                    <option value="Setiu">Setiu</option>
                </select>
                <select
                    v-else-if="form.state === 'Wilayah Persekutuan'"
                    v-model="form.district"
                    class="block w-full p-2 rounded-md border border-gray-200 text-gray-500"
                >
                    <option value="Kuala Lumpur">Kuala Lumpur</option>
                    <option value="Labuan">Labuan</option>
                    <option value="Putrajaya">Putrajaya</option>
                </select>
                <select
                    v-else
                    v-model="form.district"
                    class="block w-full p-2 rounded-md border border-gray-200 text-gray-500"
                >
                    <option disabled default>Please choose a state</option>
                </select>
                <div v-if="form.errors.district">
                    {{ form.errors.district }}
                </div>
            </div>

            <div class="col-span-1">
                <label class="block mb-1 text-gray-500"
                    >City / Locality / Area / Institution</label
                >
                <input
                    v-model="form.locality"
                    class="block w-full p-2 rounded-md border border-gray-200 text-gray-500"
                />
                <div v-if="form.errors.locality">
                    {{ form.errors.locality }}
                </div>
            </div>

            <div class="col-span-1">
                <label class="block mb-1 text-gray-500">Community Name</label>
                <input
                    v-model="form.community_name"
                    class="block w-full p-2 rounded-md border border-gray-200 text-gray-500"
                />
                <div v-if="form.errors.community_name">
                    {{ form.errors.community_name }}
                </div>
            </div>

            <div class="mt-4">
                <button
                    type="submit"
                    class="px-4 py-2 bg-indigo-500 text-white rounded-md text-sm font-semibold"
                >
                    Create Community
                </button>
            </div>
        </div>
    </form>
</template>

<script setup>
import { useForm } from "@inertiajs/inertia-vue3";
import Navbar from "@/Layouts/Topbar/Navbar.vue";
import PageTitle from "@/Layouts/Topbar/PageTitle.vue";
import Title from "@/Layouts/Topbar/Title.vue";
import Breadcrumb from "@/Layouts/Topbar/Breadcrumb.vue";
import RightSide from "@/Layouts/Topbar/RightSide.vue";

const form = useForm({
    community_name: null,
    locality: null,
    district: null,
    state: null,
});

const create = () => form.post(route("community.store"));
</script>
