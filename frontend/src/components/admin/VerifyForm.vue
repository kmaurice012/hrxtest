<template>
  <v-container>
    <v-card-title primary-title class="text-h6 font-weight-bold mt-4 mb-6">
      <span class="green--text"> Verify Compliance for: &nbsp;</span
      >{{ compliancePeriod }}
    </v-card-title>
    <v-card class="ma-2">
      <v-row no-gutters>
        <v-card-text class="green white--text text-h6">
          Compliance Code Details</v-card-text
        >
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
              <span class="font-weight-black">Complied Date: </span
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
                  @onlick="test()"
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
            <v-icon right dark class="">mdi-clipboard-check</v-icon>
            <v-text primary-title class="pa-2 text-subtitle-2"> Verify </v-text>
          </v-btn>
          <v-btn class="mr-2 pa-4" color="blue" dark large @click="upload">
            <v-icon right dark class="">mdi-clipboard-check</v-icon>
            <v-text primary-title class="pa-2 text-subtitle-2"> Request Info </v-text>
          </v-btn>
          <v-btn class="mr-2 pa-4" color="error" dark large @click="upload">
            <v-icon right dark class="">mdi-clipboard-check</v-icon>
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
        date: "2022-01-28",
        details: "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis enim lobortis scelerisque fermentum. Sagittis nisl rhoncus mattis rhoncus urna neque viverra. Eu tincidunt tortor aliquam nulla facilisi cras fermentum odio eu. Purus in massa tempor nec feugiat nisl pretium fusce. Id neque aliquam vestibulum morbi blandit cursus risus. "
      },
      {
        id: 185,
        code:'NSE02',
        frequency: 'Quarterly',
        serial_number: 'Serial.02',
        title: "Late Submission of Audited Annual Accounts",
        date: "2022-01-31",
        details: "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis enim lobortis scelerisque fermentum. Sagittis nisl rhoncus mattis rhoncus urna neque viverra. Eu tincidunt tortor aliquam nulla facilisi cras fermentum odio eu. Purus in massa tempor nec feugiat nisl pretium fusce. Id neque aliquam vestibulum morbi blandit cursus risus. "
      },
      {
        id: 186,
        code:'NSE01',
        frequency: 'Bi-Annually',
        serial_number: 'Serial.01',
        title: "Annual financial statements",
        date: "2022-02-12",
        details: "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis enim lobortis scelerisque fermentum. Sagittis nisl rhoncus mattis rhoncus urna neque viverra. Eu tincidunt tortor aliquam nulla facilisi cras fermentum odio eu. Purus in massa tempor nec feugiat nisl pretium fusce. Id neque aliquam vestibulum morbi blandit cursus risus. "
      },
      {
        id: 187,
        code:'NSE04',
        frequency: 'Weekly',
        serial_number: 'Serial.04',
        title: "Trading hours",
        date: "2022-03-28",
        details: "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis enim lobortis scelerisque fermentum. Sagittis nisl rhoncus mattis rhoncus urna neque viverra. Eu tincidunt tortor aliquam nulla facilisi cras fermentum odio eu. Purus in massa tempor nec feugiat nisl pretium fusce. Id neque aliquam vestibulum morbi blandit cursus risus. "
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
        complied_date: null,
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
  },
  mounted() {
    this.getComplianceDetails();
  },
};
</script>
