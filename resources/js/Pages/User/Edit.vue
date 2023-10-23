<script setup>
import { Inertia } from '@inertiajs/inertia'
import { Head, useForm } from '@inertiajs/inertia-vue3'
import AppLayout from '@/Layouts/AppLayout.vue'
import TextInput from '@/Components/TextInput2.vue'
import { useStaticDataStore } from '@/stores/staticData'

const props = defineProps({
    user: Object,
})

const staticData = useStaticDataStore()

const form = useForm({
    name: props.user.name,
    roles: props.user.roles.map(role => role.id),
    email: props.user.email,
    password: null,
})

const update = () => {
    form.patch(route('users.update', props.user.id), {
        onFinish: () => console.log('Form submitted.'),
    })
}

const destroy = () => {
    if (confirm('Are you sure you want to delete this user?')) {
        Inertia.delete(route('users.destroy', props.user.id))
    }
}

const restore = () => {
    if (confirm('Are you sure you want to restore this user?')) {
        Inertia.put(route('users.restore', props.user.id))
    }
}


</script>

<template>
    <Head :title="`Edit User - ${user.name}`" />
    <AppLayout>
        <div class="bg-white shadow-md max-w-3xl my-12 mx-12">
            <form @submit.prevent="update">
                <div class="grid grid-cols-2 gap-8 p-4">

                    <TextInput v-model="form.name" :error="form.errors.name" label="Name"  type="text" required />
                    <TextInput v-model="form.email" :error="form.errors.email" label="Email" type="email" required />
                    <TextInput v-model="form.password" :error="form.errors.password" label="Password" type="password" autocomplete="new-password" />

                    <div class="col-span-2">
                        <div v-for="role in staticData.dropdowns.roles" :key="role.value">
                            <input type="checkbox" :value="role.value" v-model="form.roles">
                            <label class="ml-2">{{ role.label }}</label>
                        </div>
                        <p class="text-danger-600">{{ form.errors.roles }}</p>
                    </div>
                </div>
                <div class="flex justify-between">                    
                    <button v-if="user.deleted_at" type="button" @click="restore" class="bg-warning-500 p-4">Restore</button>
                    <button v-if="!user.deleted_at" type="button" @click="destroy" class="bg-danger-500 p-4">Delete</button>
                    <button type="submit" class="bg-gray-100 p-4">Update User</button>
                </div>
            </form>
        </div>
    </AppLayout>
</template>
