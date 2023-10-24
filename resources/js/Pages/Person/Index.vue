<script setup>
import { ref, watchEffect } from 'vue'
import { Inertia } from '@inertiajs/inertia'
import { Head, Link } from '@inertiajs/inertia-vue3'
import pickBy from 'lodash/pickBy'
import throttle from 'lodash/throttle'
import AppLayout from '@/Layouts/AppLayout.vue'
import Modal from '@/Components/Modal.vue'
import Pagination from '@/Components/Pagination.vue'

const props = defineProps({
    filters: Object,
    persons: Object,
})

const form = ref({
    search: props.filters.search,
    trashed: props.filters.trashed,
})

watchEffect(() => {
    throttle(() => {
        Inertia.get(route('persons.index'), pickBy(form.value), { preserveState: true })
    }, 150)()
})

let showModal = ref(false)

</script>

<template>
    <AppLayout>

        <Head title="People" />

        <div class="px-4 sm:px-6 lg:px-8">
            <div>
                <h1 class="text-4xl font-bold">Persons</h1>
            </div>
            <div class="flex justify-between items-center py-4">
                <div>
                    <input autocomplete="off" type="text" v-model="form.search" placeholder="Search…" />
                    <select v-model="form.trashed">
                        <option :value="null" />
                        <option value="with">With Trashed</option>
                        <option value="only">Only Trashed</option>
                    </select>
                </div>
                <div>
                    <button @click="showModal = true" class="btn btn-primary">Add a Person</button>
                </div>
            </div>
            <div class="flex flex-col">
                <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle">
                        <div class="overflow-hidden shadow-sm ring-1 ring-black ring-opacity-5">
                            <table class="min-w-full divide-y divide-gray-300">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6 lg:pl-8">Name</th>
                                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Phone</th>
                                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Email</th>
                                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Type</th>
                                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Role</th>
                                        <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6 lg:pr-8">
                                            <span class="sr-only">Edit</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 bg-white">
                                    <tr v-for="person in persons.data" :key="person.id">
                                        <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 lg:pl-8">{{ person.name }}</td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ person.phone }}</td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                            <a :href="'mailto:' + person.email">{{ person.email }}</a>
                                        </td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ person.type }}</td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ person.role }}</td>
                                        <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6 lg:pr-8">
                                            <a href="#" class="text-primary-600 hover:text-primary-900"
                                                >Edit<span class="sr-only">, {{ person.name }}</span></a
                                            >
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <Pagination :links="persons.links" class="mt-8" />
        </div>
        <Modal :show="showModal" maxWidth="xl" @close="showModal = false">
            <div class="mb-8">
                <h3 class="text-2xl font-bold text-gray-800 mb-2">Register a New Person</h3>
                <p class="text-gray-700 text-sm">This is where you register policyholders, damaged parties, or any other stakeholders involved in the insurance process</p>
            </div>
            <div class="grid grid-cols-2 gap-6">
                <Link :href="route('naturalPersons.create')" class="bg-gray-100 hover:bg-gray-200 text-gray-600 p-8 flex flex-col justify-center items-center h-40 gap-8 rounded-lg">
                    <i class="fa-sharp fa-regular fa-person fa-2xl"></i>
                    Natural Person
                </Link>
                <Link :href="route('juridicalPersons.create')" class="bg-gray-100 hover:bg-gray-200 text-gray-600 p-8 flex flex-col justify-center items-center h-40 gap-8 rounded-lg">
                    <i class="fa-sharp fa-regular fa-building fa-2xl"></i>
                    Juridical Person
                </Link>
            </div>
        </Modal>
    </AppLayout>
</template>
