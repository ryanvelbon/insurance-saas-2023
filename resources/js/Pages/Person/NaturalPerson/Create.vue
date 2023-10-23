<script setup>
import { ref } from 'vue'
import { Head, useForm } from '@inertiajs/inertia-vue3'
import AppLayout from '@/Layouts/AppLayout.vue'
import InputLabel from '@/Components/InputLabel.vue'
import InputError from '@/Components/InputError.vue'
import TextInput from '@/Components/TextInput2.vue'
import PrimaryButton from '@/Components/PrimaryButton.vue'
import DropdownA from '@/Components/DropdownA.vue'
import { useStaticDataStore } from '@/stores/staticData'

const props = defineProps({
    data: Object,
    meta: Object,
})

const staticData = useStaticDataStore()

const form = useForm({
    email: '',
    phone: '',
    domicile: '',

    firstName: '',
    lastName: '',
    gender: '',
    dob: '',
    nationality: '',
    passportNo: '',
    maritalStatus: '',
})

const submit = () => {
    form.post(route('naturalPersons.store'), {
        onFinish: () => console.log("data submitted"),
    })
}


</script>

<template>
    <AppLayout>
        <Head title="Add a person" />

        <form @submit.prevent="submit" autocomplete="off">
            <div class="grid grid-cols-1 lg:grid-cols-2">
                <section class="bg-yellow-200 p-8">
                    <div class="grid grid-cols-2 gap-y-6">

                        <TextInput v-model="form.firstName" :error="form.errors.firstName" label="First Name"  type="text" required autofocus />

                        <TextInput v-model="form.lastName" :error="form.errors.lastName" label="Last Name"  type="text" required />

                        <div>
                            <fieldset>
                                <legend class="block text-sm font-medium text-gray-700">Gender</legend>
                                <div class="mt-4 grid grid-cols-1 gap-y-4">
                                    <div v-for="gender in data.genderChoices" class="flex items-center">
                                        <input :id="`gender-${gender.value}`" :name="gender" :value="gender.value" type="radio" v-model="form.gender" class="h-4 w-4 border-gray-300 text-primary-600 focus:ring-primary-500" />
                                        <label :for="`gender-${gender.value}`" class="ml-3">
                                            <span class="block text-sm text-gray-700">{{ gender.label }}</span>
                                        </label>
                                    </div>
                                </div>
                        </fieldset>
                        </div>

                        <div class="col-span-2">
                            <InputLabel for="nationality" value="Nationality" />
                            <DropdownA
                                id="nationality"
                                :items="staticData.dropdowns.countries"
                                v-model="form.nationality"
                                class="mt-1 block"
                                required
                            />
                            <InputError class="mt-2" :message="form.errors.nationality" />
                        </div>

                        <TextInput v-model="form.passportNo" :error="form.errors.passportNo" label="Passport Number"  type="text" required />

                        <TextInput v-model="form.dob" :error="form.errors.dob" label="Date of Birth"  type="date" required />

                        <div>
                            <InputLabel for="maritalStatus" value="Marital Status" />
                            <DropdownA
                                id="maritalStatus"
                                :items="data.maritalStatusChoices"
                                v-model="form.maritalStatus"
                                class="mt-1 block"
                                required
                            />
                            <InputError class="mt-2" :message="form.errors.maritalStatus" />
                        </div>

                    </div>
                </section>
                <section class="bg-blue-200 p-8">

                    <TextInput v-model="form.email" :error="form.errors.email" label="Email"  type="email" required />

                    <TextInput v-model="form.phone" :error="form.errors.phone" label="Phone"  type="text" required />

                    <div class="mt-8">
                        <InputLabel for="domicile" value="Domicile Country" />
                            <DropdownA
                                id="domicile"
                                :items="staticData.dropdowns.countries"
                                v-model="form.domicile"
                                class="mt-1 block"
                                required
                            />
                            <InputError class="mt-2" :message="form.errors.domicile" />
                    </div>

                </section>
            </div>
            <div class="bg-pink-200">
                <PrimaryButton type="submit" class="" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Save
                </PrimaryButton>
            </div>
        </form>
    </AppLayout>
</template>