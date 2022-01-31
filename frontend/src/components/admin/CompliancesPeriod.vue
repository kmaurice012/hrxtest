<template>
  <v-container>
    <v-card-title primary-title class="text-h4 green--text">
      {{ complianceType }}

      <v-spacer></v-spacer>
      <v-tooltip left>
        <template v-slot:activator="{ on, attrs }">
          <v-btn v-bind="attrs" v-on="on" class="cursor-pointer" large icon color="red">
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
      show-expand
      class="elevation-1"
    >
      <template v-slot:[`item.actions`]="{ item }">
        <v-btn
          v-bind="attrs"
          v-on="on"
          :color="item.color + ' white--text'"
          @click="
            item.status === 'Not Complied' ? complyForm(item.period) : null
          "
        >
          <p class="ma-4">{{ item.status }}</p>
        </v-btn>
      </template>
      <template v-slot:expanded-item="{ headers, item }">
        <td :colspan="headers.length" class="">
          {{ item.file
          }}<v-icon
            class="mt-2 mb-2"
            v-bind:color="item.file_type == 'mdi-file-pdf-box' ? 'red' : 'blue'"
            large
            >{{ item.file_type }}</v-icon
          >
        </td>
      </template>
    </v-data-table>
  </v-container>
</template>
<script>
export default {
  data: () => ({
    expanded: [],
    singleExpand: false,
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
      {
        text: "compiled on",
        value: "complied_date",
        class: "font-weight-bold green white--text text-uppercase",
      },
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
        due_date: "2022-01-28",
        complied_date: "2022-01-25",
        file: "Listing Rules.pdf",
        file_type: "mdi-file-pdf-box",
        status: "Complied",
        color: "green darken-3 font-weight-bold",
      },
      {
        id: 2,
        period: "2022-02",
        due_date: "2022-01-05",
        complied_date: "2022-01-25",
        file: "Listing Rules.docx",
        file_type: "mdi-file-word",
        status: "Rejected",
        color: "red darken-3 font-weight-bold",
      },
      {
        id: 3,
        period: "2022-01",
        due_date: null,
        complied_date: null,
        file: null,
        status: "Not Complied",
        color: "blue darken-3 font-weight-bold",
      },
      {
        id: 4,
        period: "2022-01",
        due_date: "2022-01-25",
        complied_date: "2022-01-25",
        file: null,
        status: "Not Complied",
        color: "blue darken-3 font-weight-bold",
      },
      {
        id: 5,
        period: "2022-01",
        due_date: null,
        complied_date: null,
        file: null,
        status: "Not Complied",
        color: "blue darken-3 font-weight-bold",
      },
      {
        id: 6,
        period: "2022-01",
        due_date: null,
        complied_date: null,
        file: null,
        status: "Not Complied",
        color: "blue darken-3 font-weight-bold",
      },
      {
        id: 7,
        period: "2022-01",
        due_date: "2022-01-25",
        complied_date: "2022-01-25",
        file: null,
        status: "Not Complied",
        color: "blue darken-3 font-weight-bold",
      },
      {
        id: 8,
        period: "2022-01",
        due_date: "2022-01-25",
        complied_date: "2022-01-25",
        file: null,
        status: "Not Complied",
        color: "blue darken-3 font-weight-bold",
      },
      {
        id: 9,
        period: "2022-01",
        due_date: "2022-01-25",
        complied_date: "2022-01-25",
        file: null,
        status: "Not Complied",
        color: "blue darken-3 font-weight-bold",
      },
      {
        id: 10,
        period: "2022-01",
        due_date: "2022-01-25",
        complied_date: "2022-01-25",
        file: null,
        status: "Not Complied",
        color: "blue darken-3 font-weight-bold",
      },
      {
        id: 11,
        period: "2022-01",
        due_date: "2022-01-25",
        complied_date: "2022-01-25",
        file: null,
        status: "Not Complied",
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
    complyForm(period) {
      localStorage.setItem("compliance_period", period);
      this.$router.push(`/admin/dashboard/comply/` + this.complianceId);
      return true;
    },

    openReports() {
      this.$router.push(`/admin/dashboard/user-report`);
    }
  },
  mounted() {
    this.getComplianceType();
  },
};
</script>
