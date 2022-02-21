<template>
  <v-container>
    <v-data-table
      :headers="headers"
      :items="roles"
      :single-expand="singleExpand"
      :expanded.sync="expanded"
      class="elevation-1"
    >
      <template v-slot:top>
        <v-toolbar flat>
          <v-card-title primary-title class="text-h4 #303b4b--text">
            List of Roles
          </v-card-title>

          <v-spacer></v-spacer>
          <v-dialog v-model="dialog" max-width="700px">
            <template v-slot:activator="{ on, attrs }">
              <v-btn color="green" dark v-bind="attrs" v-on="on">
                Create Role
                <v-icon class="ml-2" color="white">mdi-plus-box</v-icon>
              </v-btn>
            </template>
            <Role :method="closeDialog" />
          </v-dialog>
        </v-toolbar>
      </template>
      <template v-slot:item.actions="{ id }">
        <v-icon small class="mr-2" @click="editItem(id)"> mdi-pencil </v-icon>
        <v-icon small @click="deleteItem(id)"> mdi-delete </v-icon>
      </template>
      <template v-slot:no-data>
        <v-btn color="primary" @click="initialize"> Reset </v-btn>
      </template>
    </v-data-table>
  </v-container>
</template>
<script>
import Role from "../admin/CreateRole.vue";
import { mapState } from "vuex";
export default {
  components: {
    Role,
  },
  data: () => ({
    dialog: false,
    dialogDelete: false,
    headers: [
      {
        text: "Roles",
        value: "role",
        class: "font-weight-bold green white--text text-uppercase",
      },
      {
        text: "Parent Name",
        value: "parent.role",
        class: "font-weight-bold green white--text text-uppercase",
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
    this.$store.dispatch("fetchRoles");
  },
  deleteItem(){

  },
  computed: mapState(["roles"]),

  methods: {},
};
</script>