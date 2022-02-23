<template>
  <v-container>
    <v-card-title primary-title class="text-h4 green--text">
      {{ complianceType }} Compliance Period

      <v-spacer></v-spacer>
      <v-tooltip left>
        <template v-slot:activator="{ on, attrs }">
          <v-btn
            v-bind="attrs"
            v-on="on"
            class="cursor-pointer"
            large
            icon
            color="red"
          >
            <v-icon @click="openReports()"> mdi-file-chart</v-icon></v-btn
          >
        </template>
        <span>View Reports</span>
      </v-tooltip>
    </v-card-title>
    <v-data-table
      :headers="headers"
      :items="userCompliances"
      :single-expand="singleExpand"
      :expanded.sync="expanded"
      class="elevation-1"
    >
      <template v-slot:[`item.actions`]="{ item }">
        <v-btn
          v-bind="attrs"
          v-on="on"
          :color="item.color + ' white--text'"
          @click="showComplianceCompanies(item.id, item.period, item.due_date)"
        >
          <p class="ma-4">{{ item.status }}</p>
        </v-btn>
      </template>
      <!-- <template v-slot:expanded-item="{ headers, item }">
        <td :colspan="headers.length" class="">
          {{ item.file
          }}<v-icon
            class="mt-2 mb-2"
            v-bind:color="item.file_type == 'mdi-file-pdf-box' ? 'red' : 'blue'"
            large
            >{{ item.file_type }}</v-icon
          >
        </td>
      </template> -->
    </v-data-table>
  </v-container>
</template>
<script>
export default {
  data: () => ({
    expanded: [],
    // singleExpand: false,
    headers: [
      {
        text: "period",
        value: "period",
        class: "font-weight-bold green white--text text-uppercase",
      },
      {
        text: "due date",
        value: "due_date",
        class: "font-weight-bold green white--text text-uppercase",
      },
      //   {
      //     text: "compiled on",
      //     value: "complied_date",
      //     class: "font-weight-bold green white--text text-uppercase",
      //   },
      {
        text: "actions",
        value: "actions",
        class: " pa-18 mr-8 font-weight-bold green white--text text-uppercase",
        width: "5%",
      },
    ],
    userCompliances: [
      {
        id: 1,
        period: "2022-01",
        due_date: "2022-01-10",
        status: "View Companies",
        color: "blue darken-3 font-weight-bold",
      },
      {
        id: 2,
        period: "2022-02",
        due_date: "2022-02-10",
        status: "View Companies",
        color: "blue darken-3 font-weight-bold",
      },
      {
        id: 3,
        period: "2022-03",
        due_date: "2022-03-10",
        status: "View Companies",
        color: "blue darken-3 font-weight-bold",
      },
      {
        id: 4,
        period: "2022-04",
        due_date: "2022-04-10",
        status: "View Companies",
        color: "blue darken-3 font-weight-bold",
      },
      {
        id: 5,
        period: "2022-05",
        due_date: "2022-05-10",
        status: "View Companies",
        color: "blue darken-3 font-weight-bold",
      },
      {
        id: 6,
        period: "2022-06",
        due_date: "2022-06-10",
        status: "View Companies",
        color: "blue darken-3 font-weight-bold",
      },
      {
        id: 7,
        period: "2022-07",
        due_date: "2022-07-10",
        status: "View Companies",
        color: "blue darken-3 font-weight-bold",
      },
      {
        id: 8,
        period: "2022-08",
        due_date: "2022-08-10",
        status: "View Companies",
        color: "blue darken-3 font-weight-bold",
      },
      {
        id: 9,
        period: "2022-09",
        due_date: "2022-09-10",
        status: "View Companies",
        color: "blue darken-3 font-weight-bold",
      },
      {
        id: 10,
        period: "2022-10",
        due_date: "2022-10-10",
        status: "View Companies",
        color: "blue darken-3 font-weight-bold",
      },
      {
        id: 11,
        period: "2022-11",
        due_date: "2022-11-10",
        status: "View Companies",
        color: "blue darken-3 font-weight-bold",
      },
      {
        id: 12,
        period: "2022-12",
        due_date: "2022-12-10",
        status: "View Companies",
        color: "blue darken-3 font-weight-bold",
      },
    ],
    complianceType: "",
    complianceId: "",
  }),
  methods: {
    getComplianceType() {
      this.complianceType = localStorage.getItem("compliance_type");
      this.complianceId = localStorage.getItem("compliance_id_form");
      console.log(this.complianceType);
    },
    showComplianceCompanies(id, period, due_date) {
      localStorage.setItem("compliance_period", period);
      localStorage.setItem("compliance_due_date", due_date);
      localStorage.setItem("compliance_id", this.complianceId);
      this.complianceType = localStorage.setItem("compliance_period", period);
      this.$router.push(`/admin/dashboard/compliance_companies/`);
      return true;
    },

    openReports() {
      this.$router.push(`/admin/dashboard/user-report`);
    },
  },
  mounted() {
    this.getComplianceType();
  },
};
</script>
