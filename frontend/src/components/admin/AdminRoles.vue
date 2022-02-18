<template>
  <v-container>
    <div class="d-flex">
      <v-card-title
        primary-title
        class="text-h4 #303b4b--text"
        style="color: #303b4b"
      >
        List of Roles
      </v-card-title>
      <v-spacer></v-spacer>
    </div>
    <v-data-table
      :headers="headers"
      :single-expand="singleExpand"
      :expanded.sync="expanded"
      class="elevation-1"
    >
    </v-data-table>
  </v-container>
</template>
<script>
let roles_table = JSON.parse(sessionStorage.roles_table);
let parentArray = [];
let rolesArray = [];
const test = roles_table.map((roles,parent) => {
  rolesArray.push(roles.roles);
  parentArray .push(parent.parent)
});

console.log(rolesArray, "ROLES");
console.log(parentArray,"CODES");
console.log(test);
export default {
  components: {},
  data: () => ({
    expanded: [],
    singleExpand: false,
   headers: [
      {
        text: "roles",
        value: "roles",
        class: "font-weight-bold green white--text text-uppercase",
      },
      {
        text: "code",
        value: "code",
        class: "font-weight-bold green white--text text-uppercase",
      },
      {
        text: "parent name",
        value: "parent name",
        class: "font-weight-bold green white--text text-uppercase",
      },
      {
        text: "serial number",
        value: "serial_number",
        class: "font-weight-bold green white--text text-uppercase",
      },
      
      {
        text: "description",
        value: "description",
        class: "font-weight-bold green white--text text-uppercase",
        width: "15%",
      },
    ]
  }),
  methods: {},

  mounted() {},
};
</script>
