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
      <v-toolbar
        flat
      >
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
            <Role  items={item} :method="closeDialog" />
          </v-dialog>
             <v-dialog v-model="dialogDelete" max-width="500px">
          <v-card>
            <v-card-title class="text-h5">Are you sure you want to delete this item?</v-card-title>
            <v-card-actions>
              <v-spacer></v-spacer>
              <v-btn color="blue darken-1" text @click="closeDelete">Cancel</v-btn>
              <v-btn color="blue darken-1" text @click="deleteItemConfirm">OK</v-btn>
              <v-spacer></v-spacer>
            </v-card-actions>
          </v-card>
        </v-dialog>
        </v-toolbar>
         
      </v-toolbar>
    </template>
       <template v-slot:item.actions="{ item }">
        <div style="display: flex; gap: 15px;">

          <v-btn v-bind="attrs" v-on="on" color="blue white--text'" @click="editItem(item)">
          <p class="ma-4 white--text">
            <v-icon small color="white">
              mdi-pencil }
            </v-icon>
          </p>
        </v-btn>
        <v-btn v-bind="attrs" v-on="on" color="red white--text'" @click="deleteItem(item)">
          <p class="ma-4 white--text">
            <v-icon small  color="white">
              mdi-delete }
            </v-icon>
          </p>
        </v-btn>
        </div>
      </template>
    <template v-slot:no-data>
      <v-btn
        color="primary"
        @click="initialize"
      >
        Reset
      </v-btn>
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
        class: " font-weight-bold green white--text text-uppercase",
         width: "5%",
      },
      ],
    
      editedIndex: -1,
      editedItem: {
     
      },
      defaultItem: {
        
      },
    }),
 computed: mapState(["roles"]),

    watch: {
      dialog (val) {
        val || this.close()
      },
      dialogDelete (val) {
        val || this.closeDelete()
      },
    },

    created () {
      this.initialize()
           this.$store.dispatch("fetchRoles");
    },



    methods: {
      closeDialog(){
         this.dialog = false
      },
      initialize () {
        this.roles = [
        
        ]
      },

      editItem (item) {
        this.editedIndex = this.roles.indexOf(item)
        this.editedItem = Object.assign({}, item)
        this.dialog = true
      },

      deleteItem (item) {
        this.editedIndex = this.roles.indexOf(item)
        this.editedItem = Object.assign({}, item)
        this.dialogDelete = true
      },

      deleteItemConfirm () {
        this.roles.splice(this.editedIndex, 1)
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
          Object.assign(this.roles[this.editedIndex], this.editedItem)
        } else {
          this.roles.push(this.editedItem)
        }
        this.close()
      },
    },
  }
</script>