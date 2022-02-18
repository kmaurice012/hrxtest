<template>
  <v-container>
     <div class="d-flex">
      <v-card-title primary-title class="text-h4 #303b4b--text">
        List of Roles
      </v-card-title>
      <v-spacer></v-spacer>
      <v-dialog v-model="dialog" max-width="700px" max-height="950px">
        <template v-slot:activator="{ on, attrs }">
          <v-btn color="green" dark v-bind="attrs" v-on="on">
            Create Role
            <v-icon class="ml-2" color="white">mdi-plus-box</v-icon>
          </v-btn>
          <v-spacer></v-spacer>
        </template>
        <v-spacer></v-spacer>

        <Role :method="closeDialog" />
      </v-dialog>
    </div>
    <v-data-table
      :headers="headers"
      :items= roles
      :single-expand="singleExpand"
      :expanded.sync="expanded"
      class="elevation-1"
    >
    </v-data-table>
  </v-container>
</template>
<script>
import Role from "../admin/CreateRole.vue";
import { mapState } from "vuex";
export default {
  components: {
   Role
  },
  data: () => ({
    expanded: [],
    singleExpand: false,
   headers: [
      {
        text: "roles",
        value: "role",
        class: "font-weight-bold green white--text text-uppercase",
      },
      {
        text: "parent name",
        value: "parent.role",
        class: "font-weight-bold green white--text text-uppercase",
      },
    ]
  }),
    created() {
    this.$store.dispatch("fetchRoles");
    
  },
  computed: mapState(["roles"]),
  methods: {
     createCode() {
      this.$router.push(`/admin/dashboard/codes/create`);
    },
  },

  mounted() {},
};
</script>
