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
import CardBoxWidgetCourseRegister from "@/components/CardBoxWidgetCourseRegister.vue";

export default {
  data() {
    return {
      courseId: null, // Para almacenar el ID del curso
      course: null,
    };
  },
  components: {
    LayoutAuthenticated,
    SectionMain,
    CardBoxWidget,
    CardBox,
    CardBoxWidgetCourseRegister,
  },
  created() {
    this.courseId = parseInt(this.$route.params.id); // Accede al ID del curso desde la URL
    this.getCourse(this.courseId);
  },
  methods: {
    getCourse(courseId) {
      axios
        .get(`http://localhost:8000/api/course/${courseId}`)
        .then((response) => {
          // Almacenar la información del curso en el objeto "course"
          this.course = response.data.data;
        })
        .catch((error) => {
          console.error("Error al obtener los datos del curso:", error);
        });
    },
  },
};
</script>

<template>
  <LayoutAuthenticated>
    <SectionMain>
      <CardBox>
        <div class="d-flex justify-center">
          <CardBoxWidgetCourseRegister
            trend="12%"
            trend-type="up"
            color="text-emerald-500"
            :icon="mdiAccountMultiple"
            :number="512"
            :label="course ? course.name : 'Nombre del Curso'"
          />
        </div>
      </CardBox>
    </SectionMain>
  </LayoutAuthenticated>
</template>
