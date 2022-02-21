<template>
  <v-container>
    <v-data-table
      :headers="headers"
      :items="frequencies"
      :single-expand="singleExpand"
      :expanded.sync="expanded"
      class="elevation-1"
    >
      <template v-slot:top>
      <v-toolbar flat>
          <v-card-title primary-title class="text-h4 #303b4b--text">
            List of Frequency
          </v-card-title>

          <v-spacer></v-spacer>
          <v-dialog v-model="dialog" max-width="700px">
            <template v-slot:activator="{ on, attrs }">
              <v-btn color="green" dark v-bind="attrs" v-on="on">
                  Create Frequency
                <v-icon class="ml-2" color="white">mdi-plus-box</v-icon>
              </v-btn>
            </template>
            <Freq :method="closeDialog" />
          </v-dialog>
        </v-toolbar>
      </template>
      <template v-slot:item.actions="{ item }">
        <v-icon small class="mr-2" @click="editItem(item)"> mdi-pencil </v-icon>
        <v-icon small @click="deleteItem(item)"> mdi-delete </v-icon>
      </template>
      <template v-slot:no-data>
        <v-btn color="primary" @click="initialize"> Reset </v-btn>
      </template>
    </v-data-table>
  </v-container>
</template>
<script>
import Freq from "../admin/CreateFrequency.vue";
import { mapState } from "vuex";
export default {
  components: {
    Freq,
  },
  data: () => ({
    dialog: false,
    dialogDelete: false,
    headers: [
      {
        text: "Frequencies",
        value: "frequency",
        class: "font-weight-bold green white--text text-uppercase",
      },
      {
        text: "unit",
        value: "unit",
        class: " pa-18 mr-2 font-weight-bold green white--text text-uppercase",
        width: "5%",
      },
      {
        text: "quantity",
        value: "qty",
        class: " pa-18 mr-2 font-weight-bold green white--text text-uppercase",
        width: "5%",
      },
        {
        text: "Actions",
        value: "actions",
        sortable: false,
        class: " pa-18 mr-2 font-weight-bold green white--text text-uppercase",
         width: "5%",
      },
    ],

    editedItem: {},
  }),
  created() {
    this.$store.dispatch("fetchFrequencies");
  },
  computed: mapState(["frequencies"]),

  methods: {},
};
</script>