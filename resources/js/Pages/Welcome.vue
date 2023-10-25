<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3'
import NavBar from '@/Components/NavBar.vue'
</script>

<template>
    <Head title="Welcome" />

    <NavBar />

    <section class="bg-primary-50 py-16">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 grid grid-cols-1 lg:grid-cols-2 gap-8">
            <div class="text-center lg:text-left">
                <h1 class="uppercase text-sm font-semibold text-gray-600">Insurance Broker Software</h1>
                <h2 class="mt-4 text-6xl font-bold text-gray-800">Smart, simple software for insurance brokers and agencies</h2>
                <p class="mt-6 text-gray-800">Say goodbye to spreadsheets. With Siguranza, you and your team can manage customers, write policies, file claims, run financial reports and more, all from one place.</p>
                <div class="mt-12 mb-8">
                    <a href="" class="btn btn-lg btn-primary mr-4">Buy now</a>
                    <a href="" class="btn btn-lg btn-secondary">Free 30-day trial</a>
                </div>
            </div>
            <div class="flex justify-center items-center">
                <img src="https://placehold.co/512x512">
            </div>
        </div>
    </section>
    <section class="bg-primary-800 h-screen">section</section>
    <section class="bg-primary-100 h-screen">section</section>
    <section class="bg-primary-800 h-screen">section</section>

</template>
