<script>
import axios from "axios";
import * as chartConfig from "@/components/Charts/chart.config.js";
import LineChart from "@/components/Charts/LineChart.vue";
import SectionMain from "@/components/SectionMain.vue";
import CardBoxWidget from "@/components/CardBoxWidget.vue";
import CardBox from "@/components/CardBox.vue";
import TableSampleClients from "@/components/TableSampleClients.vue";
import NotificationBar from "@/components/NotificationBar.vue";
import BaseButton from "@/components/BaseButton.vue";
import CardBoxTransaction from "@/components/CardBoxTransaction.vue";
import CardBoxClient from "@/components/CardBoxClient.vue";
import LayoutAuthenticated from "@/layouts/LayoutAuthenticated.vue";

export default {
  data() {
    return {
      courses: [],
    };
  },
  components: {
    LayoutAuthenticated,
    SectionMain,
    CardBoxWidget,
  },

  methods: {
    async getCousers() {
      axios
        .get("https://localhost:8080/api/courses")
        .then((response) => {
          // Almacenar los datos de la respuesta en el array "items"
          this.courses = response.data;
        })
        .catch((error) => {
          console.error("Error al obtener los datos:", error);
        });
    },
  },
  mounted() {
    this.getCousers();
  },
};
</script>

<template>
  <LayoutAuthenticated>
    <SectionMain>
      <div
        v-for="course in courses"
        :key="course.id"
        class="grid grid-cols-1 gap-6 lg:grid-cols-3 mb-6"
      >
        <CardBoxWidget
          trend="12%"
          trend-type="up"
          color="text-emerald-500"
          :icon="mdiAccountMultiple"
          :number="512"
          label="course.name"
        />
      </div>
    </SectionMain>
  </LayoutAuthenticated>
</template>
