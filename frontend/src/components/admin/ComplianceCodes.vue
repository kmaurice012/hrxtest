<template>
  <v-card class="ma-4">
    <div class="d-flex">
      <v-card-title primary-title class="text-h4 #303b4b--text">
        List of Codes
      </v-card-title>
      <v-spacer></v-spacer>
      <!-- <v-btn color="green" class="mt-6 white--text" @click="createCode()">
        Create Code
        <v-icon class="ml-2" color="white">mdi-plus-box</v-icon>
      </v-btn> -->
    </div>
    <v-data-table :headers="headers" :items="compliances" :loading="loading">
      <template v-slot:[`item.actions`]="{ item }">
        <v-btn
          v-bind="attrs"
          v-on="on"
          block
          color="red darken-3 white--text font-weight-bold mt-2"
          @click="viewCompliances(item.title, item.id)"
        >
          <!-- <v-icon large @click="submitCompliance(item.id)">mdi-file-plus</v-icon> -->
          <p class="ma-2">View Compliance</p>
        </v-btn>
      </template>
    </v-data-table>
  </v-card>
</template>
<script>
  let Compliances = JSON.parse(sessionStorage.compliance);
  console.log(Compliances,"compliancess");
export default {
  data: () => ({
    headers: [
      {
        text: "name",
        value: "title",
        class: "font-weight-bold green white--text text-uppercase",
      },
      {
        text: "compliance code",
        value: "code",
        class: "font-weight-bold green white--text text-uppercase",
      },
      {
        text: "frequency",
        value: "frequency",
        class: "font-weight-bold green white--text text-uppercase",
      },
      {
        text: "serial number",
        value: "serial_number",
        class: "font-weight-bold green white--text text-uppercase",
      },
      {
        text: "date due",
        value: "date",
        class: "font-weight-bold green white--text text-uppercase",
        width: "15%",
      },
      {
        text: "complied",
        value: "complied",
        class: "font-weight-bold green white--text text-uppercase",
      },
      {
        text: "not complied",
        value: "not_complied",
        class: "font-weight-bold green white--text text-uppercase",
      },
      {
        text: "actions",
        value: "actions",
        class: "font-weight-bold green white--text text-uppercase",
      },
    ],
    Compliances,
    loading: true,
    company_name: "",
    todayDate: "",
  }),
  methods: {
    trimText: function (text) {
      return text.subtring(0, 100);
    },
    // showCompanies(type,id) {
    //   localStorage.setItem("compliance_type", type)
    //   localStorage.setItem("compliance_id_form", id)
    //   this.$router.push(`/admin/dashboard/compliance_period`);
    //   return true;
    // },
    viewCompliances(title, id) {
      localStorage.setItem("compliance_code_title", title);
      localStorage.setItem("compliance_id_form", id);
      this.$router.push(`/admin/dashboard/compliance_period`);
    },
    setDate() {
      const date = new Date();
      let formatDate = date
        .toLocaleDateString("en-GB", {
          day: "2-digit",
          month: "short",
          year: "numeric",
        })
        .replace(/ /g, "-");

      this.compliances.find((element) => element.id == 184).date = formatDate;
    },

    createCode() {
      this.$router.push(`/admin/dashboard/codes/create`);
    }
  },
  mounted() {
    this.loading = false;
    // this.company_name = localStorage.getItem("company_name");
    this.setDate();
  },
  created() {},
};
</script>
