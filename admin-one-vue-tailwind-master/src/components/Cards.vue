<template>
    <div class="bg-white rounded-lg p-4 shadow-lg">
      <!-- Contenido de la tarjeta -->
      <div class="text-xl font-bold mb-2">{{ title }}</div>
      <div class="text-gray-700">{{ content }}</div>
    </div>
</template>
  
  <script>
  export default {
    props: {
      title: {
        type: String,
        required: true
      },
      content: {
        type: String,
        required: true
      }
    }
  };
  </script>
  
  <style scoped>
  /* Estilos específicos de esta tarjeta, si es necesario */
  </style>
  