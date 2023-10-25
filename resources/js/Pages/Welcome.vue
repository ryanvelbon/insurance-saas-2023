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
    <section class="bg-primary-800">section</section>
    <section class="bg-white py-16">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 grid grid-cols-1 lg:grid-cols-2 gap-8">
            <div class="flex justify-center items-center">
                <img src="https://placehold.co/512x512">
            </div>
            <div class="text-center lg:text-left">
                <h2 class="mt-4 text-4xl font-bold text-gray-800">Sit Amet Tempor<br>Consectetur Adipisicing</h2>
                <p class="mt-6 text-gray-800">Cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                <div class="flex justify-center lg:justify-start">
                    <ul class="grid grid-cols-1 sm:grid-cols-2 gap-x-8 gap-y-4 mt-12 max-w-2xl">
                        <li v-for="i in 6" :key="i" class="flex items-center gap-2">
                            <div class="bg-primary-100 text-gray-700 w-10 h-10 flex items-center justify-center rounded-full">
                                <i class="fa-regular fa-cloud"></i>
                            </div>
                            <span class="font-bold text-sm text-gray-900">Lorem Ipsum Dolor sit Amet</span>
                        </li>
                    </ul>
                </div>
                <div class="mt-12">
                    <a href="" class="btn btn-lg btn-outline-primary mr-4">
                        See Plans
                        <i class="fa-light fa-arrow-right ml-2"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <section class="bg-primary-800">section</section>

</template>
