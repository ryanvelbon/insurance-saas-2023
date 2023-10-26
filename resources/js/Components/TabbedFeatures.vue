<script setup>
import { ref } from 'vue'

const features = [
    {
        id: 1,
        name: 'Feature 1',
        heading: 'Aute irure dolor in reprehenderit in voluptate velit esse',
        bullets: [
            'Lorem ipsum dolor sit amet',
            'Consectetur adipisicing elit',
            'Sed do eiusmod tempor incididunt',
            'Ut labore et dolore',
        ],
    },
    {
        id: 2,
        name: 'Feature 2',
        heading: 'Ut enim ad incididunt ut labore et dolore magna aliqua',
        bullets: [
            'Magna aliqua. Ut enim ad minim veniam',
            'Quis nostrud exercitation',
            'Ullamco laboris nisi ut aliquip ex ea commodo',
            'Consequat duis aute irure dolor',
        ],
    },
    {
        id: 3,
        name: 'Feature 3',
        heading: 'Excepteur sint occaecat cupidatat non cillum dolore eu fugiat',
        bullets: [
            'Dolor in reprehenderit in voluptate velit esse',
            'Cillum dolore eu fugiat nulla pariatur',
            'Excepteur sint occaecat cupidatat non proident',
            'Sunt in culpa qui officia deserunt mollit anim id est laborum',
        ],
    },
    {
        id: 4,
        name: 'Feature 4',
        heading: 'Proident sunt in culpa qui officia deserunt mollit',
        bullets: [
            'Tempor incididunt ut labore et dolore',
            'Magna aliqua ut enim ad minim veniam',
            'Quis nostrud exercitation',
            'Ullamco laboris nisi ut aliquip',
        ],
    },
    {
        id: 5,
        name: 'Feature 5',
        heading: 'Quis nostrud exercitation ullamco laboris nisi ut aliquip',
        bullets: [
            'Excepteur sint occaecat cupidatat non',
            'Sunt in culpa qui officia',
            'Deserunt mollit anim',
            'Culpae id est laborum',
        ],
    },
    // Add more features as needed
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
                    <button v-for="feature in features" :key="feature.id" @click="selectedFeature = feature" :class="[feature.id === selectedFeature.id ? 'border-primary-500 text-primary-600' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700', 'w-1/4 border-b-2 py-4 px-1 text-center text-sm font-medium']" :aria-current="feature === selectedFeature ? 'page' : undefined">{{ feature.name }}</button>
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
