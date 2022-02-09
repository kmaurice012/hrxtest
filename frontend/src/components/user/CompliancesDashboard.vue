<template>
  <v-card class="ma-4">
    <v-data-table :headers="headers" :items="compliances" :loading="loading">
      <!-- <template v-slot:[`item.actions`]="{ item }">
            <v-btn
              v-bind="attrs"
              v-on="on"
              block
              color="red darken-3 white--text font-weight-bold mt-2"
              @click="showCompliance(item.title, item.id)"
            > -->
              <!-- <v-icon large @click="submitCompliance(item.id)">mdi-file-plus</v-icon> -->
              <!-- <p class="ma-4">View Compliance</p>
            </v-btn>
      </template> -->
      
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
        width: "15%"
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
        code:'NSE03',
        frequency: 'Daily',
        serial_number: 'Serial.03',
        title: "Listing Rules",
        complied: '25%',
        not_complied: '75%',
        date: "28-Jan-2022 17:00",
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
        date: "31-Jan-2022 15:30",
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
        date: "12-Feb-2022 23:59",
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
        date: "28-Mar-2022 12:00",
        details: "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis enim lobortis scelerisque fermentum. Sagittis nisl rhoncus mattis rhoncus urna neque viverra. Eu tincidunt tortor aliquam nulla facilisi cras fermentum odio eu. Purus in massa tempor nec feugiat nisl pretium fusce. Id neque aliquam vestibulum morbi blandit cursus risus. "
      },
    ],
    loading: true,
  }),
  methods: {
    trimText: function (text) {
      return text.subtring(0, 100);
    },
    showCompliance(type,id) {
      localStorage.setItem("compliance_type", type)
      localStorage.setItem("compliance_id_form", id)
      this.$router.push(`/user/dashboard/compliances`);
      return true;
    },
  },
  mounted() {
    this.loading = false;
  },
};
</script>
