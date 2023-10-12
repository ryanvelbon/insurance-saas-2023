<script setup>
import { ref } from 'vue'
import AppLayout from '@/Layouts/AppLayout.vue'
import Modal from '@/Components/Modal.vue'

const props = defineProps({
    data: Object,
    meta: Object,
})

let showModal = ref(false);

// adds an example record
props.data.users.push({
    name: 'Lindsay Walton',
    title: 'Front-end Developer',
    department: 'Optimization',
    email: 'lindsay.walton@example.com',
    role: 'Member',
    image:
        'https://images.unsplash.com/photo-1517841905240-472988babdf9?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80',
})

</script>

<template>
    <AppLayout>
        <div class="px-4 sm:px-6 lg:px-8">
            <div class="sm:flex sm:items-center">
                <div class="sm:flex-auto">
                    <h1 class="text-xl font-semibold text-gray-900">{{ data.team.name }}</h1>
                    <p class="mt-2 text-sm text-gray-700">A list of all the users in your team.</p>
                </div>
                <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                    <button @click="showModal = true" type="button" class="inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">
                        Invite
                        <i class="fa-solid fa-user-plus ml-2"></i>
                    </button>
                </div>
            </div>
            <div class="mt-8 flex flex-col">
                <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                        <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-300">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Name</th>
                                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Title</th>
                                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Status</th>
                                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Role</th>
                                        <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                                            <span class="sr-only">Edit</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 bg-white">
                                    <tr v-for="member in data.users" :key="member.email">
                                        <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm sm:pl-6">
                                            <div class="flex items-center">
                                                <div class="h-10 w-10 flex-shrink-0">
                                                    <img class="h-10 w-10 rounded-full" :src="member.image" alt="" />
                                                </div>
                                                <div class="ml-4">
                                                    <div class="font-medium text-gray-900">{{ member.name }}</div>
                                                    <div class="text-gray-500">{{ member.email }}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                            <div class="text-gray-900">{{ member.title }}</div>
                                            <div class="text-gray-500">{{ member.department }}</div>
                                        </td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                            <span class="inline-flex rounded-full bg-green-100 px-2 text-xs font-semibold leading-5 text-green-800">Active</span>
                                        </td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ member.role }}</td>
                                        <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                            <a href="#" class="text-indigo-600 hover:text-indigo-900"
                                                >Edit<span class="sr-only">, {{ member.name }}</span></a
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
            <template #default>
                <p>Need to add a new member to your team?</p>

                <form class="mt-6">
                    <div class="flex gap-2">
                        <input type="email" placeholder="Email Address..." class="flex-1">
                        <button>Add</button>
                    </div>
                </form>
            </template>
        </Modal>
    </AppLayout>
</template>