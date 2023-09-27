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

const selectOptions = [
  { id: 1, label: "Business development" },
  { id: 2, label: "Marketing" },
  { id: 3, label: "Sales" },
];

const form = reactive({
  name: "John Doe",
  email: "john.doe@example.com",
  phone: "",
  department: selectOptions[0],
  subject: "",
  question: "",
});

const customElementsForm = reactive({
  checkbox: ["lorem"],
  radio: "one",
  switch: ["one"],
  file: null,
});

const submit = () => {
  //
};

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
        <div class="flex flex-wrap items-center">
          <div class="w-1/4">
            <img src="ruta_de_la_imagen.jpg" alt="Imagen" />
          </div>
          
          <!-- Caja de contenido -->
          <div class="w-3/4 p-4">
            <FormField label="Profesor Responsable">
              <FormControl v-model="form.profesorResponsable" :icon="mdiAccount"/>
            </FormField>

            <FormField label="Nombre">
              <FormControl v-model="form.nombre" :icon="mdiAccount"/>
            </FormField>

            <FormField label="Descripción">
              <FormControl type="textarea" v-model="form.descripcion" />
            </FormField>

            <FormField label="Fecha de Habilitación">
              <FormControl type="date" v-model="form.fechaHabilitacion" />
            </FormField>

            <FormField label="Fecha de Terminación">
              <FormControl type="date" v-model="form.fechaTerminacion" />
            </FormField>

            <div class="flex justify-between mt-4">
              <BaseButton type="submit" color="info" label="Confirmar" />
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