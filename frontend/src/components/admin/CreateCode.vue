<template>
  <v-card class="ma-2 mt-8">
    <v-card-title
      primary-title
      class="green font-weight-bold white--text text-h4"
    >
      Add Code
    </v-card-title>
    <form class="ma-8">
      <v-text-field
        label="Code"
        v-model="code"
        :counter="10"
        required
      ></v-text-field>
      <v-text-field
        label="Serial No"
        v-model="serial_no"
        required
      ></v-text-field>
      <v-text-field
        label="Description"
        v-model="description"
        required
      ></v-text-field>
      <!-- <v-text-field
        label="Secondary color "
        v-model="email"
        required
      ></v-text-field> -->
      <!-- <v-color-picker
  dot-size="25"
  swatches-max-height="200"
></v-color-picker> -->
      <v-select
        label="Select Frequency"
        v-model="select"
        :items="frequency"
        required
      ></v-select>
      <template>
          <v-card-text class="font-weight-bold mt-4 mb-4">
              Choose Date Due
          </v-card-text>
        <v-row>
          <v-date-picker v-model="picker"></v-date-picker>
        </v-row>
      </template>
      <v-text-field
        label="Code Details"
        v-model="code_details"
        textarea
        multi-line
      ></v-text-field>
      <div class="d-flex">
        <v-btn class="green white--text mb-4 mr-10">save code</v-btn>
        <v-btn class="red white--text mb-4">clear</v-btn>
      </div>
    </form>
  </v-card>
</template>

<script>
export default {
  data: () => ({
    code: "",
    serial_no: "",
    description: "",
    code_details: "",
    frequency: [
      "Daily",
      "Weekly",
      "Monthly",
      "Quarterly",
      "Bi-Annually",
      "Annually",
    ],
    picker: ''
  }),
};
</script>
