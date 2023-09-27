<script setup>
import {
  mdiPlus,
  mdiTableBorder,
} from "@mdi/js";
import { computed, ref } from "vue";
import SectionMain from "@/components/SectionMain.vue";
import TableSampleClients from "@/components/TableSampleClients.vue";
import CardBox from "@/components/CardBox.vue";
import LayoutAuthenticated from "@/layouts/LayoutAuthenticated.vue";
import SectionTitleLineWithButton from "@/components/SectionTitleLineWithButton.vue";
import BaseButton from "@/components/BaseButton.vue";
import CardBoxModal from "@/components/CardBoxModal.vue";
import FormField from "@/components/FormField.vue";
import FormControl from "@/components/FormControl.vue";

const isModalRegisterActive = ref(false);
</script>

<template>
  <CardBoxModal form @submit.prevent="submit" v-model="isModalRegisterActive" title="Crear un usuario">  
    <div class="flex flex-wrap items-center">
      <div class="w-full">
        <FormField label="Nombre">
              <FormControl :icon="mdiAccount"/>
        </FormField>
      </div>      

      <div class="w-full">
        <FormField label="Apellido">
          <FormControl  :icon="mdiAccount"/>
        </FormField>
      </div>

      <div class="w-full">
        <FormField label="Correo">
          <FormControl  :icon="mdiAccount"/>
        </FormField>
      </div>

      <div class="w-full">
        <FormField label="Contraseña">
          <FormControl  :icon="mdiAccount"/>
        </FormField>
      </div>

      <div class="w-1/2 px-2">
        <FormField label="Identificacion">
          <FormControl  :icon="mdiAccount"/>
        </FormField>
      </div>

      <div class="w-1/2 px-2">
        <FormField label="Telefono">
          <FormControl  :icon="mdiAccount"/>
        </FormField>
      </div>

      <div class="w-full">
        <FormField label="Rol">
          <FormControl  :icon="mdiAccount"/>
        </FormField>
      </div>
    </div>    
  </CardBoxModal>

  <LayoutAuthenticated>
    <SectionMain>
      <SectionTitleLineWithButton :icon="mdiTableBorder" title="Tabla de usuarios" main >            
        <BaseButton
          color="info"
          :icon="mdiPlus"
          small
          @click="isModalRegisterActive = true"
        />
      </SectionTitleLineWithButton>

      <CardBox class="mb-6" has-table>
        <TableSampleClients checkable />
      </CardBox>

    </SectionMain>
  </LayoutAuthenticated>
</template>
