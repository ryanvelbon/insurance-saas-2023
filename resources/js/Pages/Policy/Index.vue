<script setup>
import { ref } from 'vue'
import { Head, Link } from '@inertiajs/inertia-vue3'
import AppLayout from '@/Layouts/AppLayout.vue'
import Modal from '@/Components/Modal.vue'

const props = defineProps({
    data: Object,
    meta: Object,
})

let showModal = ref(false)

</script>

<template>
    <AppLayout>

        <Head title="Policies" />

        <div class="px-4 sm:px-6 lg:px-8">
            <div class="sm:flex sm:items-center">
                <div class="sm:flex-auto">
                    <h1 class="text-xl font-semibold text-gray-900">Policies</h1>
                    <p class="mt-2 text-sm text-gray-700">A table of all policies managed by you and your team.</p>
                </div>
                <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                    <button @click="showModal = true" type="button" class="inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">Create a New Policy</button>
                </div>
            </div>
            <div class="mt-8 flex flex-col">
                <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                        <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-300">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Category</th>
                                        <th scope="col" class="whitespace-nowrap py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Policy No.</th>
                                        <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Coverage</th>
                                        <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Starts</th>
                                        <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Ends</th>
                                        <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Layer</th>
                                        <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Currency</th>
                                        <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Gross Prem.</th>
                                        <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Brokerage</th>
                                        <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Excess</th>
                                        <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Limit</th>
                                        <th scope="col" class="relative whitespace-nowrap py-3.5 pl-3 pr-4 sm:pr-6">
                                            <span class="sr-only">Edit</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 bg-white">
                                    <tr v-for="policy in data.policies" :key="policy.id">
                                        <td class="whitespace-nowrap px-2 py-2 text-xs text-gray-500">{{ policy.category }}</td>
                                        <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-6">{{ policy.policy_no }}</td>
                                        <td class="whitespace-nowrap px-2 py-2 text-xs text-gray-500">{{ policy.coverage_type }}</td>
                                        <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">{{ policy.start_date }}</td>
                                        <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">{{ policy.end_date }}</td>
                                        <td class="whitespace-nowrap px-2 py-2 text-xs text-gray-500">{{ policy.layer }}</td>
                                        <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">{{ policy.currency }}</td>
                                        <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">{{ policy.gross_premium }}</td>
                                        <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">{{ policy.brokerage_deduction }}</td>
                                        <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">{{ policy.excess }}</td>
                                        <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">{{ policy.limit_amount }}</td>

                                        <td class="relative whitespace-nowrap py-2 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                            <a href="#" class="text-indigo-600 hover:text-indigo-900"
                                                >Edit<span class="sr-only">, {{ policy.id }}</span></a
                                            >
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <Modal :show="showModal" maxWidth="xl" @close="showModal = false">
            <div class="text-center mb-8">
                <h3 class="text-2xl font-bold text-gray-800">Create a New Insurance Policy</h3>
                <p class="text-gray-700">What type of insurance does your client wish to purchase?</p>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-3">
                <Link
                    v-for="category in data.categories"
                    :key="category.slug"
                    :href="route('policies.create', category.slug)"
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
