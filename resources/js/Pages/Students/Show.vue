<template>
    <div>
      <h1>Student Detail</h1>
      <p>Username: {{ student.username }}</p>
      <p>Email: {{ student.email }}</p>
      <InertiaLink href="/students">Back to list</InertiaLink>
    </div>
  </template>
  
  <script>
  import { InertiaLink } from '@inertiajs/inertia-vue3';
  
  export default {
    props: {
      student: Object,
    },
    components: {
      InertiaLink,
    },
  };
  </script>
  