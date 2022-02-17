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
   let userCompliance = JSON.parse(sessionStorage.userCompliance);
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
    userCompliance,
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
