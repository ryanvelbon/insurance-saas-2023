<script setup>

const navigation = {
    solutions: [
        { name: 'Marketing', href: '#' },
        { name: 'Analytics', href: '#' },
        { name: 'Commerce', href: '#' },
        { name: 'Insights', href: '#' },
    ],
    support: [
        { name: 'Pricing', href: '#' },
        { name: 'Documentation', href: '#' },
        { name: 'Guides', href: '#' },
        { name: 'API Status', href: '#' },
    ],
    company: [
        { name: 'About', href: '#' },
        { name: 'Blog', href: '#' },
        { name: 'Jobs', href: '#' },
        { name: 'Press', href: '#' },
        { name: 'Partners', href: '#' },
    ],
    legal: [
        { name: 'Claim', href: '#' },
        { name: 'Privacy', href: '#' },
        { name: 'Terms', href: '#' },
    ],
    social: [
        {
            name: 'Twitter',
            href: '#',
            icon: 'x-twitter',
        },
        {
            name: 'Facebook',
            href: '#',
            icon: 'facebook',
        },
        {
            name: 'LinkedIn',
            href: '#',
            icon: 'linkedin',
        },
        {
            name: 'GitHub',
            href: '#',
            icon: 'github',
        },
        {
            name: 'YouTube',
            href: '#',
            icon: 'youtube',
        },
    ],
}
</script>

<template>
    <footer class="bg-gray-900" aria-labelledby="footer-heading">
        <h2 id="footer-heading" class="sr-only">Footer</h2>
        <div class="grid grid-cols-2 xl:grid-cols-6 gap-8 px-6 lg:px-12 pt-16 sm:pt-24 lg:pt-32">
            <div>
                <h3 class="menu-heading">Solutions</h3>
                <ul role="list" class="space-y-4">
                    <li v-for="item in navigation.solutions" :key="item.name">
                        <a :href="item.href" class="menu-item">{{ item.name }}</a>
                    </li>
                </ul>
            </div>
            <div>
                <h3 class="menu-heading">Support</h3>
                <ul role="list" class="space-y-4">
                    <li v-for="item in navigation.support" :key="item.name">
                        <a :href="item.href" class="menu-item">{{ item.name }}</a>
                    </li>
                </ul>
            </div>
            <div>
                <h3 class="menu-heading">Company</h3>
                <ul role="list" class="space-y-4">
                    <li v-for="item in navigation.company" :key="item.name">
                        <a :href="item.href" class="menu-item">{{ item.name }}</a>
                    </li>
                </ul>
            </div>
            <div>
                <h3 class="menu-heading">Legal</h3>
                <ul role="list" class="space-y-4">
                    <li v-for="item in navigation.legal" :key="item.name">
                        <a :href="item.href" class="menu-item">{{ item.name }}</a>
                    </li>
                </ul>
            </div>
            <div class="col-span-2">
                <h3 class="menu-heading">Siguranza</h3>
                <p class="text-gray-300 text-sm leading-6">Siguranza consequat duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

                <h3 class="menu-heading mt-16">Subscribe to our newsletter</h3>
                <form class="mt-6 sm:flex sm:max-w-md lg:mt-0">
                    <label for="email-address" class="sr-only">Email address</label>
                    <input type="email" name="email-address" id="email-address" autocomplete="email" required="" class="w-full min-w-0 appearance-none rounded-md border-0 bg-white/5 px-3 py-1.5 text-base text-white shadow-sm ring-1 ring-inset ring-white/10 placeholder:text-gray-500 focus:ring-2 focus:ring-inset focus:ring-primary-500 sm:w-56 sm:text-sm sm:leading-6" placeholder="Enter your email" />
                    <div class="mt-4 sm:ml-4 sm:mt-0 sm:flex-shrink-0">
                        <button type="submit" class="flex w-full items-center justify-center rounded-md bg-primary-500 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-primary-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary-500">Subscribe</button>
                    </div>
                </form>
                <p class="mt-4 text-xs leading-6 text-gray-300">By entering your email, you agree to our Terms & Conditions and Privacy Policy.</p>
            </div>
        </div>
        <div class="mt-8 bg-black border-t border-white/10 py-6 md:flex md:items-center md:justify-between px-6 lg:px-12">
            <div class="flex space-x-6 md:order-2">
                <a v-for="item in navigation.social" :key="item.name" :href="item.href" class="text-gray-500 hover:text-gray-400">
                    <span class="sr-only">{{ item.name }}</span>
                    <i :class="`fa-brands fa-${item.icon} fa-xl`"></i>
                </a>
            </div>
            <p class="mt-8 text-xs leading-5 text-gray-400 md:order-1 md:mt-0">&copy; 2023 - 2024 Siguranza. All rights reserved.</p>
        </div>
    </footer>
</template>

<style scoped>

.menu-heading {
    @apply text-lg font-semibold leading-6 tracking-wider text-white mb-6;
}

.menu-item {
    @apply text-sm leading-6 text-gray-300 hover:text-white;
}
</style>