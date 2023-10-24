<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3'
import NavBar from '@/Components/NavBar.vue'
</script>

<template>
    <Head title="Welcome" />

    <NavBar />

    <section class="bg-primary-300 h-screen">section 1</section>
    <section class="bg-primary-100 h-screen">section 2</section>
    <section class="bg-primary-800 h-screen">section 3</section>

</template>
