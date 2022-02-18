<template>
  <v-card class="ma-4">
    <div class="d-flex">
        <v-card-title primary-title class="text-h4 #303b4b--text">
        List of Codes
      </v-card-title>
      <v-spacer></v-spacer>
      <v-dialog v-model="dialog" max-width="1400px" max-height="950px">
        <template v-slot:activator="{ on, attrs }">
          <v-btn color="green" dark v-bind="attrs" v-on="on">
            Create Code
            <v-icon class="ml-2" color="white">mdi-plus-box</v-icon>
          </v-btn>
          <v-spacer></v-spacer>
        </template>
        <v-spacer></v-spacer>

        <Build :method="closeDialog" />
      </v-dialog>
    </div>
    <v-data-table
      :headers="headers"
      :items= compliances
      :loading="loading"
      style="margin-top: 10px"
    >
     <v-icon small >delete</v-icon>
   
    </v-data-table>
  </v-card>
</template>
<script>
import { mapState } from "vuex";
import Build from "../admin/CreateCode.vue";
export default {
  components: {
    Build,
  },
  data: () => ({
    dialog: false,
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
      // {
      //   text: "actions",
      //   value: "actions",
      //   class: "font-weight-bold green white--text text-uppercase",
      // },
    ],

    loading: true,
    company_name: "",
    todayDate: "",
  }),
  created() {
    this.$store.dispatch("fetchCompliances");
  },
  computed: mapState(["compliances"]),
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
    closeDialog(dialog) {
      return (this.dialog = dialog);
    },
    // viewCompliances(title, id) {
    //   localStorage.setItem("compliance_code_title", title);
    //   localStorage.setItem("compliance_id_form", id);
    //   this.$router.push(`/admin/dashboard/compliance_period`);
    // },
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
    },
  },
  mounted() {
    this.loading = false;
    // this.company_name = localStorage.getItem("company_name");
    this.setDate();
  },
  // created() {},
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