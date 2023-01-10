<script setup>
import { ref } from 'vue'
import AppLayout from '@/Layouts/AppLayout.vue'
import { Head, useForm } from '@inertiajs/inertia-vue3'

const props = defineProps({
  data: Object,
  meta: Object,
})

const form = useForm({
  email: '',
  phone: '',
  type: '',
})

const submit = () => {
  form.post(route('clients.store'), {
    onFinish: () => console.log("data submitted"),
  })
}


</script>

<template>
  <AppLayout>
    <Head title="Add a client" />

    <form @submit.prevent="submit">
      
    </form>
  </AppLayout>
</template>