<template>
  <v-container>
    <v-card-title
      primary-title
      class=" text-h6 font-weight-bold mt-4 mb-6"
    >
       <span class=" green--text"> Submit Compliance for: &nbsp;</span>{{compliancePeriod}}
    </v-card-title>
    <v-card class="ma-2">
      <v-row no-gutters>
        <v-card-text class="green white--text text-h6"> Compliance Code Details</v-card-text>
      </v-row>
      <v-row class="ml-6" >
          <v-col cols="4">
              <v-card class="pa-2 mt-2">
                  <p class="text-h6">
                  Compliance Details
              </p>
              <p class="font-weight-medium"><span class="font-weight-black">Title: </span>{{complianceDetails.title}}</p>
              <p class="font-weight-medium"><span class="font-weight-black">Serial No: </span>{{complianceDetails.serial_number}}</p>
              <p class="font-weight-medium"><span class="font-weight-black">Code: </span>{{complianceDetails.code}}</p>
              </v-card>
              
          </v-col>
        <v-col cols="6" class="mb-10">
          <v-text-field
            name="compliance_details"
            label="Compliance Details"
          ></v-text-field>
          <v-text-field label="Comments" name="name" textarea></v-text-field>
          <v-file-input
            show-size
            label="File input"
            @change="selectFile"
          ></v-file-input>
          <v-btn class="pa-4" color="success" dark small @click="upload">
            <v-text primary-title class=" pa-2 text-subtitle-2"> Upload </v-text>
            <v-icon right dark  class="ml-2">mdi-cloud-upload</v-icon>
          </v-btn>
        </v-col>
        <v-col cols="6" class="mb-10">
          
        </v-col>
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
        details: "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis enim lobortis scelerisque fermentum. Sagittis nisl rhoncus mattis rhoncus urna neque viverra. Eu tincidunt tortor aliquam nulla facilisi cras fermentum odio eu. Purus in massa tempor nec feugiat nisl pretium fusce. Id neque aliquam vestibulum morbi blandit cursus risus. "
      },
      {
        id: 185,
        code:'NSE02',
        frequency: 'Quarterly',
        serial_number: 'Serial.02',
        title: "Late Submission of Audited Annual Accounts",
        details: "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis enim lobortis scelerisque fermentum. Sagittis nisl rhoncus mattis rhoncus urna neque viverra. Eu tincidunt tortor aliquam nulla facilisi cras fermentum odio eu. Purus in massa tempor nec feugiat nisl pretium fusce. Id neque aliquam vestibulum morbi blandit cursus risus. "
      },
      {
        id: 186,
        code:'NSE01',
        frequency: 'Bi-Annually',
        serial_number: 'Serial.01',
        title: "Annual financial statements",
        details: "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis enim lobortis scelerisque fermentum. Sagittis nisl rhoncus mattis rhoncus urna neque viverra. Eu tincidunt tortor aliquam nulla facilisi cras fermentum odio eu. Purus in massa tempor nec feugiat nisl pretium fusce. Id neque aliquam vestibulum morbi blandit cursus risus. "
      },
      {
        id: 187,
        code:'NSE04',
        frequency: 'Weekly',
        serial_number: 'Serial.04',
        title: "Trading hours",
        details: "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis enim lobortis scelerisque fermentum. Sagittis nisl rhoncus mattis rhoncus urna neque viverra. Eu tincidunt tortor aliquam nulla facilisi cras fermentum odio eu. Purus in massa tempor nec feugiat nisl pretium fusce. Id neque aliquam vestibulum morbi blandit cursus risus. "
      },
    ],
    complianceDetails: "",
    compliancePeriod: ""
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
         this.complianceDetails = this.compliances.find(element => element.id == this.$route.params.id);
        this.compliancePeriod = localStorage.getItem("compliance_period")
      }
  },
  mounted() {
      this.getComplianceDetails()
  }
};
</script>
