<script setup>
import { reactive, ref } from "vue";
import { mdiBallotOutline, mdiAccount, mdiMail, mdiGithub } from "@mdi/js";
import SectionMain from "@/components/SectionMain.vue";
import CardBox from "@/components/CardBox.vue";
import FormCheckRadioGroup from "@/components/FormCheckRadioGroup.vue";
import FormFilePicker from "@/components/FormFilePicker.vue";
import FormField from "@/components/FormField.vue";
import FormControl from "@/components/FormControl.vue";
import BaseDivider from "@/components/BaseDivider.vue";
import BaseButton from "@/components/BaseButton.vue";
import BaseButtons from "@/components/BaseButtons.vue";
import SectionTitle from "@/components/SectionTitle.vue";
import LayoutAuthenticated from "@/layouts/LayoutAuthenticated.vue";
import SectionTitleLineWithButton from "@/components/SectionTitleLineWithButton.vue";
import NotificationBarInCard from "@/components/NotificationBarInCard.vue";
import axios from "axios";
import Swal from 'sweetalert2';

const title = ref('');

// const selectOptions = [
//   { id: 1, label: "Business development" },
//   { id: 2, label: "Marketing" },
//   { id: 3, label: "Sales" },
// ];

const form = reactive({
  name: "",
  description: "",
  enabled_date: "",
  end_date: "",
  progress: "0",
  user_id: "",
});

const customElementsForm = reactive({
  checkbox: ["lorem"],
  radio: "one",
  switch: ["one"],
  file: null,
});

const successMessage = ref('');

// Define el método submit utilizando la Composition API
async function submit() {
  try {
    // Realiza la solicitud para guardar la información del formulario
    const response = await axios.post('http://localhost:8000/api/user', form); // Reemplaza formData con los datos del formulario

    // Verifica si la solicitud se completó exitosamente
    if (response.status === 200) {
      successMessage.value = 'Categoría creada'; // Asigna el mensaje de éxito
      showSuccessMessage(); // Muestra el mensaje de éxito
    }
  } catch (error) {
    console.error('Error al guardar los datos:', error);
  }
}

// Define una función para mostrar el mensaje de éxito
function showSuccessMessage() {
  Swal.fire({ title: successMessage.value, icon: 'success', confirmButtonText: 'Listo' });
}

const formStatusWithHeader = ref(true);

const formStatusCurrent = ref(0);

const formStatusOptions = ["info", "success", "danger", "warning"];

const formStatusSubmit = () => {
  formStatusCurrent.value = formStatusOptions[formStatusCurrent.value + 1]
    ? formStatusCurrent.value + 1
    : 0;
};
</script>

<template>
  <LayoutAuthenticated>
    <SectionMain>
      <SectionTitleLineWithButton
        :icon="mdiBallotOutline"
        title="Crear curso"
        main
      >
      </SectionTitleLineWithButton>

      <CardBox form @submit.prevent="submit">
        <!-- Imagen a la izquierda -->
        <div class="d-flex items-center">
          
          <!-- Caja de contenido -->
          <div class="wp-4">

            <FormField label="Nombre del Curso">
              <FormControl v-model="form.name" :icon="mdiAccount"/>
            </FormField>

            <FormField label="Descripción">
              <FormControl type="textarea" v-model="form.description" />
            </FormField>

            <FormField label="Fecha de Habilitación">
              <FormControl type="date" v-model="form.enabled_date" />
            </FormField>

            <FormField label="Fecha de Terminación">
              <FormControl type="date" v-model="form.end_date" />
            </FormField>

            <div class="flex justify-between mt-4">
              <BaseButton type="submit" color="info" label="Confirmar" @click="submit"/>
              <BaseButton type="button" color="info" outline label="Cancelar" @click="cancel" />
            </div>
          </div>
        </div>
      </CardBox>
    </SectionMain>
  </LayoutAuthenticated>
</template>

<script>
export default {
  data() {
    return {
      form: {
        profesorResponsable: '',
        nombre: '',
        descripcion: '',
        fechaCreacion: '',
        fechaHabilitacion: '',
        fechaTerminacion: '',
        estado: true, // Estado predeterminado en true
      },
    };
  },
  methods: {
    submit() {
      // Aquí puedes manejar la lógica para enviar el formulario
    },
    cancel() {
      // Aquí puedes manejar la cancelación del formulario
    },
  },
};
</script>