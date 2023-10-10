<script setup>
import { ref } from 'vue'
import AppLayout from '@/Layouts/AppLayout.vue'
import Breadcrumbs from '@/Components/Breadcrumbs.vue'
import InputLabel from '@/Components/InputLabel.vue'
import InputError from '@/Components/InputError.vue'
import TextInput from '@/Components/TextInput.vue'

import MotorFields from './Partials/CategoryFields/Motor.vue';
import TravelFields from './Partials/CategoryFields/Travel.vue';

import { Head, useForm } from '@inertiajs/inertia-vue3'

const props = defineProps({
  data: Object,
  meta: Object,
})

const form = useForm({
  startDate: '',
  endDate: '',
})

const breadcrumbPages = [
  { name: 'Policies', href: route('policies.index'), current: false },
  { name: 'Create a Policy', href: '#', current: true },
];

</script>

<template>
  <AppLayout>
    <Head title="Create a New Policy" />
    <Breadcrumbs :pages="breadcrumbPages" />
    <div class="bg-blue-200">
      <form @submit.prevent="submit" autocomplete="off">
        <div class="grid grid-cols-2">
          <div class="bg-green-200">
            Policyholder
            <input type="text" name="">
          </div>
          <div class="flex justify-evenly">
            <div>
              <InputLabel for="startDate" value="Start date" />
              <TextInput
                id="startDate"
                type="date"
                v-model="form.startDate"
                class="mt-1 block"
                required
              />
              <InputError class="mt-2" :message="form.errors.startDate" />
            </div>
            <div>
              <InputLabel for="endDate" value="End date" />
              <TextInput
                id="endDate"
                type="date"
                v-model="form.endDate"
                class="mt-1 block"
                required
              />
              <InputError class="mt-2" :message="form.errors.endDate" />
            </div>
          </div>
        </div>
      </form>
    </div>
    <div class="bg-red-200">

      <!-- Motor Specific Fields -->
      <div v-if="data.selectedCategory === 'motor'">
        <MotorFields />
      </div>

      <!-- Travel Specific Fields -->
      <div v-if="data.selectedCategory === 'travel'">
        <TravelFields />
      </div>

    </div>
    <div class="bg-blue-200">
      Perils
    </div>
  </AppLayout>
</template>