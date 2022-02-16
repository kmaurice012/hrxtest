<template>
  <v-card class="ma-4" >
    <div class="d-flex">
      <v-spacer></v-spacer>
      <v-dialog v-model="dialog"  max-width="1400px" max-height="950px">
        <template v-slot:activator="{ on, attrs }">
          <v-btn color="green" dark v-bind="attrs" v-on="on">
            Create Code
            <v-icon class="ml-2" color="white">mdi-plus-box</v-icon>
          </v-btn>
          <v-spacer></v-spacer>
        </template>
             <v-spacer></v-spacer>

        <Build />
      </v-dialog>
    </div>
    <v-data-table :headers="headers" :items="compliances" :loading="loading" style="margin-top: 10px;">
      <!-- <template v-slot:[`item.actions`]="{ item }">
        <v-btn
          v-bind="attrs"
          v-on="on"
          block
          color="red darken-3 white--text font-weight-bold mt-2"
          @click="viewCompliances(item.title, item.id)"
        > -->
      <!-- <v-icon large @click="submitCompliance(item.id)">mdi-file-plus</v-icon> -->
      <!-- <p class="ma-2">View Compliance</p>
        </v-btn>
      </template> -->
    </v-data-table>
  </v-card>
</template>
<script>
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
    compliances: [
      {
        id: 184,
        code: "NSE03",
        frequency: "Daily",
        serial_number: "Serial.03",
        title: "Listing Rules",
        complied: "25%",
        not_complied: "75%",
        date: "",
        details:
          "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis enim lobortis scelerisque fermentum. Sagittis nisl rhoncus mattis rhoncus urna neque viverra. Eu tincidunt tortor aliquam nulla facilisi cras fermentum odio eu. Purus in massa tempor nec feugiat nisl pretium fusce. Id neque aliquam vestibulum morbi blandit cursus risus. ",
      },
      {
        id: 185,
        code: "NSE02",
        frequency: "Quarterly",
        serial_number: "Serial.02",
        title: "Late Submission of Audited Annual Accounts",
        complied: "10%",
        not_complied: "90%",
        date: "31-Jan-2022",
        details:
          "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis enim lobortis scelerisque fermentum. Sagittis nisl rhoncus mattis rhoncus urna neque viverra. Eu tincidunt tortor aliquam nulla facilisi cras fermentum odio eu. Purus in massa tempor nec feugiat nisl pretium fusce. Id neque aliquam vestibulum morbi blandit cursus risus. ",
      },
      {
        id: 186,
        code: "NSE01",
        frequency: "Bi-Annually",
        serial_number: "Serial.01",
        title: "Annual financial statements",
        complied: "40%",
        not_complied: "60%",
        date: "12-Feb-2022",
        details:
          "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis enim lobortis scelerisque fermentum. Sagittis nisl rhoncus mattis rhoncus urna neque viverra. Eu tincidunt tortor aliquam nulla facilisi cras fermentum odio eu. Purus in massa tempor nec feugiat nisl pretium fusce. Id neque aliquam vestibulum morbi blandit cursus risus. ",
      },
      {
        id: 187,
        code: "NSE04",
        frequency: "Weekly",
        serial_number: "Serial.04",
        title: "Trading hours",
        complied: "20%",
        not_complied: "80%",
        date: "28-Mar-2022",
        details:
          "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis enim lobortis scelerisque fermentum. Sagittis nisl rhoncus mattis rhoncus urna neque viverra. Eu tincidunt tortor aliquam nulla facilisi cras fermentum odio eu. Purus in massa tempor nec feugiat nisl pretium fusce. Id neque aliquam vestibulum morbi blandit cursus risus. ",
      },
    ],
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
    },
  },
  mounted() {
    this.loading = false;
    // this.company_name = localStorage.getItem("company_name");
    this.setDate();
  },
  created() {},
};
</script>
<style>
  /* Hide scrollbar for Chrome, Safari and Opera */
.dbox::-webkit-scrollbar {
  display: none !important;
}

/* Hide scrollbar for IE, Edge and Firefox */
.dbox {
  -ms-overflow-style: none !important;  /* IE and Edge */
  scrollbar-width: none !important;  /* Firefox */
}
</style>