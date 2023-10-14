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
                <div>
                    <button class="btn">Click</button>
                </div>
            </div>
            <div class="grid grid-cols-1 lg:grid-cols-3 mb-8">
                <div class="lg:col-span-2 bg-white p-8 rounded-lg shadow-md">
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
                <div class="bg-blue-200">
                    stats, e.g., claims, payouts, etc.
                </div>
            </div>
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
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
            <div class="bg-blue-200 mt-8">
                log stuff here (e.g., claims)
            </div>
        </div>
    </AppLayout>
</template>

<style>
.field-name {
    @apply text-xs uppercase text-gray-500 mb-1 font-semibold;
}
.field-value {
    @apply text-gray-800 text-xl font-semibold;
}
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

.btn {
    @apply bg-gray-100 border border-gray-300 px-3 py-1.5 text-xs uppercase rounded text-gray-500 hover:bg-gray-200 hover:border-gray-400 hover:text-gray-600 hover:shadow;
}
</style>
