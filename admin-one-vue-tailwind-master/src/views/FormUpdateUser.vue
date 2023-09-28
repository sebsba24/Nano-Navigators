<script setup>
import { reactive } from "vue";
import { useRouter } from "vue-router";
import { mdiAccount, mdiAsterisk } from "@mdi/js";
import LayoutGuest from "@/layouts/LayoutGuest.vue";
import SectionFullScreen from "@/components/SectionFullScreen.vue";
import CardBox from "@/components/CardBox.vue";
import FormField from "@/components/FormField.vue";
import FormControl from "@/components/FormControl.vue";
import BaseButton from "@/components/BaseButton.vue";
import BaseButtons from "@/components/BaseButtons.vue";

const form = reactive({
  nombres: "",
  apellidos: "",
  email: "",
  identificacion: "",
  telefono: "",
  contraseña: "",
  estado: true,
});

const router = useRouter();

const submit = () => {
  router.push("/dashboard");
};
</script>

<template>
  <LayoutGuest>
    <SectionFullScreen v-slot="{ cardClass }" bg="purplePink">
      <CardBox :class="cardClass" is-form @submit.prevent="submit">
        <FormField label="Nombre(s)">
          <FormControl
            v-model="form.nombres"
            :icon="mdiAccount"
            name="nombres"
          />
        </FormField>

        <FormField label="Apellido(s)">
          <FormControl v-model="form.apellidos" name="apellidos" />
        </FormField>

        <FormField label="Email">
          <FormControl v-model="form.email" name="email" />
        </FormField>

        <FormField label="Identificación">
          <FormControl v-model="form.identificacion" name="identificacion" />
        </FormField>

        <FormField label="Teléfono">
          <FormControl v-model="form.telefono" name="telefono" />
        </FormField>

        <FormField label="Contraseña">
          <FormControl
            v-model="form.contraseña"
            type="password"
            name="contraseña"
          />
        </FormField>

        <template #footer>
          <BaseButtons>
            <BaseButton type="submit" color="info" label="Actualizar" />
            <BaseButton to="/tables" color="info" outline label="Volver" />
          </BaseButtons>
        </template>
      </CardBox>
    </SectionFullScreen>
  </LayoutGuest>
</template>
