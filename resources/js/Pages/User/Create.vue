<script setup>
import { Head, useForm } from '@inertiajs/inertia-vue3'
import AppLayout from '@/Layouts/AppLayout.vue'
import TextInput from '@/Components/TextInput2.vue'
import { useStaticDataStore } from '@/stores/staticData'

const props = defineProps({
    user: Object,
})

const staticData = useStaticDataStore()

const form = useForm({
    name: '',
    roles: [],
    email: '',
    password: '',
})

const store = () => {
    form.post(route('users.store'), {
        onFinish: () => console.log('Form submitted'),
    })
}


</script>

<template>
    <Head title="Create a New User" />
    <AppLayout>
        <div class="bg-white shadow-md max-w-3xl my-12 mx-12">
            <form @submit.prevent="store">
                <div class="grid grid-cols-2 gap-8 p-4">

                    <TextInput v-model="form.name" :error="form.errors.name" label="Name"  type="text" required />
                    <TextInput v-model="form.email" :error="form.errors.email" label="Email" type="email" required />
                    <TextInput v-model="form.password" :error="form.errors.password" label="Password" type="password" autocomplete="new-password" required />

                    <div class="col-span-2">
                        <div v-for="role in staticData.dropdowns.roles" :key="role.value">
                            <input type="checkbox" :value="role.value" v-model="form.roles">
                            <label class="ml-2">{{ role.label }}</label>
                        </div>
                    </div>
                </div>
                <div class="flex justify-between">
                    <button type="button" class="bg-gray-100 p-4">Cancel</button>
                    <button type="submit" class="bg-gray-100 p-4">Create</button>
                </div>
            </form>
        </div>
    </AppLayout>
</template>
