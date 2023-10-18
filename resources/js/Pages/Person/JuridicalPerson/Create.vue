<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'
import InputLabel from '@/Components/InputLabel.vue'
import InputError from '@/Components/InputError.vue'
import TextInput from '@/Components/TextInput2.vue'
import TextArea from '@/Components/TextArea.vue'
import PrimaryButton from '@/Components/PrimaryButton.vue'
import DropdownA from '@/Components/DropdownA.vue'
import { useForm } from '@inertiajs/inertia-vue3'

const props = defineProps({
    data: Object,
    meta: Object,
})

const form = useForm({

    email: '',
    phone: '',

    name: '',
    description: '',
    type: '',
    size: '',
    founded: '',
    status: '',
    website: '',

})

const submit = () => {
    form.post(route('juridicalPersons.store'), {
        onFinish: () => console.log("data submitted"),
    })
}

console.log(props.data)

</script>

<template>
    <AppLayout>
        <h1>Create a Juridical Person</h1>

        <form @submit.prevent="submit" autocomplete="off">
            <div class="grid grid-cols-1 lg:grid-cols-2">
                <section class="bg-red-200 p-8">

                    <TextInput v-model="form.name" :error="form.errors.name" label="Name" type="text" required autofocus />

                    <div class="mt-8">
                        <InputLabel for="type" value="Type" />

                        <DropdownA
                            id="type"
                            :items="data.typeChoices"
                            v-model="form.type"
                            class="mt-1 block"
                        />

                        <InputError class="mt-2" :message="form.errors.type" />
                    </div>

                    <div class="mt-8">
                        <InputLabel for="status" value="Status" />

                        <DropdownA
                            id="status"
                            :items="data.statusChoices"
                            v-model="form.status"
                            class="mt-1 block"
                        />

                        <InputError class="mt-2" :message="form.errors.status" />
                    </div>

                    <TextInput v-model="form.founded" :error="form.errors.founded" label="Year Founded" type="number" min="1900" :max="new Date().getFullYear()" />

                </section>
                <section class="bg-blue-200 p-8">
                    <TextInput v-model="form.email" :error="form.errors.email" label="Email" type="email" />
                    <TextInput v-model="form.phone" :error="form.errors.phone" label="Phone" type="text" />
                    <TextInput v-model="form.website" :error="form.errors.website" label="Website" type="text" />
                </section>
            </div>
            <section class="bg-green-200 p-8">
                <div>
                    <InputLabel for="description" value="Description" />

                    <TextArea
                        id="description"
                        v-model="form.description"
                        class="mt-1 block w-full"
                    />

                    <InputError class="mt-2" :message="form.errors.description" />
                </div>
            </section>
            <section class="bg-gray-200 p-8">
                <fieldset class="sm:col-span-2">
                    <legend class="block text-sm font-medium text-gray-700">Number of employees</legend>
                    <div class="mt-4 grid grid-cols-1 gap-y-4">
                        <div v-for="size in data.sizeChoices" class="flex items-center">
                            <input :id="`size-${size.value}`" :name="size" :value="size.value" type="radio" v-model="form.size" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-500" />
                            <label :for="`size-${size.value}`" class="ml-3">
                                <span class="block text-sm text-gray-700">{{ size.label }}</span>
                            </label>
                        </div>
                    </div>
                </fieldset>
            </section>
            <div>
                <PrimaryButton type="submit" class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Save
                </PrimaryButton>
            </div>
        </form>
    </AppLayout>
</template>