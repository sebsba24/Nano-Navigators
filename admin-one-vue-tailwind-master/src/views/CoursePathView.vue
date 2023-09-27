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
};
</script>

<template>
  <LayoutAuthenticated>
    <SectionMain> </SectionMain>
  </LayoutAuthenticated>
</template>
