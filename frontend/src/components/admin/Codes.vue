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
      :items="codes"
      :loading="loading"
      style="margin-top: 10px"
    >
      <template v-slot:item.actions="{ item }">
        <div style="display: flex; gap: 15px;">

          <v-btn v-bind="attrs" v-on="on" color="blue white--text'">
          <p class="ma-4 white--text">
            <v-icon small @click="deleteItem(item)" color="white">
              mdi-pencil }
            </v-icon>
          </p>
        </v-btn>
        <v-btn v-bind="attrs" v-on="on" color="red white--text'">
          <p class="ma-4 white--text">
            <v-icon small @click="deleteItem(item)" color="white">
              mdi-delete }
            </v-icon>
          </p>
        </v-btn>
        </div>
      </template>
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
     dialogDelete: false,
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
        value: "org_codes[0].due_date",
        class: "font-weight-bold green white--text text-uppercase",
        width: "15%",
      },
    
      {
        text: "actions",
        value: "actions",
        class: "font-weight-bold green white--text text-uppercase",
      },
    ],

    
     desserts: [],
      
  }),
   computed: mapState(["codes"]),
  created() {
    this.$store.dispatch("fetchCodes");
  },
 
  methods: {
    trimText: function (text) {
      return text.subtring(0, 100);
    },  closeDialog(){
         this.dialog = false
      },

      dialog (val) {
        val || this.close()
      },
      dialogDelete (val) {
        val || this.closeDelete()
      },
       initialize () {
        this.frequencies = [
        
        ]
      },

      editItem (item) {
        this.editedIndex = this.desserts.indexOf(item)
        this.editedItem = Object.assign({}, item)
        this.dialog = true
      },

      deleteItem (item) {
        this.editedIndex = this.desserts.indexOf(item)
        this.editedItem = Object.assign({}, item)
        this.dialogDelete = true
      },

      deleteItemConfirm () {
        this.desserts.splice(this.editedIndex, 1)
        this.closeDelete()
      },

      close () {
        this.dialog = false
        this.$nextTick(() => {
          this.editedItem = Object.assign({}, this.defaultItem)
          this.editedIndex = -1
        })
      },

      closeDelete () {
        this.dialogDelete = false
        this.$nextTick(() => {
          this.editedItem = Object.assign({}, this.defaultItem)
          this.editedIndex = -1
        })
      },

      save () {
        if (this.editedIndex > -1) {
          Object.assign(this.desserts[this.editedIndex], this.editedItem)
        } else {
          this.desserts.push(this.editedItem)
        }
        this.close()
      },
    
    // showCompanies(type,id) {
    //   localStorage.setItem("compliance_type", type)
    //   localStorage.setItem("compliance_id_form", id)
    //   this.$router.push(`/admin/dashboard/compliance_period`);
    //   return true;
    // },
   
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

      this.codes.find((element) => element.id == 184).date = formatDate;
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