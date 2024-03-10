<template>
  <Page>
    <div class="max-w-lg mx-auto mt-8 p-6 bg-white shadow-md rounded-lg">
      <h1 class="text-2xl font-bold mb-4">Student Detail</h1>
      <div class="mb-4">
        <p class="text-lg"><span class="font-bold">Id:</span> {{ student.id }}</p>
        <p class="text-lg"><span class="font-bold">Username:</span> {{ student.username }}</p>
        <p class="text-lg"><span class="font-bold">Email:</span> {{ student.email }}</p>
      </div>
      <Link href="/students" class="text-blue-500 hover:underline">Back to List</Link>
    </div>
  </Page>
</template>

<script setup>
import { defineProps } from 'vue';
import { Link } from '@inertiajs/vue3'
import Page from "../Layout/Index.vue"
const { student } = defineProps(['student']);

</script>
