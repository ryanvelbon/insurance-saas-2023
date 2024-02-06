<script setup>
import { Link } from '@inertiajs/inertia-vue3'
import { Disclosure, DisclosureButton, DisclosurePanel } from '@headlessui/vue'
import { ref, onMounted, onUnmounted } from 'vue'

const navigation = [
    { name: 'Home', href: route('home'), current: route().current('home') },
    { name: 'Pricing', href: route('pricing'), current: route().current('pricing') },
    { name: 'Resources', href: '#', current: false },
    { name: 'Enterprise', href: '#', current: false },
]

const isScrolled = ref(false)

function handleScroll() {
    isScrolled.value = window.scrollY > 0
}

onMounted(() => {
    window.addEventListener('scroll', handleScroll)
})

onUnmounted(() => {
    window.removeEventListener('scroll', handleScroll)
})

</script>

<template>
    <Disclosure as="nav"
        class="fixed top-0 w-full z-20 bg-white"
        :class="isScrolled ? 'shadow-lg' : ''"
        v-slot="{ open }"
    >
        <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
            <div class="relative flex h-16 justify-between">
                <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                    <!-- Mobile menu button -->
                    <DisclosureButton class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-100 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-primary-500">
                        <span class="absolute -inset-0.5" />
                        <span class="sr-only">Open main menu</span>
                        <i v-if="!open" class="fa-solid fa-bars"></i>
                        <i v-else class="fa-solid fa-xmark"></i>
                    </DisclosureButton>
                </div>
                <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
                    <div class="flex flex-shrink-0 items-center">
                        <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=primary&shade=600" alt="Your Company" />
                    </div>
                    <div class="hidden sm:ml-6 sm:flex sm:space-x-8">
                        <a v-for="item in navigation" :key="item.name" :href="item.href" :class="[item.current ? 'border-primary-500 text-gray-900' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700', 'inline-flex items-center border-b-2 px-1 pt-1 text-sm font-medium']">{{ item.name }}</a>
                    </div>
                </div>
                <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                    <Link
                        v-if="$page.props.auth.user"
                        :href="route('dashboard')"
                        class="text-sm text-gray-700 dark:text-gray-500 underline"
                        >Dashboard</Link
                    >

                    <template v-else>
                        <Link :href="route('login')" class="btn btn-sm border border-gray-700 text-gray-700 hover:bg-info-100"> Log in </Link>
                        <Link :href="route('register')" class="ml-2 btn btn-sm btn-info"> Register </Link>
                    </template>
                </div>
            </div>
        </div>

        <DisclosurePanel class="sm:hidden">
            <div class="space-y-1 pb-4 pt-2">
                <DisclosureButton v-for="item in navigation" :key="item.name" as="a" :href="item.href" :class="[item.current ? 'bg-primary-50 border-primary-500 text-primary-700' : 'border-transparent text-gray-500 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700', 'block border-l-4 py-2 pl-3 pr-4 text-base font-medium']">{{ item.name }}</DisclosureButton>
            </div>
        </DisclosurePanel>
    </Disclosure>
</template>
