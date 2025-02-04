<script setup>
import { ref } from 'vue'
import { Head, Link } from '@inertiajs/inertia-vue3'
import AppLayout from '@/Layouts/AppLayout.vue'
import Modal from '@/Components/Modal.vue'
import { useStaticDataStore } from '@/stores/staticData'

const props = defineProps({
    data: Object,
    meta: Object,
})

const staticData = useStaticDataStore()

let showFinancialDetails = ref(false)
let showModal = ref(false)

</script>

<template>
    <AppLayout>

        <Head title="Policies" />

        <div>
            <!-- Widgets -->
            <section class="px-8 pb-8">
                <div class="flex justify-between py-4">
                    <div>
                        <h1 class="text-5xl font-bold text-gray-900">Policies</h1>
                    </div>
                    <div>
                        <button @click="showModal = true" type="button" class="inline-flex items-center justify-center rounded-md border border-transparent bg-primary-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2 sm:w-auto">Create a New Policy</button>
                    </div>
                </div>
                <div class="grid grid-cols-4 gap-8">
                    <div class="widget col-span-2">A</div>
                    <div class="widget">B</div>
                    <div class="widget">C</div>
                </div>
            </section>

            <!-- Data Table -->
            <section class="px-4 sm:px-6 lg:px-8 mt-8 flex flex-col">
                <div class="my-3">
                    <button @click="showFinancialDetails = !showFinancialDetails" class="bg-gray-100 text-gray-600 hover:bg-gray-200 px-2 py-1 rounded border border-gray-400">Toggle View</button>
                </div>
                <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                        <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-300">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col">Category</th>
                                        <th scope="col">Policy No.</th>
                                        <th scope="col">Coverage</th>
                                        <th scope="col">Starts</th>
                                        <th scope="col">Ends</th>
                                        <th scope="col">Layer</th>
                                        <th v-show="showFinancialDetails" scope="col">Currency</th>
                                        <th v-show="showFinancialDetails" scope="col" class="text-right">Gross Prem.</th>
                                        <th v-show="showFinancialDetails" scope="col" class="text-right">Brokerage</th>
                                        <th v-show="showFinancialDetails" scope="col" class="text-right">Excess</th>
                                        <th v-show="showFinancialDetails" scope="col" class="text-right">Limit</th>
                                        <th v-show="!showFinancialDetails" scope="col" class="text-left">Agent</th>
                                        <th v-show="!showFinancialDetails" scope="col" class="text-left">Insurer</th>
                                        <th v-show="!showFinancialDetails" scope="col" class="text-left">Policyholder</th>
                                        <th scope="col">
                                            <span class="sr-only">View</span>
                                        </th>
                                        <th scope="col">
                                            <span class="sr-only">Edit</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 bg-white">
                                    <tr v-for="policy in data.policies" :key="policy.id" class="hover:bg-gray-100">
                                        <td class="text text-left">
                                            <i :class="`fa-light fa-${policy.category.icon} mr-2`"></i>
                                            {{ policy.category.title }}
                                        </td>
                                        <td class="numeric text-center">{{ policy.policy_no }}</td>
                                        <td class="text text-center">{{ policy.coverage_type }}</td>
                                        <td class="numeric text-center">{{ policy.start_date }}</td>
                                        <td class="numeric text-center">{{ policy.end_date }}</td>
                                        <td class="text text-center">{{ policy.layer }}</td>
                                        <td v-show="showFinancialDetails" class="numeric text-center">{{ policy.currency }}</td>
                                        <td v-show="showFinancialDetails" class="numeric text-right">{{ policy.gross_premium }}</td>
                                        <td v-show="showFinancialDetails" class="numeric text-right">{{ policy.brokerage_deduction }}</td>
                                        <td v-show="showFinancialDetails" class="numeric text-right">{{ policy.excess }}</td>
                                        <td v-show="showFinancialDetails" class="numeric text-right">{{ policy.limit_amount }}</td>
                                        <td v-show="!showFinancialDetails" class="text text-left">{{ policy.agent.name }}</td>
                                        <td v-show="!showFinancialDetails" class="text text-left">{{ policy.insurer.name }}</td>
                                        <td v-show="!showFinancialDetails" class="text text-left">{{ policy.policyholder.name }}</td>

                                        <td>
                                            <Link :href="route('policies.show', policy.id)">
                                                View
                                                <span class="sr-only">{{ policy.id }}</span>
                                            </Link>
                                        </td>

                                        <td class="">
                                            <a href="#" class="text-primary-600 hover:text-primary-900"
                                                >Edit<span class="sr-only">, {{ policy.id }}</span></a
                                            >
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <Modal :show="showModal" maxWidth="xl" @close="showModal = false">
            <div class="text-center mb-8">
                <h3 class="text-2xl font-bold text-gray-800">Create a New Insurance Policy</h3>
                <p class="text-gray-700">What type of insurance does your client wish to purchase?</p>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-3">
                <Link
                    v-for="category in staticData.collections.categories"
                    :key="category.id"
                    :href="route('policies.create', { categoryId: category.id })"
                    class="bg-gray-100 text-gray-600 hover:bg-gray-200 rounded-lg shadow-lg h-40 p-8 m-2 text-lg font-bold flex flex-col gap-8 justify-center items-center"
                >
                    <i :class="`fa-light fa-${category.icon} fa-2xl`"></i>
                    <span class="text-center leading-none">
                        {{ category.title }}<br><small class="text-xs">insurance</small>
                    </span>
                </Link>
            </div>
        </Modal>
    </AppLayout>
</template>

<style scoped>

.widget {
    @apply bg-white h-64 shadow p-6 rounded-xl;
}

th {
    @apply whitespace-nowrap px-2 py-3.5 text-sm font-semibold text-gray-900;
}

td {
    @apply whitespace-nowrap px-2 py-2 text-gray-700 text-sm;
}

td.text {
    @apply font-sans;
}

td.numeric {
    @apply font-mono;
}

</style>