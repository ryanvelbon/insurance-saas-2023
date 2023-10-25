<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3'
import NavBar from '@/Components/NavBar.vue'
import Footer from '@/Components/Footer.vue'
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
    <section class="isolate overflow-hidden px-6 lg:px-8 bg-primary-600">
        <div class="relative mx-auto max-w-2xl py-24 sm:py-32 lg:max-w-4xl">
            <figure class="grid grid-cols-1 items-center gap-x-6 gap-y-8 lg:gap-x-10">
                <div class="relative col-span-2 lg:col-start-1 lg:row-start-2">
                    <blockquote class="text-xl leading-8 text-white sm:text-3xl sm:leading-9">
                        <p>“Quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore.”</p>
                    </blockquote>
                </div>
                <div class="col-end-1 w-16 lg:row-span-4 lg:w-72">
                    <img class="lg:rounded-oval bg-indigo-50" src="https://images.unsplash.com/photo-1633332755192-727a05c4013d?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=576&h=576&q=80" alt="">
                </div>
                <figcaption class="text-base lg:col-start-1 lg:row-start-3">
                    <div class="font-semibold text-white">Thomas Andrews</div>
                    <div class="mt-1 text-gray-200">CEO of SafetyFirst</div>
                </figcaption>
            </figure>
        </div>
    </section>
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
    <section class="bg-primary-500">CTA section</section>
    <Footer />
</template>
