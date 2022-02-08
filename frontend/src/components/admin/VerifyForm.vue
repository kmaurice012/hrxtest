<template>
  <v-container>
    <v-card-text class="green white--text text-h6">
          <span class="text-uppercase">{{ userCompany.company }}</span> - {{ complianceDetails.title }} -  for the period {{ compliancePeriod }}</v-card-text
        >
    <v-card class="ma-2">
      <v-row no-gutters>
        
      </v-row>
      <v-row class="ml-6">
        <v-col cols="4">
          <v-card class="pa-2 mt-2">
            <p class="text-h6">Compliance Details</p>
            <p class="font-weight-medium">
              <span class="font-weight-black">Title: </span
              >{{ complianceDetails.title }}
            </p>
            <p class="font-weight-medium">
              <span class="font-weight-black">Serial No: </span
              >{{ complianceDetails.serial_number }}
            </p>
            <p class="font-weight-medium">
              <span class="font-weight-black">Code: </span
              >{{ complianceDetails.code }}
            </p>
            <p class="font-weight-medium">
              <span class="font-weight-black">Due Date: </span
              >{{ complianceDetails.date }}
            </p>
            <p class="text-h6">Company Details</p>
            <p class="font-weight-medium">
              <span class="font-weight-black">Company: </span
              >{{ userCompany.company }}
            </p>
            <p class="font-weight-medium">
              <span class="font-weight-black">Submitted Date: </span
              >{{ userCompany.complied_date }}
            </p>
            <p class="font-weight-medium">
              <span class="font-weight-black">File: </span
              >{{ userCompany.file }}
              <v-tooltip right>
                <template v-slot:activator="{ on, attrs }">
                  <v-btn
                    v-bind="attrs"
                    v-on="on"
                    class="cursor-pointer"
                    large
                    icon
                    color="red"
                  >
                    <v-icon
                  class="mt-2 mb-2"
                  v-bind:color="
                    userCompany.file_type == 'mdi-file-pdf-box' ? 'red' : 'blue'
                  "
                  large
                  @click="viewFile()"
                  >{{ userCompany.file_type }}</v-icon
                ></v-btn
                  >
                </template>
                <span>View File</span>
              </v-tooltip>
            </p>
          </v-card>
        </v-col>
        <v-col cols="6" class="mb-10">
          <v-text-field label="Reasons" name="name" textarea></v-text-field>

<v-spacer></v-spacer>
<v-spacer></v-spacer>
          <v-btn
            class="ml-10 mr-2 pa-4"
            color="success"
            dark
            large
            @click="upload"
          >
            <v-icon right dark class="" >mdi-checkbox-marked-circle</v-icon>
            <v-text primary-title class="pa-2 text-subtitle-2"> Verify </v-text>
          </v-btn>
          <v-btn class="mr-2 pa-4" color="blue" dark large @click="requestInfo()">
            <v-icon right dark class="">mdi-information</v-icon>
            <v-text primary-title class="pa-2 text-subtitle-2"> Request Info </v-text>
          </v-btn>
          <v-btn class="mr-2 pa-4" color="error" dark large @click="upload">
            <v-icon right dark class="">mdi-close-octagon</v-icon>
            <v-text primary-title class="pa-2 text-subtitle-2"> Reject </v-text>
          </v-btn>
        </v-col>
        <v-col cols="6" class="mb-10"> </v-col>
      </v-row>
    </v-card>
  </v-container>
</template>
<script>
import { validationMixin } from "vuelidate";
import { required, maxLength, email } from "vuelidate/lib/validators";

