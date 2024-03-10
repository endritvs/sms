<template>
  <Page>
    <h1 class="text-2xl font-bold mb-4">Students</h1>
    <button @click="showModal = true" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4">
      Add New Student
    </button>
    <AddStudentModal :is-visible="showModal" @close="showModal = false" @studentAdded="handleStudentAdded" />
    <EditStudentModal v-if="selectedStudent" :is-visible="editModalVisible" @close="editModalVisible = false" :student="selectedStudent" />
    <table class="min-w-full divide-y divide-gray-200">
      <thead class="bg-gray-50">
        <tr>
          <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
            ID
          </th>
          <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
            Username
          </th>
          <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
            Email
          </th>
          <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
            Actions
          </th>
        </tr>
      </thead>
      <tbody class="bg-white divide-y divide-gray-200">
        <tr v-for="student in studentsData" :key="student.id">
          <td class="px-6 py-4 whitespace-nowrap">{{ student.id }}</td>
          <td class="px-6 py-4 whitespace-nowrap">{{ student.username }}</td>
          <td class="px-6 py-4 whitespace-nowrap">{{ student.email }}</td>
          <td class="px-6 py-4 whitespace-nowrap">
            <Link :href="`/students/${student.id}`" class="text-blue-500 hover:text-blue-700 mr-2">View</Link>
            <button @click="editStudent(student)" class="text-yellow-500 hover:text-yellow-600 mr-2">
              Edit
            </button>
            <button @click="deleteStudent(student.id)" class="text-red-500 hover:text-red-700">
              Delete
            </button>
          </td>
        </tr>
      </tbody>
    </table>
  </Page>
</template>

<script setup>
import { ref, defineProps } from "vue";
import { useForm } from "@inertiajs/inertia-vue3";
import AddStudentModal from "../../Components/AddStudentModal.vue";
import EditStudentModal from "../../Components/EditStudentModal.vue"; 
import { router, Link } from "@inertiajs/vue3";
import Page from "../Layout/Index.vue";

const showModal = ref(false);
const editModalVisible = ref(false); 
const selectedStudent = ref(null); 
const { students } = defineProps(["students"]);
const studentsData = ref(students);
const form = useForm({});

const deleteStudent = async (id) => {
  if (confirm("Are you sure you want to delete this student?")) {
    try {
      form.delete(`students/${id}`);
      getStudents();
    } catch (error) {
      console.error("Error deleting student:", error);
    }
  }
};

const editStudent = (student) => {
  if (student) {
    selectedStudent.value = student; 
    editModalVisible.value = true; 
  }
};

const getStudents = () => {
  router.get("/students");
};
</script>