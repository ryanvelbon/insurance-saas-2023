<script setup>
import { ref } from 'vue'

const features = [
    {
        id: 1,
        name: 'Manage Customers',
        icon: 'address-card',
        heading: 'Effortless Customer Management',
        bullets: [
            'From policyholders to stakeholders, easily register every individual or organization involved in your processes',
            'Streamline stakeholder information',
            'Centralize policyholder data',
            'Efficiently manage customer records',
        ],
    },
    {
        id: 2,
        name: 'Write Policies',
        icon: 'file-contract',
        heading: 'Policy Creation Made Simple',
        bullets: [
            'Effortlessly create insurance policies',
            'Specify the terms, conditions, coverage, and other details',
            'Customize policy parameters',
        ],
    },
    {
        id: 3,
        name: 'File Claims',
        icon: 'clipboard-list',
        heading: 'Seamless Claims Processing',
        bullets: [
            'File a claim on behalf of a customer',
            'Streamlined insurance coverage claim submissions',
            'Efficient claims processing',
            'Quick resolution of claims',
            'Simplified claims management',
        ],
    },
    // {
    //     id: 4,
    //     name: 'Record Payments',
    //     icon: 'money-check-dollar-pen',
    //     heading: 'Efficient Payment Recording',
    //     bullets: [
    //         'Record payments accurately',
    //         'Effortlessly manage financial data',
    //         'Track payment transactions',
    //         'Streamline payment processing',
    //     ],
    // },
    {
        id: 5,
        name: 'Upload Documents',
        icon: 'file-arrow-up',
        heading: 'Upload contracts, invoices, receipts, or supporting documentation for claims',
        bullets: [
            'Upload contracts and invoices',
            'Store receipts and documents',
            'Supporting documentation for claims',
            'Effortless document management',
        ],
    },
    {
        id: 6,
        name: 'Generate Reports',
        icon: 'file-chart-column',
        heading: 'Get insights into your business operations with our reporting tools',
        bullets: [
            'Create customized reports',
            'Access key business insights',
            'Analyze vital statistics',
            'Summarize business operations',
        ],
    },
    // {
    //     id: 7,
    //     name: 'Log Activity',
    //     icon: 'file-lines',
    //     heading: 'Log significant events, meetings, or any other activities',
    //     bullets: [
    //         'Log significant events',
    //         'Record important meetings',
    //         'Track various activities',
    //         'Efficiently manage activity logs',
    //     ],
    // }
];

let selectedFeature = ref(features[0]);

</script>

<template>
    <div class="bg-white p-12 rounded-3xl shadow-md">
        <div class="sm:hidden">
            <label for="tabs" class="sr-only">Select a tab</label>
            <select id="tabs" name="tabs" class="block w-full rounded-md border-gray-300 focus:border-primary-500 focus:ring-primary-500">
                <option v-for="feature in features" :key="feature.id" @click="selectedFeature = feature">{{ feature.name }}</option>
            </select>
        </div>
        <div class="hidden sm:block">
            <div class="border-b border-gray-200">
                <nav class="-mb-px flex" aria-label="Tabs">
                    <button
                        v-for="feature in features"
                        :key="feature.id"
                        @click="selectedFeature = feature"
                        class="flex flex-col gap-8"
                        :class="[feature.id === selectedFeature.id ? 'border-primary-500 text-primary-600' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700', 'w-1/4 border-b-2 py-4 px-1 text-center font-medium']"
                        :aria-current="feature === selectedFeature ? 'page' : undefined"
                    >
                        <i :class="`fa-duotone fa-${feature.icon} text-4xl lg:text-7xl`"></i>
                        <span class="text-base lg:text-lg">{{ feature.name }}</span>
                    </button>
                </nav>
            </div>
        </div>
        <div class="mt-16 grid grid-cols-1 md:grid-cols-2 gap-16">
            <div class="md:order-last">
                <img src="https://placehold.co/400x400">
            </div>
            <div>
                <h3 class="text-4xl font-semibold mb-8 text-gray-800">{{ selectedFeature.heading }}</h3>
                <ul class="list-disc list-inside text-lg">
                    <li v-for="bullet in selectedFeature.bullets" class="mb-4 text-gray-800">{{ bullet }}</li>
                </ul>
            </div>
        </div>
    </div>
</template>
