<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Link } from '@inertiajs/inertia-vue3';
</script>

<template>
    <header class="px-8 py-2">
        <div class="flex justify-between">
            <div>
                <Link href="/">
                    <ApplicationLogo class="w-12 h-12 fill-current text-gray-500" />
                </Link>
            </div>
            <div v-if="route().current('login') || route().current('password.request')" class="flex gap-4 items-center">
                <p class="text-gray-700 text-sm">Don't have an account?</p>
                <Link :href="route('register')" class="font-mono underline text-blue-500 hover:text-blue-400">Sign up</Link>
            </div>
            <div v-if="route().current('register')" class="flex gap-4 items-center">
                <p class="text-gray-700 text-sm">Already have an account?</p>
                <Link :href="route('login')" class="font-mono underline text-blue-500 hover:text-blue-400">Sign in</Link>
            </div>
        </div>
    </header>

    <slot />
</template>
