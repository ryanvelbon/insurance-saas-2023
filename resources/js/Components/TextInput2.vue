<script setup>
import { onMounted, ref } from 'vue'
import { v4 as uuid } from 'uuid'

defineProps(['modelValue', 'label', 'error'])

defineEmits(['update:modelValue'])

const input = ref(null)
const id = `text-input-${uuid()}`

onMounted(() => {
    if (input.value.hasAttribute('autofocus')) {
        input.value.focus()
    }
})

defineExpose({ focus: () => input.value.focus() })
</script>

<template>
    <div class="hidden"><!-- Keep this to avoid Vue's attribute inheritance --></div>
    <div class="flex flex-col">
        <label v-if="label" :for="id" class="block font-medium text-sm text-gray-700">{{ label }}</label>
        <input
            :id="id"
            v-bind="$attrs"
            class="mt-1 border-gray-300 focus:border-primary-500 focus:ring-primary-500 rounded-md shadow-sm"
            :value="modelValue"
            @input="$emit('update:modelValue', $event.target.value)"
            ref="input"
        />
        <p v-if="error" class="mt-2 text-sm text-danger-600">{{ error }}</p>
    </div>
</template>
