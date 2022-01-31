<template>
  <v-card class="ma-4">
    <v-data-table :headers="headers" :items="compliances" :loading="loading">
      <template v-slot:[`item.actions`]="{ item }">
        <!-- <v-tooltip left>
          <template v-slot:activator="{ on, attrs }">
            <v-btn v-bind="attrs" v-on="on" icon color="blue darken-2">
              <v-icon large @click="editItem(item)">mdi-information</v-icon>
            </v-btn>
          </template>
          <span>View Compliance</span>
        </v-tooltip> -->
            <v-btn
              v-bind="attrs"
              v-on="on"
              block
              color="red darken-3 white--text font-weight-bold mt-2"
              @click="showCompliance(item.title, item.id)"
            >
              <!-- <v-icon large @click="submitCompliance(item.id)">mdi-file-plus</v-icon> -->
              <p class="ma-4">View Compliance</p>
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
        date: "2022-01-28",
        details: "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis enim lobortis scelerisque fermentum. Sagittis nisl rhoncus mattis rhoncus urna neque viverra. Eu tincidunt tortor aliquam nulla facilisi cras fermentum odio eu. Purus in massa tempor nec feugiat nisl pretium fusce. Id neque aliquam vestibulum morbi blandit cursus risus. "
      },
      {
        id: 185,
        code:'NSE02',
        frequency: 'Quarterly',
        serial_number: 'Serial.02',
        title: "Late Submission of Audited Annual Accounts",
        date: "2022-01-31",
        details: "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis enim lobortis scelerisque fermentum. Sagittis nisl rhoncus mattis rhoncus urna neque viverra. Eu tincidunt tortor aliquam nulla facilisi cras fermentum odio eu. Purus in massa tempor nec feugiat nisl pretium fusce. Id neque aliquam vestibulum morbi blandit cursus risus. "
      },
      {
        id: 186,
        code:'NSE01',
        frequency: 'Bi-Annually',
        serial_number: 'Serial.01',
        title: "Annual financial statements",
        date: "2022-02-12",
        details: "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis enim lobortis scelerisque fermentum. Sagittis nisl rhoncus mattis rhoncus urna neque viverra. Eu tincidunt tortor aliquam nulla facilisi cras fermentum odio eu. Purus in massa tempor nec feugiat nisl pretium fusce. Id neque aliquam vestibulum morbi blandit cursus risus. "
      },
      {
        id: 187,
        code:'NSE04',
        frequency: 'Weekly',
        serial_number: 'Serial.04',
        title: "Trading hours",
        date: "2022-03-28",
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
      this.$router.push(`/dashboard/compliances`);
      return true;
    },
  },
  mounted() {
    this.loading = false;
  },
};
</script>
