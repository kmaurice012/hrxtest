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
      <v-dialog v-model="dialog" max-width="900px" max-height="950px">
        <template v-slot:activator="{ on, attrs }">
          <v-btn color="green" dark v-bind="attrs" v-on="on">
            Create Company
            <v-icon class="ml-2" color="white">mdi-plus-box</v-icon>
          </v-btn>
        </template>
        <CreateComp :method="closeDialog" />
      </v-dialog>
    </div>
    <v-data-table
      :headers="headers"
      :items="organizations"
      :single-expand="singleExpand"
      :expanded.sync="expanded"
      class="elevation-1"
    >
      <template v-slot:[`item.actions`]="{ item }">
        <div style="display: flex; gap: 10px;">
          <v-btn
            v-bind="attrs"
            v-on="on"
            color="green white--text'"
            @click="viewCompanyCodes(item.id, item.organization)"
          >
            <p class="ma-4 white--text">
              <v-icon small @click="deleteItem(item)">
                mdi-open-in-app }
              </v-icon>
            </p>
          </v-btn>
          <v-btn
            v-bind="attrs"
            v-on="on"
            color="blue white--text'"
            
          >
            <p class="ma-4 white--text">
              <v-icon small @click="deleteItem(item)" color="white">
                mdi-pencil }
              </v-icon>
            </p>
          </v-btn>
             <v-btn
            v-bind="attrs"
            v-on="on"
            color="red white--'"
            
          >
            <p class="ma-4 white--text">
              <v-icon small @click="deleteItem(item)" color="white">
                 mdi-delete }
              </v-icon>
            </p>
          </v-btn>
        </div>
      </template>
    </v-data-table>
  </v-container>
</template>
<script>
import CreateComp from "../admin/CreateCompany.vue";
import { mapState } from "vuex";
export default {
  components: {
    CreateComp,
  },
  data: () => ({
    dialog: false,
     dialogDelete: false,
    expanded: [],
    singleExpand: false,
    headers: [
      {
        text: "company name",
        value: "organization_name",
        class: "font-weight-bold green white--text text-uppercase",
      },
        {
        text: "period name",
        value: `periods[0].period_name`,
        class: "font-weight-bold green white--text text-uppercase",
      },
        {
        text: "period start date",
        value: "periods[0].period_start_date",
        class: "font-weight-bold green white--text text-uppercase",
      },
         {
        text: "period end date",
        value: "periods[0].period_end_date",
        class: "font-weight-bold green white--text text-uppercase",
      },
      {
        text: "actions",
        value: "actions",
        class: " pa-18 mr-2 font-weight-bold green white--text text-uppercase",
        width: "5%",
      },
    ],
    complianceType: "",
    complianceId: "",
    compliancePeriod: "",
    complianceDue: "",
  }),
    computed: mapState(["organizations"]),
  created() {
    this.$store.dispatch("fetchOrganizations");
  },

  methods: {
    closeDialog() {
       this.dialog = false
    },
    //    createCompany() {
    //   this.$router.push(`/admin/dashboard/companies/create`);
    // },
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
    viewCompanyCodes(id,  organization_name) {
      localStorage.setItem(" organization_id", id);
      localStorage.setItem(" organization_name",  organization_name);
      this.$router.push(`/admin/dashboard/company_codes/` + id);
    },
  },


  mounted() {
    // this.getComplianceDetails();
  },
};
</script>
