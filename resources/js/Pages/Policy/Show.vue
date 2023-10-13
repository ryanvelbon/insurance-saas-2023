<script setup>
import { Head } from '@inertiajs/inertia-vue3'
import AppLayout from '@/Layouts/AppLayout.vue'

const props = defineProps({
    policy: Object,
})
</script>

<template>
    <Head title="View Policy" />

    <AppLayout>
        <div class="bg-blue-200">
            {{ policy }}
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <article>
                <h3>Policyholder</h3>
            </article>
            <article>
                <h3>Insurer</h3>
                <h4>{{ policy.insurer.name }}</h4>
                <ul class="contact-details">
                    <li>
                        <i class="fa-light fa-link fa-sm"></i>
                        {{ policy.insurer.website }}
                    </li>
                    <li>
                        <i class="fa-light fa-envelope fa-sm"></i>
                        {{ policy.insurer.email }}
                    </li>
                    <li>
                        <i class="fa-light fa-phone fa-sm"></i>
                        {{ policy.insurer.phone }}
                    </li>
                </ul>
            </article>
            <article>
                <h3>Agent</h3>
                <h4>{{ policy.agent.name }}</h4>
                <ul class="contact-details">
                    <li>
                        <i class="fa-light fa-envelope fa-sm"></i>
                        {{ policy.agent.email }}
                    </li>
                </ul>
            </article>
        </div>
    </AppLayout>
</template>

<style>
article {
    @apply bg-white p-8 rounded-lg shadow-md;
}
article h3 {
    @apply text-xl font-bold text-gray-800 mb-6;
}
article h4 {
    @apply font-bold mb-3;
}
article .contact-details {
    @apply text-sm flex flex-col gap-2;
}
</style>
