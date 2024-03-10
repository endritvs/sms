<template>
    <div v-if="isVisible" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full flex items-center justify-center">
      <div class="relative bg-white rounded-lg shadow">
        <button @click="closeModal" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center">
          <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
        </button>
        <div class="py-6 px-6 lg:px-8">
          <h3 class="mb-4 text-xl font-medium text-gray-900">Edit Student</h3>
          <form class="space-y-6" @submit.prevent="updateStudent">
            <div>
              <input v-model="editedStudent.username" type="text" placeholder="Username" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
            <div>
              <input v-model="editedStudent.email" type="email" placeholder="Email" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
            <div class="flex justify-end space-x-4">
              <button type="button" @click="closeModal" class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-700">Cancel</button>
              <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-700">Save</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </template>
  
  <script setup>
  import { ref, defineProps, defineEmits } from 'vue';
  import { Inertia } from '@inertiajs/inertia';
  import { router } from '@inertiajs/vue3';
  
  const props = defineProps(['isVisible', 'student']);
  const emit = defineEmits(['close']);
  
  const editedStudent = ref({
    username: props.student ? props.student.username : '',
    email: props.student ? props.student.email : ''
  });
  
  const updateStudent = async () => {
    try {
      await Inertia.put(`/students/${props.student.id}`, editedStudent.value);
      closeModal(); 
      router.get('/students');
    } catch (error) {
      console.error('Error updating student:', error);
    }
  };
  
  const closeModal = () => {
    emit('close'); 
    resetForm(); 
  };
  
  const resetForm = () => {
    editedStudent.value.username = '';
    editedStudent.value.email = '';
  };
  </script>
  