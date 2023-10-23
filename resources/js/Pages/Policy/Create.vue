<script setup>
import { ref } from 'vue'
import { Head, useForm } from '@inertiajs/inertia-vue3'
import Breadcrumbs from '@/Components/Breadcrumbs.vue'
import DropdownA from '@/Components/DropdownA.vue'
import InputLabel from '@/Components/InputLabel.vue'
import InputError from '@/Components/InputError.vue'
import TextInput from '@/Components/TextInput.vue'
import MotorFields from './Partials/CategoryFields/Motor.vue'
import TravelFields from './Partials/CategoryFields/Travel.vue'

const props = defineProps({
    data: Object,
    meta: Object,
})

const form = useForm({
    category: null,
    policyNo: null,
    coverageType: null,
    startDate: null,
    endDate: null,
    status: null,
    layer: null,
    currency: null,
    grossPremium: null,
    brokerageDeduction: null,
    excess: null,
    limitAmount: null,
    insurerId: null,
    policholderId: null,
    agentId: null,
})

const submit = () => {
    form.post(route('policies.store'), {
        onFinish: () => console.log('Form submitted.'),
    });
}

const breadcrumbPages = [
    { name: 'Policies', href: route('policies.index'), current: false },
    { name: 'Create a Policy', href: '#', current: true },
];

</script>

<template>
    <Head title="Create a New Policy" />
    <Breadcrumbs :pages="breadcrumbPages" />

    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">

        <div class="w-full sm:max-w-5xl mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">

            <form @submit.prevent="submit" autocomplete="off">
                <div class="bg-blue-100 grid grid-cols-4 gap-4">

                    <!-- row -->
                    <div>
                        <InputLabel for="foo" value="Category" />
                        <TextInput id="foo" type="text" class="mt-1 block w-full" v-model="form.foo" required />
                        <InputError class="mt-2" :message="form.errors.foo" />
                    </div>
                    <div>
                        <InputLabel for="coverageType" value="Coverage Type" />
                        <DropdownA id="coverageType" :items="data.select.coverageTypes" class="mt-1 block w-full" v-model="form.coverageType" required />
                        <InputError class="mt-2" :message="form.errors.coverageType" />
                    </div>
                    <div>
                        <InputLabel for="startDate" value="Start Date" />
                        <TextInput id="startDate" type="date" class="mt-1 block w-full" v-model="form.startDate" required />
                        <InputError class="mt-2" :message="form.errors.startDate" />
                    </div>
                    <div>
                        <InputLabel for="endDate" value="Expiration Date" />
                        <TextInput id="endDate" type="date" class="mt-1 block w-full" v-model="form.endDate" required />
                        <InputError class="mt-2" :message="form.errors.endDate" />
                    </div>

                    <!-- row -->
                    <div>
                        <InputLabel for="grossPremium" value="Gross Premium" />
                        <TextInput id="grossPremium" type="number" class="mt-1 block w-full" v-model="form.grossPremium" required />
                        <InputError class="mt-2" :message="form.errors.grossPremium" />
                    </div>
                    <div>
                        <InputLabel for="brokerageDeduction" value="Brokerage Deduction" />
                        <TextInput id="brokerageDeduction" type="number" class="mt-1 block w-full" v-model="form.brokerageDeduction" required />
                        <InputError class="mt-2" :message="form.errors.brokerageDeduction" />
                    </div>
                    <div>
                        <InputLabel for="excess" value="Excess" />
                        <TextInput id="excess" type="number" class="mt-1 block w-full" v-model="form.excess" required />
                        <InputError class="mt-2" :message="form.errors.excess" />
                    </div>
                    <div>
                        <InputLabel for="limitAmount" value="Limit Amount" />
                        <TextInput id="limitAmount" type="number" class="mt-1 block w-full" v-model="form.limitAmount" required />
                        <InputError class="mt-2" :message="form.errors.limitAmount" />
                    </div>

                </div>

                <div class="flex items-center justify-end mt-4">
                    <Link
                        :href="route('policies.index')"
                        class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500"
                    >
                        Cancel
                    </Link>

                    <button class="bg-primary-500 hover:bg-primary-400 text-white w-full text-center py-3 font-bold rounded-lg" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>

    <div class="bg-red-200">

        <!-- Motor Specific Fields -->
        <div v-if="data.selectedCategory === 'motor'">
            <MotorFields />
        </div>

        <!-- Travel Specific Fields -->
        <div v-if="data.selectedCategory === 'travel'">
            <TravelFields />
        </div>

    </div>
    <div class="bg-blue-200">
        Perils
    </div>
</template>