<template>
  <v-container>
    <div class="d-flex">
      <v-card-title
        primary-title
        class="text-h4 #303b4b--text"
        style="color: #303b4b"
      >
        List of Frequencies
      </v-card-title>
      <v-spacer></v-spacer>
      <v-dialog v-model="dialog" max-width="700px" max-height="950px">
        <template v-slot:activator="{ on, attrs }">
          <v-btn color="green" dark v-bind="attrs" v-on="on">
            Create Frequency
            <v-icon class="ml-2" color="white">mdi-plus-box</v-icon>
          </v-btn>
          <v-spacer></v-spacer>
        </template>
        <v-spacer></v-spacer>

        <Freq :method="closeDialog" />
      </v-dialog>
    </div>
    <v-data-table
      :headers="headers"
      :items="frequencies"
      :single-expand="singleExpand"
      :expanded.sync="expanded"
      class="elevation-1"
    >
      <template v-slot:[`item.actions`]="{ item }">
        <v-btn
          v-bind="attrs"
          v-on="on"
          color="green white--text'"
          @click="viewCompanyCodes(item.id, item.company)"
        >
          <p class="ma-4 white--text">View Company Codes</p>
        </v-btn>
      </template>
    </v-data-table>
  </v-container>
</template>
<script>
import Freq from "../admin/CreateFrequency.vue";
import { mapState } from "vuex"
export default {
  components: {
  Freq,
  },
  data: () => ({
    expanded: [],
    singleExpand: false,
    headers: [
      {
        text: "Frequencies",
        value: "frequency",
        class: "font-weight-bold green white--text text-uppercase",
      },
      {
        text: "unit",
        value: "unit",
        class: " pa-18 mr-2 font-weight-bold green white--text text-uppercase",
        width: "5%",
      },
      {
        text: "quantity",
        value: "qty",
        class: " pa-18 mr-2 font-weight-bold green white--text text-uppercase",
        width: "5%",
      },
    ],
  }),
  created() {
    this.$store.dispatch("fetchFrequencies");
  },
  computed: mapState(["frequencies"]),

  mounted() {
    // this.getComplianceDetails();
  },
};
</script>
