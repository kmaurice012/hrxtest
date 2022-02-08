<template>
  <v-card class="ma-2 mt-8">
    <v-card-title
      primary-title
      class="green font-weight bold white--text text-h4"
    >
      Add a Company
    </v-card-title>
    <form class="ma-8">
      <v-text-field
        label="Company Name"
        v-model="name"
        :counter="10"
        required
      ></v-text-field>
      <v-text-field
        label="Join Date"
        v-model="primary_color"
        required
      ></v-text-field>
     <!-- radio -->
     <v-radio-group  v-model="selects">
     <v-radio color="green" label="All Codes" v-model="all" @change="all=!codeselects" value="all"></v-radio>
     <v-radio color="green" label="Select Codes" v-model="select" value="select"></v-radio>
       
     </v-radio-group>
       <v-checkbox class="ml-12" v-for="code in codes" :key="code" :label="code" v-model="codeselects" value="value"></v-checkbox>
       <!-- "Listing Rules",
      "Late Submission of Audited Annual Accounts",
      "Annual financial statements",
      "Trading hours", -->
<!-- radio -->
<!-- select codes -->
<!-- checkbox -->
      <div class="d-flex">
        <v-btn class="green white--text mb-4 mr-10">submit</v-btn>
        <v-btn class="red white--text mb-4">clear</v-btn>
      </div>
    </form>
  </v-card>
</template>

<script>
export default {
  data: () => ({
    name: "",
    primary_color: "",
    secondary1: "",
    secondary2: "",
    secondary3: "",
    codes: [
      "Listing Rules",
      "Late Submission of Audited Annual Accounts",
      "Annual financial statements",
      "Trading hours",
    ],
  }),
};
</script>
