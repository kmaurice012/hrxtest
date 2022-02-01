<template>
  <v-container>
    <v-card-title primary-title class="text-h4 green--text">
      {{ complianceType }} Companies

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
            item.status === 'Not Complied' ? verifyForm(item.id) : null
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
        text: "company name",
        value: "company",
        class: "font-weight-bold green white--text text-uppercase",
      },
      {
        text: "date complied",
        value: "complied_date",
        class: "font-weight-bold green white--text text-uppercase",
      },
    //   {
    //     text: "status",
    //     value: "'status'",
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
        company: "STL",
        complied_date: "2022-01-02",
        file: "Listing Rules_STL.pdf",
        file_type: "mdi-file-pdf-box",
        status: "Complied",
        color: "green darken-3 font-weight-bold",
      },
      {
        id: 2,
        company: "Safaricom",
        complied_date: "2022-01-12",
        file: "Listing Rules_Safaricom.docx",
        file_type: "mdi-file-word",
        status: "Rejected",
        color: "red darken-3 font-weight-bold",
      },
      {
        id: 3,
        company: "Equity",
        complied_date: "2022-01-09",
        file: "Listing Rules_Equity.pdf",
        file_type: "mdi-file-pdf-box",
        status: "Complied",
        color: "green darken-3 font-weight-bold",
      },
      {
        id: 4,
        company: "Cytonn",
        complied_date: "2022-01-11",
        file: "Listing Rules_Cytonn.docx",
        file_type: "mdi-file-word",
        status: "Not Complied",
        color: "blue darken-3 font-weight-bold",
      },
      {
        id: 5,
        company: "MTN",
        complied_date: null,
        file: "Listing Rules_MTN.docx",
        file_type: "mdi-file-word",
        status: "Not Complied",
        color: "blue darken-3 font-weight-bold",
      },
      {
        id: 6,
        company: "Airtel",
        complied_date: null,
        file: null,
        file_type: null,
        status: "Not Complied",
        color: "blue darken-3 font-weight-bold",
      },
      {
        id: 7,
        company: "Standard Group",
        complied_date: null,
        file: "Listing Rules_Standard.docx",
        file_type: "mdi-file-word",
        status: "Not Complied",
        color: "blue darken-3 font-weight-bold",
      },
      {
        id: 8,
        company: "UAP",
        complied_date: "2022-01-05",
        file: "ListingRules_UAP.docx",
        file_type: "mdi-file-word",
        status: "Complied",
        color: "green darken-3 font-weight-bold",
      },
      
    ],
    complianceType: "",
    complianceId: "",
    compliancePeriod: "",
    complianceDue: "",
  }),
  methods: {
    getComplianceDetails() {
      this.complianceType = localStorage.getItem("compliance_type");
      this.complianceId = localStorage.getItem("compliance_id");
      this.compliancePeriod = localStorage.getItem("compliance_period");
      this.complianceDue = localStorage.getItem("compliance_due_date");
    //   console.log(this.complianceType);
    },
    verifyForm(company) {
      localStorage.setItem("compliance_user_company", company);
      this.$router.push(`/admin/dashboard/verify-compliance/` + this.complianceId);
      return true;
    },

    openReports() {
      this.$router.push(`/admin/dashboard/user-report`);
    }
  },
  mounted() {
    this.getComplianceDetails();
  },
};
</script>
