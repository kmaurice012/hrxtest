<template>
  <v-card class="overflow-x-hidden">
    <v-card-title
      primary-title
      class="
        green
        font-weight
        bold
        white--text
        text-h4
        d-flex
        flex-row
        justify-space-between
      "
    >
      <div>Add a Company</div>
      <div>
        <v-btn class="mx-2" small fab dark color="white" @click="method(false)">
          <v-icon dark small color="green"> mdi-close</v-icon>
        </v-btn>
      </div>
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
      <v-radio-group v-model="selects">
        <v-radio color="green" label="All Codes" value="all"></v-radio>
        <v-radio color="green" label="Select Codes" value="select"></v-radio>
      </v-radio-group>
      <v-card v-if="selects != '' && selects != 'all'">
        <v-checkbox
          class="ml-12"
          v-for="code in codes"
          :key="code.id"
          :label="code.name"
          @click="addCodeSelects(code.id)"
        ></v-checkbox>
      </v-card>

      <!-- "Listing Rules",
      "Late Submission of Audited Annual Accounts",
      "Annual financial statements",
      "Trading hours", -->
      <!-- radio -->
      <!-- select codes -->
      <!-- checkbox -->
      <div class="mt-6 d-flex">
        <v-btn class="green white--text mb-4 mr-10">submit</v-btn>
        <v-btn class="red white--text mb-4">clear</v-btn>
        <v-btn
          class="blue white--text mb-4"
          style="margin-left: 24px"
          text
         
        >
          Close
        </v-btn>
      </div>
    </form>
  </v-card>
</template>
<script>
export default {
  name: "createComp",
    props: {
    method: { type: Function },
  },

  data: () => ({
    name: "",
    primary_color: "",
    secondary1: "",
    secondary2: "",
    secondary3: "",
    codes: [
      {
        id: 1,
        name: "Listing Rules",
      },
      {
        id: 2,
        name: "Late Submission of Audited Annual Accounts",
      },
      {
        id: 3,
        name: "Annual financial statements",
      },
      {
        id: 4,
        name: "Trading hours",
      },
    ],
    selects: "",
    codeselects: [],
  }),
  methods: {
    /**
     * Add checkbox values elese delete
     */

    addCodeSelects(id) {
      if (!this.codeselects.find((element) => element == id)) {
        this.codeselects.push(id);
      } else {
        let index = this.codeselects.indexOf(id);
        this.codeselects.splice(index, 1);
      }
      console.log(this.selects);
    },
  },
};
</script>
