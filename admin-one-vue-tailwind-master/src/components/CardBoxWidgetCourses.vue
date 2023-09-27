<script setup>
import { mdiCog } from "@mdi/js";
import CardBox from "@/components/CardBox.vue";
import NumberDynamic from "@/components/NumberDynamic.vue";
import BaseIcon from "@/components/BaseIcon.vue";
import BaseLevel from "@/components/BaseLevel.vue";
import PillTagTrend from "@/components/PillTagTrend.vue";
import BaseButton from "@/components/BaseButton.vue";

const redirectToCourseDetail = (courseId) => {
  // Verifica que tengas un número válido (ID de curso)
  if (typeof courseId === "number" && courseId > 0) {
    // Usa el número (ID) para redirigir al usuario a la vista CourseDetailView
    router.push({ name: "CourseDetailView", params: { id: courseId } });
  } else {
    // Maneja el caso en el que el número no sea válido
    console.error("ID de curso no válido");
    // Puedes mostrar un mensaje de error o realizar otra acción adecuada aquí
  }
};

defineProps({
  courseId: {
    type: Number,
    default: 0,
  },
  progress: {
    type: Number,
    default: 0,
  },
  number: {
    type: Number,
    default: 0,
  },
  icon: {
    type: String,
    default: null,
  },
  prefix: {
    type: String,
    default: null,
  },
  suffix: {
    type: String,
    default: null,
  },
  label: {
    type: String,
    default: null,
  },
  color: {
    type: String,
    default: null,
  },
  trend: {
    type: String,
    default: null,
  },
  trendType: {
    type: String,
    default: null,
  },
});
</script>

<template>
  <CardBox>
    <BaseLevel v-if="trend" class="mb-3" mobile>
      <PillTagTrend :trend="trend" :trend-type="trendType" small />
      <BaseButton
        :icon="mdiCog"
        icon-w="w-4"
        icon-h="h-4"
        color="lightDark"
        small
      />
    </BaseLevel>
    <BaseLevel mobile>
      <div>
        <h3
          class="text-3xl leading-tight font-semibold text-gray-500 dark:text-slate-400"
        >
          {{ label }}
        </h3>
        <div class="relative pt-1">
          <div class="flex mb-2 items-center justify-between">
            <div>
              <span
                class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-emerald-600 bg-emerald-200"
              >
                Progreso
              </span>
            </div>
            <div class="text-right">
              <span class="text-xs font-semibold inline-block text-emerald-600">
                {{ progress }}%
              </span>
            </div>
          </div>
          <div
            class="flex w-full overflow-hidden h-2 mb-4 text-xs flex rounded bg-emerald-200"
          >
            <div
              :style="{ width: progress + '%' }"
              class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-emerald-500"
            ></div>
          </div>
        </div>
        <button @click="redirectToCourseDetail(courseId)">Ver más</button>
        <h1 class="text-3xl leading-tight font-semibold">
          <NumberDynamic :value="number" :prefix="prefix" :suffix="suffix" />
        </h1>
      </div>
      <BaseIcon
        v-if="icon"
        :path="icon"
        size="48"
        w=""
        h="h-16"
        :class="color"
      />
    </BaseLevel>
  </CardBox>
</template>
