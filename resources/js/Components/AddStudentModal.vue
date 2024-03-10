<template>
    <div class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full flex items-center justify-center">
      <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
        <button @click="closeModal" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white">
          <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
        </button>
        <div class="py-6 px-6 lg:px-8">
          <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Add New Student</h3>
          <form class="space-y-6" @submit.prevent="addStudent">
            <div>
              <input v-model="newStudent.username" type="text" placeholder="Username" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
              <p v-if="$page.props.errors.username" class="mt-2 text-sm text-red-600">{{$page.props.errors.username}}</p>
            </div>
            <div>
              <input v-model="newStudent.email" type="email" placeholder="Email" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
              <p v-if="$page.props.errors.email" class="mt-2 text-sm text-red-600">{{$page.props.errors.email}}</p>
            </div>
            <div class="flex justify-end space-x-4">
              <button type="button" @click="closeModal" class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-700">Cancel</button>
              <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-700">Create</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </template>
  
  <script>
  import { Inertia } from '@inertiajs/inertia'
  
  export default {
    data() {
      return {
        newStudent: {
          username: '',
          email: '',
        },
      };
    },
    methods: {
      addStudent() {
        Inertia.post('/students', this.newStudent, {
          preserveState: false,
          onSuccess: () => {
            this.$emit('close');
            this.resetForm();
          }
        });
      },
      closeModal() {
        this.$emit('close');
        this.resetForm();
      },
      resetForm() {
        this.newStudent = { username: '', email: '' };
      }
    },
  };
  </script>
  