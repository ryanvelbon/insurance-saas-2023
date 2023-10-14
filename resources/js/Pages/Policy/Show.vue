<script setup>
import { Head } from '@inertiajs/inertia-vue3'
import AppLayout from '@/Layouts/AppLayout.vue'
import Breadcrumbs from '@/Components/Breadcrumbs.vue'

const props = defineProps({
    policy: Object,
})

const breadcrumbPages = [
    { name: 'Policies', href: route('policies.index'), current: false },
    { name: 'View Policy', href: '#', current: true },
];

</script>

<template>
    <Head title="View Policy" />

    <AppLayout>
        <Breadcrumbs :pages="breadcrumbPages" />
        <div class="mx-2 sm:mx-4 md:mx-8">
            <div class="py-4 flex justify-between">
                <div class="flex gap-2">
                    <button class="btn">Click</button>
                    <button class="btn">Click</button>
                    <button class="btn">Click</button>
                    <button class="btn"><i class="fa-light fa-envelope"></i></button>
                </div>
                <div class="flex gap-2">
                    <button class="btn">Edit</button>
                    <button class="btn">Delete</button>
                </div>
            </div>
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 mb-8">
                <div class="card lg:col-span-2">
                    <h2 class="heading-label">Policy</h2>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                        <div class="md:col-span-2">
                            <div class="field-name">Policy Number</div>
                            <div class="field-value">{{ policy.policy_no }}</div>
                        </div>
                        <div class="md:col-span-2">
                            <div class="field-name">Category</div>
                            <div class="field-value">{{ policy.category }}</div>
                        </div>
                        <div>
                            <div class="field-name">Effective Date</div>
                            <div class="field-value">{{ policy.start_date }}</div>
                        </div>
                        <div>
                            <div class="field-name">Expiration Date</div>
                            <div class="field-value">{{ policy.end_date }}</div>
                        </div>
                        <div>
                            <div class="field-name">Coverage Type</div>
                            <div class="field-value">{{ policy.coverage_type }}</div>
                        </div>
                        <div>
                            <div class="field-name">Layer</div>
                            <div class="field-value">{{ policy.layer }}</div>
                        </div>

                        <!-- financials -->
                        <div>
                            <div class="field-name">Gross Premium</div>
                            <div class="field-value">{{ policy.gross_premium }}</div>
                        </div>
                        <div>
                            <div class="field-name">Brokerage Deduction</div>
                            <div class="field-value">{{ policy.brokerage_deduction }}</div>
                        </div>
                        <div>
                            <div class="field-name">Excess</div>
                            <div class="field-value">{{ policy.excess }}</div>
                        </div>
                        <div>
                            <div class="field-name">Limit Amount</div>
                            <div class="field-value">{{ policy.limit_amount }}</div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    stats, e.g., claims, payouts, etc.
                </div>
            </div>
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
                <article class="card">
                    <h3 class="heading-label">Policyholder</h3>
                </article>
                <article class="card">
                    <h3 class="heading-label">Insurer</h3>
                    <h4 class="stakeholder-name">{{ policy.insurer.name }}</h4>
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
                <article class="card">
                    <h3 class="heading-label">Agent</h3>
                    <h4 class="stakeholder-name">{{ policy.agent.name }}</h4>
                    <ul class="contact-details">
                        <li>
                            <i class="fa-light fa-envelope fa-sm"></i>
                            {{ policy.agent.email }}
                        </li>
                    </ul>
                </article>
            </div>
            <div class="card mt-8 mb-8">
                <h3 class="heading-label">Extension Fields</h3>
                displays data that is specific to the {{ policy.category }} insurance category
            </div>
            <div class="card mb-8">
                <h3 class="heading-label">Log</h3>
                log stuff here (e.g., claims)
            </div>
        </div>
    </AppLayout>
</template>

<style>
.btn {
    @apply bg-gray-100 border border-gray-300 px-3 py-1.5 text-xs uppercase rounded text-gray-500 hover:bg-gray-200 hover:border-gray-400 hover:text-gray-600 hover:shadow;
}
.card {
    @apply bg-white p-8 rounded-lg shadow-lg;
}
.heading-label {
    @apply text-xl font-bold text-blue-600 mb-6;
}
.field-name {
    @apply text-xs uppercase text-gray-500 mb-1 font-semibold;
}
.field-value {
    @apply text-gray-800 text-xl font-semibold;
}
.stakeholder-name {
    @apply font-bold mb-3;
}
.contact-details {
    @apply text-sm flex flex-col gap-2;
}
</style>
