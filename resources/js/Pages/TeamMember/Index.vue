<script setup>
import { ref } from 'vue'
import { Head, useForm } from '@inertiajs/inertia-vue3'
import moment from 'moment'
import AppLayout from '@/Layouts/AppLayout.vue'
import DropdownA from '@/Components/DropdownA.vue'
import InputLabel from '@/Components/InputLabel.vue'
import InputError from '@/Components/InputError.vue'
import TextInput from '@/Components/TextInput.vue'
import Modal from '@/Components/Modal.vue'
import { useStaticDataStore } from '@/stores/staticData'

const props = defineProps({
    data: Object,
    meta: Object,
})

let showModal = ref(false);

const staticData = useStaticDataStore()

const form = useForm({
    email: '',
    role: '',
})


</script>

<template>
    <Head title="Team" />
    <AppLayout>
        <div class="bg-white flex justify-between items-center py-4 px-8">
            <div>
                <h1 class="text-3xl font-semibold text-gray-900">{{ data.team.name }}</h1>
            </div>
            <div>
                <button @click="showModal = true" type="button" class="bg-gray-100 text-gray-600 hover:bg-gray-200 border border-gray-400 px-4 py-2">
                    Invite
                    <i class="fa-solid fa-user-plus ml-2"></i>
                </button>
            </div>
        </div>
        <div>
            <table class="min-w-full divide-y divide-gray-300">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Last Login</th>
                        <th scope="col">Status</th>
                        <th scope="col">Roles</th>
                        <th scope="col">
                            <span class="sr-only">Edit</span>
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 bg-white">
                    <tr v-for="member in data.team.members" :key="member.email">
                        <td>
                            <div class="flex items-center">
                                <div class="h-10 w-10 flex-shrink-0">
                                    <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1531427186611-ecfd6d936c79?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="" />
                                </div>
                                <div class="ml-4">
                                    <div class="font-medium text-gray-900">{{ member.name }}</div>
                                    <div class="text-gray-500 font-mono text-xs">{{ member.email }}</div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="text-gray-900">{{ member.last_login_at ? moment(member.last_login_at).fromNow() : 'N/A' }}</div>
                        </td>
                        <td>
                            <span class="inline-flex rounded-full bg-green-100 px-2 text-xs font-semibold leading-5 text-green-800">Active</span>
                        </td>
                        <td>
                            <div class="flex gap-2">
                                <span v-for="role in member.roles" :key="role.id" class="bg-gray-100 px-2 py-1 text-gray-600">{{ role.title }}</span>
                            </div>
                        </td>
                        <td>
                            <a href="">Edit</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <Modal :show="showModal" maxWidth="xl" @close="showModal = false">
            <template #default>
                <div class="flex flex-col justify-center items-center">
                    <i class="fa-duotone fa-user-plus fa-2xl mb-2 bg-gray-100 w-20 h-20 rounded-full pl-2 flex items-center justify-center"></i>
                    <h3 class="text-2xl font-bold">Add a New Member</h3>
                    <p class="mb-12">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                </div>

                <form class="flex flex-col gap-8">
                    <div>
                        <InputLabel for="email" value="Email" />
                        <TextInput
                            id="email"
                            type="email"
                            v-model="form.email"
                            class="mt-1 w-full"
                            required
                        />
                        <InputError class="mt-2" :message="form.errors.email" />
                    </div>
                    <div>
                        <InputLabel for="role" value="Role" />
                        <DropdownA
                            id="role"
                            :items="staticData.dropdowns.roles"
                            v-model="form.role"
                            class="mt-1 w-full"
                            required
                        />
                        <InputError class="mt-2" :message="form.errors.role" />
                    </div>
                    <button class="bg-blue-500 text-white px-4 py-2 w-full">Add</button>
                </form>
            </template>
        </Modal>
    </AppLayout>
</template>

<style>

th {
    @apply px-3 py-3.5 text-left text-sm font-semibold text-gray-900;
}

td {
    @apply whitespace-nowrap px-3 py-4 text-sm text-gray-500;
}

</style>