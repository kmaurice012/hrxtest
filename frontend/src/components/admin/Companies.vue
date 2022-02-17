<template>
  <v-container>
    <div class="d-flex">
      <v-card-title
        primary-title
        class="text-h4 #303b4b--text"
        style="color: #303b4b"
      >
        List of Companies
      </v-card-title>
      <v-spacer></v-spacer>
      <v-dialog v-model="dialog" max-width="700px" >
        <template v-slot:activator="{ on, attrs }">
          <v-btn color="green" dark v-bind="attrs" v-on="on">
            Create Company
            <v-icon class="ml-2" color="white">mdi-plus-box</v-icon>
          </v-btn>
          <v-spacer></v-spacer>
        </template>
        <v-spacer></v-spacer>
        <CreateComp :method="close" />
      </v-dialog>
    </div>
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
import CreateComp from "../admin/CreateCompany.vue";
  let userCompliances = JSON.parse(sessionStorage.userCompliances);
export default {
  components: {
    CreateComp,
  },
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
        text: "actions",
        value: "actions",
        class: " pa-18 mr-2 font-weight-bold green white--text text-uppercase",
        width: "5%",
      },
    ],
    userCompliances,
    complianceType: "",
    complianceId: "",
    compliancePeriod: "",
    complianceDue: "",
  }),
  methods: {
    // getComplianceDetails() {
    //   this.complianceType = localStorage.getItem("compliance_type");
    //   this.complianceId = localStorage.getItem("compliance_id");
    //   this.compliancePeriod = localStorage.getItem("compliance_period");
    //   this.complianceDue = localStorage.getItem("compliance_due_date");
    // //   console.log(this.complianceType);
    // },
    // verifyForm(company) {
    //   localStorage.setItem("compliance_user_company", company);
    //   this.$router.push(`/admin/dashboard/verify-compliance/` + this.complianceId);
    //   return true;
    // },

    // openReports() {
    //   this.$router.push(`/admin/dashboard/user-report`);
    // }
    viewCompanyCodes(id, company_name) {
      localStorage.setItem("company_id", id);
      localStorage.setItem("company_name", company_name);
      this.$router.push(`/admin/dashboard/company_codes/` + id);
    },
    createCompany() {
      this.$router.push(`/admin/dashboard/companies/create`);
    },
     close(dialog){
       console.log( this.dialog);
      return this.dialog = dialog;

    },
  },

  mounted() {
    // this.getComplianceDetails();
  },
};
</script>
