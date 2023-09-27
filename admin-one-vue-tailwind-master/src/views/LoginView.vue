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

const form = reactive({
  login: "john.doe",
  pass: "highly-secure-password-fYjUw-",
});

const router = useRouter();

const submit = () => {
  router.push("/dashboard");
};

const goToRegistration = () => {
  // Redirige a la ruta de registro
  window.location.href =
    "http://localhost:5173/admin-one-vue-tailwind/#/registeruser";
};
</script>

<template>
  <LayoutGuest>
    <SectionFullScreen v-slot="{ cardClass }" bg="purplePink">
      <CardBox :class="cardClass" is-form @submit.prevent="submit">
            <div>
              <FormField label="Correo electronico" help="Por favor ingrese su correo electronico">
                <FormControl
                  v-model="form.login"
                  :icon="mdiAccount"
                  name="login"
                  autocomplete="username"
                />
              </FormField>
            </div>
            <div>
              <!-- Botón de registro al lado del botón Login -->

          <!-- Campo de contraseña debajo del botón Registrarse -->
          <div>
            <FormField label="Contraseña" help="Por favor ingrese su contraseña">
              <FormControl
                v-model="form.pass"
                :icon="mdiAsterisk"
                type="password"
                name="password"
                autocomplete="current-password"
              />
            </FormField>
          </div>
        </div>

        <!-- Botón de inicio de sesión debajo del campo de contraseña -->
        <div class="mt-4 flex justify-between items-center">
          <button
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
          >
            Iniciar sesión
          </button>
          <!-- Agrega un espacio entre los botones usando clases de Tailwind CSS -->
          <div class="w-4"></div>
          <button
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
            @click="goToRegistration"
          >
            Registrarse
          </button>
        </div>
      </CardBox>
    </SectionFullScreen>
  </LayoutGuest>
</template>
