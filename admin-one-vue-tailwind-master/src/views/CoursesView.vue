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
import CardBoxWidgetCourses from "@/components/CardBoxWidgetCourses.vue";

export default {
  data() {
    return {
      courses: [],
    };
  },
  components: {
    LayoutAuthenticated,
    SectionMain,
    CardBoxWidgetCourses,
  },

  methods: {
    async getCousers() {
      axios
        .get("http://localhost:8000/api/course")
        .then((response) => {
          // Store the data of the response in the array "items"
          this.courses = response.data.data;
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
      <div class="grid grid-cols-2 gap-6 lg:grid-cols-3 mb-6">
        <CardBoxWidgetCourses
          v-for="course in courses"
          :key="course.id"
          :trend="course.trend"
          :trend-type="course['trend-type']"
          :color="course.color"
          :icon="course.icon"
          :label="course.name"
          :progress="course.progress"
          :course-id="course.id"
        />
      </div>
    </SectionMain>
  </LayoutAuthenticated>
</template>
