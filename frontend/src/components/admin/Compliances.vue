<template>
  <v-card class="ma-4">
    <v-card-title primary-title class="text-h4 green--text">
      List of {{organization_name}} Codes

      <v-spacer></v-spacer>
    </v-card-title>
    <v-data-table :headers="headers" :items= codes :loading="loading">
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
import { mapState } from "vuex";
export default {
  data: () => ({
    headers: [
      {
        text: "name",
        value: "description",
        class: "font-weight-bold green white--text text-uppercase",
      },
      {
        text: "code",
        value: "code",
        class: "font-weight-bold green white--text text-uppercase",
      },
      {
        text: "frequency",
        value: "frequency.frequency",
        class: "font-weight-bold green white--text text-uppercase",
      },
      {
        text: "serial number",
        value: "serial_number",
        class: "font-weight-bold green white--text text-uppercase",
      },
      {
        text: "due date",
        value: "date",
        class: "font-weight-bold green white--text text-uppercase",
        width: "15%"
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
  
    loading: true,
     organization_name: ""
  }),
    computed: mapState(["codes"]),
  created() {
    this.$store.dispatch("fetchCodes");
  },
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
    viewCompliances(title,id) {
      localStorage.setItem("compliance_code_title", title)
      localStorage.setItem("compliance_id_form", id)
      this.$router.push(`/admin/dashboard/compliance_period`);
    }

  },
  
  mounted() {
    this.loading = false;
    this. organization_name = localStorage.getItem("organization_name");
   
  },
 
};
</script>
