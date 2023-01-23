<script setup>
import { ref } from 'vue'
import AppLayout from '@/Layouts/AppLayout.vue'

const props = defineProps({
  data: Object,
  meta: Object,
})


</script>

<template>
  <AppLayout>
    <div class="bg-blue-200">
      general policy section
    </div>
    <div class="bg-red-200">
      <slot />
    </div>
  </AppLayout>
</template>