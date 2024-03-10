<template>
    <div class="max-w-4xl mx-auto py-8">
      <h1 class="text-2xl font-bold mb-4">Students</h1>
      <ul class="mb-4">
        <li v-for="student in students" :key="student.id" class="border-b border-gray-200 py-2 flex justify-between items-center">
          <span>{{ student.username }} - {{ student.email }}</span>
          <div>
            <InertiaLink :href="`/students/${student.id}`" class="text-blue-500 hover:text-blue-700 mr-2">View</InertiaLink>
            <button @click="deleteStudent(student.id)" class="text-red-500 hover:text-red-700">Delete</button>
          </div>
        </li>
      </ul>
      <button @click="showModal = true" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add New Student</button>
      <AddStudentModal :is-visible="showModal" @close="showModal = false" @studentAdded="handleStudentAdded" />
    </div>
  </template>
  
  <script>
  import { InertiaLink } from '@inertiajs/inertia-vue3';
  import { Inertia } from '@inertiajs/inertia';
  import AddStudentModal from '@/Components/AddStudentModal.vue'; // Ensure path is correct
  
  export default {
    components: {
      InertiaLink,
      AddStudentModal
    },
    data() {
      return {
        showModal: false,
        students: [], // Assume this will be fetched or passed as a prop
      };
    },
    methods: {
      deleteStudent(id) {
        if (confirm('Are you sure you want to delete this student?')) {
          Inertia.delete(`/students/${id}`, {
            onSuccess: () => {
              // Optionally refresh the list or remove the student from the local list
            }
          });
        }
      },
      handleStudentAdded() {
        this.showModal = false;
        // Refresh the students list here if needed
      }
    }
  };
  </script>
  