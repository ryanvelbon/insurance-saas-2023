<script setup>
import Breadcrumbs from '@/Components/Breadcrumbs.vue';
import { Link } from '@inertiajs/inertia-vue3';
import { ref } from 'vue'
import {
  Dialog,
  DialogPanel,
  Menu,
  MenuButton,
  MenuItem,
  MenuItems,
  TransitionChild,
  TransitionRoot,
} from '@headlessui/vue'

const navigation = [
  { name: 'Dashboard', href: route('dashboard'), icon: 'home', current: route().current('dashboard') },
  { name: 'Persons', href: route('persons.index'), icon: 'address-book', current: route().current('persons.index') },
  { name: 'Policies', href: route('policies.index'), icon: 'file-contract', current: route().current('policies.index') },
  { name: 'Team', href: route('team-members.index'), icon: 'people-group', current: route().current('team-members.index') },
]
const userNavigation = [
  { name: 'Your Profile', href: route('profile.edit') },
  { name: 'Settings', href: '#' },
  { name: 'Sign out', href: route('logout'), method: 'POST' },
]

const sidebarOpen = ref(false)
</script>

<template>
  <div>
    <TransitionRoot as="template" :show="sidebarOpen">
      <Dialog as="div" class="relative z-40 md:hidden" @close="sidebarOpen = false">
        <TransitionChild as="template" enter="transition-opacity ease-linear duration-300" enter-from="opacity-0" enter-to="opacity-100" leave="transition-opacity ease-linear duration-300" leave-from="opacity-100" leave-to="opacity-0">
          <div class="fixed inset-0 bg-gray-600 bg-opacity-75" />
        </TransitionChild>

        <div class="fixed inset-0 z-40 flex">
          <TransitionChild as="template" enter="transition ease-in-out duration-300 transform" enter-from="-translate-x-full" enter-to="translate-x-0" leave="transition ease-in-out duration-300 transform" leave-from="translate-x-0" leave-to="-translate-x-full">
            <DialogPanel class="relative flex w-full max-w-xs flex-1 flex-col bg-white pt-5 pb-4">
              <TransitionChild as="template" enter="ease-in-out duration-300" enter-from="opacity-0" enter-to="opacity-100" leave="ease-in-out duration-300" leave-from="opacity-100" leave-to="opacity-0">
                <div class="absolute top-0 right-0 -mr-12 pt-2">
                  <button type="button" class="ml-1 flex h-10 w-10 items-center justify-center rounded-full focus:outline-none" @click="sidebarOpen = false">
                    <span class="sr-only">Close sidebar</span>
                    <i class="fa-thin fa-circle-xmark fa-2xl h-6 w-6 text-white flex justify-center items-center" aria-hidden="true"></i>
                  </button>
                </div>
              </TransitionChild>
              <div class="flex flex-shrink-0 items-center px-4">
                <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="Your Company" />
              </div>
              <div class="mt-5 h-0 flex-1 overflow-y-auto">
                <nav class="space-y-1 px-2">
                  <Link v-for="item in navigation" :key="item.name" :href="item.href" :class="[item.current ? 'bg-gray-100 text-gray-900' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900', 'group rounded-md py-2 px-2 flex items-center text-base font-medium']">
                    <i :class="[item.current ? 'text-gray-500' : 'text-gray-400 group-hover:text-gray-500', 'mr-3 flex-shrink-0 fa-regular', `fa-${item.icon}`, 'fa-lg']" aria-hidden="true"></i>
                    {{ item.name }}
                  </Link>
                </nav>
              </div>
            </DialogPanel>
          </TransitionChild>
          <div class="w-14 flex-shrink-0">
            <!-- Dummy element to force sidebar to shrink to fit close icon -->
          </div>
        </div>
      </Dialog>
    </TransitionRoot>

    <!-- Static sidebar for desktop -->
    <div class="hidden md:fixed md:inset-y-0 md:flex md:w-64 md:flex-col">
      <!-- Sidebar component, swap this element with another sidebar if you like -->
      <div class="flex flex-grow flex-col overflow-y-auto border-r border-gray-200 bg-white pt-5">
        <div class="flex flex-shrink-0 items-center px-4">
          <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="Your Company" />
        </div>
        <div class="mt-5 flex flex-grow flex-col">
          <nav class="flex-1 pb-4">
            <Link v-for="item in navigation" :key="item.name" :href="item.href" :class="[item.current ? 'bg-gray-100 text-gray-900' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900', 'group py-3 pl-6 flex items-center text-lg font-semibold']">
              <i :class="[item.current ? 'text-gray-500' : 'text-gray-400 group-hover:text-gray-500', 'mr-3 flex-shrink-0 fa-regular', `fa-${item.icon}`, 'fa-lg']" aria-hidden="true"></i>
              {{ item.name }}
            </Link>
          </nav>
        </div>
      </div>
    </div>

    <div class="md:pl-64">
      <div class="flex flex-col xl:px-0">
        <div class="sticky top-0 z-10 flex h-12 flex-shrink-0 border-b border-gray-200 bg-white pr-6 md:pl-6">
          <button type="button" class="border-r border-gray-200 px-4 text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500 md:hidden" @click="sidebarOpen = true">
            <span class="sr-only">Open sidebar</span>
            <i class="fa-sharp fa-solid fa-bars" aria-hidden="true"></i>
          </button>
          <div class="flex flex-1 justify-between px-4 md:px-0">
            <div class="flex flex-1">
              <form class="flex w-full md:ml-0 items-center" action="#" method="GET">
                <label for="search-field" class="sr-only">Search</label>
                <div class="relative w-full text-gray-400 focus-within:text-gray-600 mx-2">
                  <div class="pointer-events-none absolute inset-y-0 left-2 flex items-center">
                    <i class="fa-solid fa-magnifying-glass fa-xs" aria-hidden="true"></i>
                  </div>
                  <input id="search-field" class="block h-8 w-40 focus:w-full rounded border border-gray-300 py-2 pl-8 pr-3 text-gray-900 placeholder-gray-500 focus:border-indigo-500 focus:shadow-md focus:placeholder-gray-400 focus:outline-none focus:ring-0 sm:text-sm" placeholder="Search" type="search" name="search" />
                </div>
              </form>
            </div>
            <div class="ml-4 flex items-center md:ml-6">
              <button type="button">
                <span class="sr-only">View notifications</span>
                <i class="fa-regular fa-bell h-8 w-8 p-3 hover:bg-gray-200 rounded-full flex items-center justify-center text-gray-600" aria-hidden="true"></i>
              </button>

              <!-- Profile dropdown -->
              <Menu as="div" class="relative ml-3">
                <div>
                  <MenuButton class="flex max-w-xs items-center rounded-full text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                    <span class="sr-only">Open user menu</span>
                    <img class="h-8 w-8 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="" />
                  </MenuButton>
                </div>
                <transition enter-active-class="transition ease-out duration-100" enter-from-class="transform opacity-0 scale-95" enter-to-class="transform opacity-100 scale-100" leave-active-class="transition ease-in duration-75" leave-from-class="transform opacity-100 scale-100" leave-to-class="transform opacity-0 scale-95">
                  <MenuItems class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
                    <MenuItem v-for="item in userNavigation" :key="item.name" v-slot="{ active }">
                      <Link :href="item.href" :method="item.method" :class="[active ? 'bg-gray-100' : '', 'block py-2 px-4 text-sm text-gray-700']">{{ item.name }}</Link>
                    </MenuItem>
                  </MenuItems>
                </transition>
              </Menu>
            </div>
          </div>
        </div>

        <main class="flex-1">
          <slot />
        </main>
      </div>
    </div>
  </div>
</template>