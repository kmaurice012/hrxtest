<template>
  <v-container>
    <v-row>
      <v-card width="100%" class="ma-4">
        <v-tabs color="primary" slider-color="primary">
          <v-tab ripple class="text-subtitle-1 font-weight-bold"> Calendar View </v-tab>
          <v-tab ripple class="text-subtitle-1 font-weight-bold"> List View </v-tab>
          <v-tab-item>
            <Calendar />
          </v-tab-item>
          <v-tab-item>
            <CompliancesList />
          </v-tab-item>
        </v-tabs>
        <!-- <Calendar /> -->
      </v-card>
    </v-row>
  </v-container>
</template>

<script>
import Calendar from "./Calendar.vue";
import CompliancesList from "./Compliances.vue";

export default {
  name: "Default",
  components: {
    Calendar,
    CompliancesList
  },
  data: () => ({}),
};
</script>
