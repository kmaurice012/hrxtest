<template>
  <v-card class="ma-4">
    <v-card-title primary-title class="text-h4 green--text">
      List of Codes

      <v-spacer></v-spacer>
    </v-card-title>
    <v-data-table :headers="headers" :items="compliances" :loading="loading">
      <template v-slot:[`item.actions`]="{ item }">
            <v-btn
              v-bind="attrs"
              v-on="on"
              block
              color="red darken-3 white--text font-weight-bold mt-2"
              @click="viewReports(item.title)"
            >
              <p class="ma-4">View Report</p>

              <v-icon large >mdi-chart-box</v-icon>
            </v-btn>
      </template>
      
    </v-data-table>

    
  </v-card>
</template>
<script>
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
      },
      // {
      //   text: "complied",
      //   value: "complied",
      //   class: "font-weight-bold green white--text text-uppercase",
      // },
      // {
      //   text: "not complied",
      //   value: "not_complied",
      //   class: "font-weight-bold green white--text text-uppercase",
      // },
      {
        text: "actions",
        value: "actions",
        class: "font-weight-bold green white--text text-uppercase",
      },
    ],
    compliances: [
      {
        id: 184,
        code:'NSE03',
        frequency: 'Daily',
        serial_number: 'Serial.03',
        title: "Listing Rules",
        complied: '25%',
        not_complied: '75%',
        date: "28-Jan-2022",
        details: "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis enim lobortis scelerisque fermentum. Sagittis nisl rhoncus mattis rhoncus urna neque viverra. Eu tincidunt tortor aliquam nulla facilisi cras fermentum odio eu. Purus in massa tempor nec feugiat nisl pretium fusce. Id neque aliquam vestibulum morbi blandit cursus risus. "
      },
      {
        id: 185,
        code:'NSE02',
        frequency: 'Quarterly',
        serial_number: 'Serial.02',
        title: "Late Submission of Audited Annual Accounts",
        complied: '10%',
        not_complied: '90%',
        date: "31-Jan-2022",
        details: "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis enim lobortis scelerisque fermentum. Sagittis nisl rhoncus mattis rhoncus urna neque viverra. Eu tincidunt tortor aliquam nulla facilisi cras fermentum odio eu. Purus in massa tempor nec feugiat nisl pretium fusce. Id neque aliquam vestibulum morbi blandit cursus risus. "
      },
      {
        id: 186,
        code:'NSE01',
        frequency: 'Bi-Annually',
        serial_number: 'Serial.01',
        title: "Annual financial statements",
        complied: '40%',
        not_complied: '60%',
        date: "12-Feb-2022",
        details: "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis enim lobortis scelerisque fermentum. Sagittis nisl rhoncus mattis rhoncus urna neque viverra. Eu tincidunt tortor aliquam nulla facilisi cras fermentum odio eu. Purus in massa tempor nec feugiat nisl pretium fusce. Id neque aliquam vestibulum morbi blandit cursus risus. "
      },
      {
        id: 187,
        code:'NSE04',
        frequency: 'Weekly',
        serial_number: 'Serial.04',
        title: "Trading hours",
        complied: '20%',
        not_complied: '80%',
        date: "28-Mar-2022",
        details: "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis enim lobortis scelerisque fermentum. Sagittis nisl rhoncus mattis rhoncus urna neque viverra. Eu tincidunt tortor aliquam nulla facilisi cras fermentum odio eu. Purus in massa tempor nec feugiat nisl pretium fusce. Id neque aliquam vestibulum morbi blandit cursus risus. "
      },
    ],
    loading: true,
    company_name: ""
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
    viewReports(title) {
      localStorage.setItem("compliance_code_title", title)
      // localStorage.setItem("compliance_id_form", id)
      
      // this.$router.push(`/admin/dashboard/view-compliance-reports/` + id);
      this.$router.push(`/admin/dashboard/view-compliance-reports/`);
    }

  },
  mounted() {
    this.loading = false;
    // this.company_name = localStorage.getItem("company_name");
  },
};
</script>
