<script setup>
import { ref } from 'vue'
import AppLayout from '@/Layouts/AppLayout.vue'
import InputLabel from '@/Components/InputLabel.vue'
import InputError from '@/Components/InputError.vue'
import TextInput from '@/Components/TextInput.vue'
import PrimaryButton from '@/Components/PrimaryButton.vue'
import DropdownA from '@/Components/DropdownA.vue'
import { Head, useForm } from '@inertiajs/inertia-vue3'

const props = defineProps({
    data: Object,
    meta: Object,
})

const countries = props.data.countries.map(function(obj) {
    return {
        label: obj.nicename,
        value: obj.id
    }
})

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

                        <div>
                            <InputLabel for="firstName" value="First Name" />
                            <TextInput
                                id="firstName"
                                type="text"
                                v-model="form.firstName"
                                class="mt-1 block w-full"
                                required
                                autofocus
                            />
                            <InputError class="mt-2" :message="form.errors.firstName" />
                        </div>

                        <div>
                            <InputLabel for="lastName" value="Last Name" />
                            <TextInput
                                id="lastName"
                                type="text"
                                v-model="form.lastName"
                                class="mt-1 block w-full"
                                required
                            />
                            <InputError class="mt-2" :message="form.errors.lastName" />
                        </div>

                        <div>
                            <fieldset>
                                <legend class="block text-sm font-medium text-gray-700">Gender</legend>
                                <div class="mt-4 grid grid-cols-1 gap-y-4">
                                    <div v-for="gender in data.genderChoices" class="flex items-center">
                                        <input :id="`gender-${gender.value}`" :name="gender" :value="gender.value" type="radio" v-model="form.gender" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-500" />
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
                                :items="countries"
                                v-model="form.nationality"
                                class="mt-1 block"
                                required
                            />
                            <InputError class="mt-2" :message="form.errors.nationality" />
                        </div>

                        <div class="col-span-2">
                            <InputLabel for="passportNo" value="Passport Number" />
                            <TextInput
                                id="passportNo"
                                type="text"
                                v-model="form.passportNo"
                                class="mt-1 block"
                                required
                            />
                            <InputError class="mt-2" :message="form.errors.passportNo" />
                        </div>

                        <div>
                            <InputLabel for="dob" value="Date of Birth" />
                            <TextInput
                                id="dob"
                                type="date"
                                v-model="form.dob"
                                class="mt-1 block"
                                required
                            />
                            <InputError class="mt-2" :message="form.errors.dob" />
                        </div>

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

                    <div>
                        <InputLabel for="email" value="Email" />
                        <TextInput
                            id="email"
                            type="email"
                            v-model="form.email"
                            class="mt-1 block"
                            required
                        />
                        <InputError class="mt-2" :message="form.errors.email" />
                    </div>

                    <div class="mt-8">
                        <InputLabel for="phone" value="Phone" />
                        <TextInput
                            id="phone"
                            type="text"
                            v-model="form.phone"
                            class="mt-1 block"
                            required
                        />
                        <InputError class="mt-2" :message="form.errors.phone" />
                    </div>

                    <div class="mt-8">
                        <InputLabel for="domicile" value="Domicile Country" />
                            <DropdownA
                                id="domicile"
                                :items="countries"
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

        <div class="overflow-hidden bg-white py-16 px-6 lg:px-8 lg:py-24">
            <div class="relative mx-auto max-w-xl">
                <div class="text-center">
                    <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Contact sales</h2>
                    <p class="mt-4 text-lg leading-6 text-gray-500">Nullam risus blandit ac aliquam justo ipsum. Quam mauris volutpat massa dictumst amet. Sapien tortor lacus arcu.</p>
                </div>
                <div class="mt-12">
                    <form class="grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:gap-x-8">
                        <div>
                            <label for="first-name" class="block text-sm font-medium text-gray-700">First name</label>
                            <div class="mt-1">
                                <input
                                    type="text" name="first_name" id="first_name"
                                    class="block w-full rounded-md border-gray-300 py-3 px-4 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                    v-model="form.first_name"
                                />
                            </div>
                        </div>
                        <div>
                            <label for="last-name" class="block text-sm font-medium text-gray-700">Last name</label>
                            <div class="mt-1">
                                <input
                                    type="text" name="last-name" id="last-name" 
                                    class="block w-full rounded-md border-gray-300 py-3 px-4 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" />
                            </div>
                        </div>
                        <div class="sm:col-span-2">
                            <label for="company" class="block text-sm font-medium text-gray-700">Company</label>
                            <div class="mt-1">
                                <input type="text" name="company" id="company" class="block w-full rounded-md border-gray-300 py-3 px-4 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" />
                            </div>
                        </div>
                        <div class="sm:col-span-2">
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <div class="mt-1">
                                <input id="email" name="email" type="email" class="block w-full rounded-md border-gray-300 py-3 px-4 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" />
                            </div>
                        </div>
                        <div class="sm:col-span-2">
                            <label for="phone-number" class="block text-sm font-medium text-gray-700">Phone Number</label>
                            <div class="relative mt-1 rounded-md shadow-sm">
                                <div class="absolute inset-y-0 left-0 flex items-center">
                                    <label for="country" class="sr-only">Country</label>
                                    <select id="country" name="country" class="h-full rounded-md border-transparent bg-transparent py-0 pl-4 pr-8 text-gray-500 focus:border-indigo-500 focus:ring-indigo-500">
                                        <option>US</option>
                                        <option>CA</option>
                                        <option>EU</option>
                                    </select>
                                </div>
                                <input type="text" name="phone-number" id="phone-number" class="block w-full rounded-md border-gray-300 py-3 px-4 pl-20 focus:border-indigo-500 focus:ring-indigo-500" placeholder="+1 (555) 987-6543" />
                            </div>
                        </div>
                        <div class="sm:col-span-2">
                            <button type="submit" class="inline-flex w-full items-center justify-center rounded-md border border-transparent bg-indigo-600 px-6 py-3 text-base font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </AppLayout>
</template>