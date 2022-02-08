<template>
  <v-container>
    <div class="d-flex">
    <v-card-title primary-title class="green text-h4 white--text">
        <span class="text-uppercase">{{ companyName }}</span> -
        {{ complianceTitle }} </v-card-title>
        <v-card-title class="green text-h6 white--text"> Jan-2022 to Feb-2022
      <!-- {{ complianceTitle }} for the period between Jan-2022 to Feb-2022 -->

    </v-card-title>
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
      </div>
      <br>
    <v-data-table
      :headers="headers"
      :items="userCompliances"
      :single-expand="singleExpand"
      :expanded.sync="expanded"
      show-expand
      class="elevation-1"
    >
      <template v-slot:[`item.status`]="{ item }">
        <!-- <v-btn
          v-bind="attrs"
          v-on="on"
          :color="item.color + ' white--text'"
          @click="
            item.status === 'Not Complied' ? verifyForm(item) : null
          "
        > -->
        <v-card-text :class="item.color + ' white--text pa-2 ma-4'"
          >{{ item.status }}
        </v-card-text>
        <!-- <p class="ma-4">{{ item.status }}</p>
        </v-btn> -->
      </template>
      <template v-slot:[`item.actions`]="{ item }">
        <v-btn
          v-if="item.status === 'Not Complied' || item.status === 'Complied Late'"
          v-bind="attrs"
          v-on="on"
          color="red darken-3 white--text"
          @click="
            item.status === 'Not Complied' || item.status === 'Complied Late' ? verifyForm(item.period) : null
          "
        >
          <p class="ma-4 font-weight-black">Verify</p>
        </v-btn>
      </template>
      <template v-slot:expanded-item="{ headers, item }">
        <td :colspan="headers.length" class="">
          {{ item.file }}
          <v-btn icon color="success" @click="viewFile()"
            ><v-icon
              class="mt-2 mb-2"
              v-bind:color="
                item.file_type == 'mdi-file-pdf-box' ? 'red' : 'blue'
              "
              large
              >{{ item.file_type }}</v-icon
            ></v-btn
          >

          <v-icon right>mdi-information-outline</v-icon>
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
        text: "status",
        value: "status",
        class: " font-weight-bold green white--text text-uppercase",
      },
      {
        text: "actions",
        value: "actions",
        class: " pa-18 mr-8 font-weight-bold green white--text text-uppercase",
        width: "5%",
      },
      {
        text: "",
        value: "data-table-expand",
        class: "font-weight-bold green white--text text-uppercase",
      },
    ],
    userCompliances: [
      {
        id: 1,
        period: "Jan-2022",
        due_date: "04-Jan-2022 16:00",
        complied_date: "04-Jan-2022 15:01",
        file: "Trading_hours_Jan.pdf",
        file_type: "mdi-file-pdf-box",
        status: "Complied",
        color: "green darken-3 font-weight-bold",
      },
      {
        id: 2,
        period: "Jan-2022",
        due_date: "11-Jan-2022 18:00",
        complied_date: "25-Jan-2022 17:25",
        file: "Listing Trading_hours_Jan.docx",
        file_type: "mdi-file-word",
        status: "Rejected",
        color: "red darken-3 font-weight-bold",
      },
      {
        id: 3,
        period: "Jan-2022",
        due_date: "18-Jan-2022 17:30",
        complied_date: null,
        file: "Listing Trading_hours_Jan.docx",
        file_type: "mdi-file-word",
        status: "Not Complied",
        color: "blue darken-3 font-weight-bold",
      },
      {
        id: 4,
        period: "Jan-2022",
        due_date: "25-Jan-2022 18:00",
        complied_date: "26-Jan-2022 15:25",
        file: "Listing Trading_hours_Jan.docx",
        file_type: "mdi-file-word",
        status: "Complied Late",
        color: "yellow darken-3 font-weight-bold",
      },
      {
        id: 5,
        period: "Feb-2022",
        due_date: "01-Feb-2022 18:07",
        complied_date: null,
        file: null,
        status: "Not Complied",
        color: "blue darken-3 font-weight-bold",
      },
      {
        id: 6,
        period: "Feb-2022",
        due_date: "08-Feb-2022 17:00",
        complied_date: "08-Jan-2022 16:25",
        file: "Listing Trading_hours_Jan.docx",
        file_type: "mdi-file-word",
        status: "Not Complied",
        color: "blue darken-3 font-weight-bold",
      },
      // {
      //   id: 7,
      //   period: "Jan-2022",
      //   due_date: "25-Jan-2022",
      //   complied_date: "25-Jan-2022",
      //   file: null,
      //   status: "Not Complied",
      //   color: "blue darken-3 font-weight-bold",
      // },
      // {
      //   id: 8,
      //   period: "Jan-2022",
      //   due_date: "25-Jan-2022",
      //   complied_date: "25-Jan-2022",
      //   file: null,
      //   status: "Not Complied",
      //   color: "blue darken-3 font-weight-bold",
      // },
      // {
      //   id: 9,
      //   period: "Jan-2022",
      //   due_date: "25-Jan-2022",
      //   complied_date: "25-Jan-2022",
      //   file: null,
      //   status: "Not Complied",
      //   color: "blue darken-3 font-weight-bold",
      // },
      // {
      //   id: 10,
      //   period: "Jan-2022",
      //   due_date: "25-Jan-2022",
      //   complied_date: "25-Jan-2022",
      //   file: null,
      //   status: "Not Complied",
      //   color: "blue darken-3 font-weight-bold",
      // },
      // {
      //   id: 11,
      //   period: "Jan-2022",
      //   due_date: "25-Jan-2022",
      //   complied_date: "25-Jan-2022",
      //   file: null,
      //   status: "Not Complied",
      //   color: "blue darken-3 font-weight-bold",
      // },
    ],
    complianceTitle: "",
    complianceId: "",
    companyName: "",
  }),
  methods: {
    getComplianceType() {
      this.complianceTitle = localStorage.getItem("compliance_code_title");
      this.companyName = localStorage.getItem("company_name");
    },
    // complyForm(period) {
    //   localStorage.setItem("compliance_period", period);
    //   this.$router.push(`/admin/dashboard/comply/` + this.complianceId);
    //   return true;
    // },

    openReports() {
      this.$router.push(`/admin/dashboard/user-report`);
    },
    verifyForm(period) {
      this.$router.push(
        `/admin/dashboard/verify-compliance/` +
          localStorage.getItem("compliance_id_form")
      );
      localStorage.setItem("compliance_period", period);
    },
    viewFile() {
      this.$router.push(`/admin/dashboard/view-file`);
    },
  },
  mounted() {
    this.getComplianceType();
  },
};
</script>
