<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'
import InputLabel from '@/Components/InputLabel.vue'
import InputError from '@/Components/InputError.vue'
import TextInput from '@/Components/TextInput.vue'
import TextArea from '@/Components/TextArea.vue'
import PrimaryButton from '@/Components/PrimaryButton.vue'
import DropdownA from '@/Components/DropdownA.vue'
import { useForm } from '@inertiajs/inertia-vue3'

const props = defineProps({
  data: Object,
  meta: Object,
})

const form = useForm({

  email: '',
  phone: '',

  name: '',
  description: '',
  type: '',
  size: '',
  founded: '',
  status: '',
  website: '',

})

const submit = () => {
  form.post(route('juridicalPersons.store'), {
    onFinish: () => console.log("data submitted"),
  })
}

console.log(props.data)

</script>

<template>
  <AppLayout>
    <h1>Create a Juridical Person</h1>

    <InputError class="mt-2" :message="form.errors.email" />
    <InputError class="mt-2" :message="form.errors.phone" />

    <InputError class="mt-2" :message="form.errors.name" />
    <InputError class="mt-2" :message="form.errors.description" />

    <form @submit.prevent="submit" autocomplete="off">
      <div class="grid grid-cols-1 lg:grid-cols-2">
        <section class="bg-red-200 p-8">
          <div>
            <InputLabel for="name" value="Name" />

            <TextInput
              id="name"
              type="text"
              v-model="form.name"
              class="mt-1 block w-full"
              required
              autofocus
            />

            <InputError class="mt-2" :message="form.errors.name" />
          </div>

          <div class="mt-8">
            <InputLabel for="type" value="Type" />

            <DropdownA
              id="type"
              :items="data.typeChoices"
              v-model="form.type"
              class="mt-1 block"
            />

            <InputError class="mt-2" :message="form.errors.type" />
          </div>

          <div class="mt-8">
            <InputLabel for="status" value="Status" />

            <DropdownA
              id="status"
              :items="data.statusChoices"
              v-model="form.status"
              class="mt-1 block"
            />

            <InputError class="mt-2" :message="form.errors.status" />
          </div>

          <div class="mt-8">
            <InputLabel for="founded" value="Founded" />

            <TextInput
              id="founded"
              type="number"
              v-model="form.founded"
              class="mt-1 block"
              required
              min="1900"
              max="2025"
            />

            <InputError class="mt-2" :message="form.errors.founded" />
          </div>
        </section>
        <section class="bg-blue-200 p-8">
          <div>
            <InputLabel for="email" value="Email" />

            <TextInput
              id="email"
              type="email"
              v-model="form.email"
              class="mt-1 block"
              required
            />

            <InputError class="mt-2" :message="form.errors.email" />
          </div>

          <div class="mt-8">
            <InputLabel for="phone" value="Phone" />

            <TextInput
              id="phone"
              type="text"
              v-model="form.phone"
              class="mt-1 block"
              required
            />

            <InputError class="mt-2" :message="form.errors.phone" />
          </div>

          <div class="mt-8">
            <InputLabel for="website" value="Website" />

            <TextInput
              id="website"
              type="text"
              v-model="form.website"
              class="mt-1 block"
              required
            />

            <InputError class="mt-2" :message="form.errors.website" />
          </div>


        </section>
      </div>
      <section class="bg-green-200 p-8">
        <div>
          <InputLabel for="description" value="Description" />

          <TextArea
            id="description"
            v-model="form.description"
            class="mt-1 block w-full"
          />

          <InputError class="mt-2" :message="form.errors.description" />
        </div>
      </section>
      <section class="bg-gray-200 p-8">
        <fieldset class="sm:col-span-2">
          <legend class="block text-sm font-medium text-gray-700">Number of employees</legend>
          <div class="mt-4 grid grid-cols-1 gap-y-4">
            <div v-for="size in data.sizeChoices" class="flex items-center">
              <input :id="`size-${size.value}`" :name="size" :value="size.value" type="radio" v-model="form.size" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-500" />
              <label :for="`size-${size.value}`" class="ml-3">
                <span class="block text-sm text-gray-700">{{ size.label }}</span>
              </label>
            </div>
          </div>
        </fieldset>
      </section>
      <div>
        <PrimaryButton type="submit" class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
          Save
        </PrimaryButton>
      </div>
    </form>
  </AppLayout>
</template>