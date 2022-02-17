<template>
  <v-card class=" overflow-x-hidden  overflow-y-hidden" style="height: 850px">
    <v-card-title
      primary-title
      class="green font-weight-bold white--text text-h4  d-flex flex-row justify-space-between"
    >
    <div>
  Add Code
    </div>
    <div>
  <v-btn class="mx-2" small fab dark  color="white" @click="method(false)">
        <v-icon dark small color="green" > mdi-close</v-icon>
      </v-btn>
    </div>
    
    </v-card-title>
    <form class="ma-8 dbox">
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

      <v-select
        label="Select Frequency"
        v-model="select"
        :items="frequency"
        required
      ></v-select>

      <v-card-text class="font-weight-bold mt-4 mb-4">
        Choose Date Due
      </v-card-text>
      <div style="display: flex">
        <v-row>
          <v-col cols="12" sm="6" class="my-2 px-1" >
            <v-date-picker v-model="picker"  full-width></v-date-picker>
          </v-col>
        </v-row>
        <v-col cols="12" sm="6" class="my-2 px-1">
          <div>
            <v-text-field
              label="Code Details"
              v-model="code_details"
              textarea
              multi-line
            ></v-text-field>

            <div class="d-flex" style="margin-top: 170px;">
              <v-btn class="green white--text mb-4 mr-10">save code</v-btn>
              <v-btn class="red white--text mb-4">clear</v-btn>
              <v-btn class="blue white--text mb-4" style="margin-left: 24px" text @click="method(false)">
                Close
              </v-btn>
            </div>
             
          </div>
        </v-col>
      </div>
    </form>
  </v-card>
</template>

<script>
export default {
  name: "build",
  props: {
    method: { type: Function },
  },
  data: () => ({
    dialog: false,
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
    picker: "",
  }),
};
</script>
<style>
/* Hide scrollbar for Chrome, Safari and Opera */
.dbox::-webkit-scrollbar {
  display: none !important;
}

/* Hide scrollbar for IE, Edge and Firefox */
.dbox {
  -ms-overflow-style: none !important; /* IE and Edge */
  scrollbar-width: none !important; /* Firefox */
}
</style>
