<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import Checkbox from '@/Components/Checkbox.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';

defineProps({
    canResetPassword: Boolean,
    status: String,
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <GuestLayout>
        <Head title="Log in" />

        <header class="px-8 py-2">
            <div class="flex justify-between">
                <div>
                    <Link href="/">
                        <ApplicationLogo class="w-12 h-12 fill-current text-gray-500" />
                    </Link>
                </div>
                <div class="flex gap-4 items-center">
                    <p class="text-gray-700 text-sm">Don't have an account?</p>
                    <Link :href="route('register')" class="font-mono underline text-blue-500 hover:text-blue-400">Sign up</Link>
                </div>
            </div>
        </header>

        <div class="min-h-screen grid grid-cols-1 lg:grid-cols-2">
            <section class="flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
                <div>
                    <Link href="/">
                        <ApplicationLogo class="w-20 h-20 fill-current text-gray-500" />
                    </Link>
                </div>

                <div
                    class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg"
                >
                    <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
                        {{ status }}
                    </div>

                    <h1 class="text-4xl text-gray-800 font-bold mb-4">Welcome back</h1>

                    <p class="text-gray-700 mb-4">Sign into your account below</p>

                    <form @submit.prevent="submit">
                        <div>
                            <InputLabel for="email" value="Email" />

                            <TextInput
                                id="email"
                                type="email"
                                class="mt-1 block w-full"
                                v-model="form.email"
                                required
                                autofocus
                                autocomplete="username"
                            />

                            <InputError class="mt-2" :message="form.errors.email" />
                        </div>

                        <div class="mt-4">
                            <InputLabel for="password" value="Password" />

                            <TextInput
                                id="password"
                                type="password"
                                class="mt-1 block w-full"
                                v-model="form.password"
                                required
                                autocomplete="current-password"
                            />

                            <InputError class="mt-2" :message="form.errors.password" />
                        </div>

                        <div class="block mt-4">
                            <label class="flex items-center">
                                <Checkbox name="remember" v-model:checked="form.remember" />
                                <span class="ml-2 text-sm text-gray-600">Remember me</span>
                            </label>
                        </div>

                        <div class="mt-8">
                            <button class="bg-blue-500 hover:bg-blue-400 text-white w-full text-center py-3 font-bold rounded-lg" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                Log in
                            </button>
                        </div>

                        <div class="mt-4">
                            <Link
                                v-if="canResetPassword"
                                :href="route('password.request')"
                                class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                            >
                                Forgot your password?
                            </Link>
                        </div>
                    </form>
                </div>
            </section>
            <section class="bg-blue-700 text-white flex flex-col gap-8 justify-center px-24 py-12">
                <h2 class="text-4xl font-bold">Lorem Ipsum Dolor Sit Amet Consectetur!</h2>
                <p class="font-bold">Adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse.</p>
                <div>
                    <a href="">
                        <span class="bg-white border-blue-400 text-blue-600 hover:bg-blue-400 hover:border-white hover:text-white px-4 py-3 font-bold">
                            Cillum dolore eu Fugiat Nulla!
                        </span>
                    </a>
                </div>
            </section>
        </div>
    </GuestLayout>
</template>