export default {
  mixins: [validationMixin],
  validations: {
    name: { required, maxLength: maxLength(10) },
    email: { required, email },
    select: { required },
    checkbox: { required },
  },
  data: () => ({
    name: "",
    email: "",
    select: null,
    items: ["Item 1", "Item 2", "Item 3", "Item 4"],
    checkbox: false,
    compliances: [
      {
        id: 184,
        code:'NSE03',
        frequency: 'Daily',
        serial_number: 'Serial.03',
        title: "Listing Rules",
        date: "28-Jan-2022 17:00",
        details: "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis enim lobortis scelerisque fermentum. Sagittis nisl rhoncus mattis rhoncus urna neque viverra. Eu tincidunt tortor aliquam nulla facilisi cras fermentum odio eu. Purus in massa tempor nec feugiat nisl pretium fusce. Id neque aliquam vestibulum morbi blandit cursus risus. "
      },
      {
        id: 185,
        code:'NSE02',
        frequency: 'Quarterly',
        serial_number: 'Serial.02',
        title: "Late Submission of Audited Annual Accounts",
        date: "31-Jan-2022 15:00",
        details: "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis enim lobortis scelerisque fermentum. Sagittis nisl rhoncus mattis rhoncus urna neque viverra. Eu tincidunt tortor aliquam nulla facilisi cras fermentum odio eu. Purus in massa tempor nec feugiat nisl pretium fusce. Id neque aliquam vestibulum morbi blandit cursus risus. "
      },
      {
        id: 186,
        code:'NSE01',
        frequency: 'Bi-Annually',
        serial_number: 'Serial.01',
        title: "Annual financial statements",
        date: "12-Feb-2022 23:59",
        details: "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis enim lobortis scelerisque fermentum. Sagittis nisl rhoncus mattis rhoncus urna neque viverra. Eu tincidunt tortor aliquam nulla facilisi cras fermentum odio eu. Purus in massa tempor nec feugiat nisl pretium fusce. Id neque aliquam vestibulum morbi blandit cursus risus. "
      },
      {
        id: 187,
        code:'NSE04',
        frequency: 'Weekly',
        serial_number: 'Serial.04',
        title: "Trading hours",
        date: "28-Mar-2022 23:59",
        details: "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis enim lobortis scelerisque fermentum. Sagittis nisl rhoncus mattis rhoncus urna neque viverra. Eu tincidunt tortor aliquam nulla facilisi cras fermentum odio eu. Purus in massa tempor nec feugiat nisl pretium fusce. Id neque aliquam vestibulum morbi blandit cursus risus. "
      },
    ],
    userCompliances: [
      {
        id: 1,
        company: "Kenya Airways Ltd.",
        complied_date: "01-Jan-2022 12:40",
        file: "Listing Rules_KQ.pdf",
        file_type: "mdi-file-pdf-box",
        status: "Complied",
        color: "green darken-3 font-weight-bold",
      },
      {
        id: 2,
        company: "Safaricom Plc.",
        complied_date: "12-Jan-2022 23:59",
        file: "Listing_Rules_Safaricom.docx",
        file_type: "mdi-file-word",
        status: "Rejected",
        color: "red darken-3 font-weight-bold",
      },
      {
        id: 3,
        company: "Kenya Power & Lighting Plc.",
        complied_date: "09-Jan-2022 23:59",
        file: "Listing Rules_Kenya_Power.pdf",
        file_type: "mdi-file-pdf-box",
        status: "Complied",
        color: "green darken-3 font-weight-bold",
      },
      {
        id: 4,
        company: "Nation Media Group Plc.",
        complied_date: '10-Feb-2022 13:25',
        file: "Listing Rules_Nation.docx",
        file_type: "mdi-file-word",
        status: "Complied Late",
        color: "blue darken-3 font-weight-bold",
      },
      {
        id: 5,
        company: "Equity Group Holdings Plc.",
        complied_date: null,
        file: null,
        file_type: "mdi-file-word",
        status: "Not Complied",
        color: "blue darken-3 font-weight-bold",
      },
      {
        id: 6,
        company: "Diamond Trust Bank Kenya Ltd",
        complied_date: null,
        file: null,
        file_type: null,
        status: "Not Complied",
        color: "blue darken-3 font-weight-bold",
      },
      {
        id: 7,
        company: "Stanbic Holdings Ltd.",
        complied_date: null,
        file: null,
        file_type: "mdi-file-word",
        status: "Not Complied",
        color: "blue darken-3 font-weight-bold",
      },
      {
        id: 8,
        company: "Sasini Plc.",
        complied_date: "05-Jan-2022 23:59",
        file: null,
        file_type: "mdi-file-word",
        status: "Complied",
        color: "green darken-3 font-weight-bold",
      },
    ],
    complianceDetails: "",
    compliancePeriod: "",
    userCompany: "",
  }),
  computed: {
    checkboxErrors() {
      const errors = [];
      if (!this.v.checkbox.dirty) return errors;
      !this.v.checkbox.required && errors.push("You must agree to continue!");
      return errors;
    },
    selectErrors() {
      const errors = [];
      if (!this.v.select.dirty) return errors;
      !this.v.select.required && errors.push("Item is required");
      return errors;
    },
    nameErrors() {
      const errors = [];
      if (!this.v.name.dirty) return errors;
      !this.v.name.maxLength &&
        errors.push("Name must be at most 10 characters long");
      !this.v.name.required && errors.push("Name is required.");
      return errors;
    },
    emailErrors() {
      const errors = [];
      if (!this.v.email.dirty) return errors;
      !this.v.email.email && errors.push("Must be valid e-mail");
      !this.v.email.required && errors.push("E-mail is required");
      return errors;
    },
  },
  methods: {
    submit() {
      this.v.touch();
    },
    clear() {
      this.v.reset();
      this.name = "";
      this.email = "";
      this.select = null;
      this.checkbox = false;
    },
    getComplianceDetails() {
      this.complianceDetails = this.compliances.find(
        (element) => element.id == this.$route.params.id
      );
      this.compliancePeriod = localStorage.getItem("compliance_period");
      this.userCompany = this.userCompliances.find(
        (element) =>
          element.id == localStorage.getItem("company_id")
      );
    },
    viewFile() {
      this.$router.push(`/admin/dashboard/view-file`);
    },
    requestInfo() {
      this.$router.push(`/admin/dashboard/request-info-conversation`);
    }
  },
  mounted() {
    this.getComplianceDetails();
  },
};
</script>
