<template>
  <v-card class="overflow-x-hidden">
    <v-card-title
      primary-title
      class="
        green
        font-weight
        bold
        white--text
        text-h4
        d-flex
        flex-row
        justify-space-between
      "
    >
      <div>Verify</div>
      <div>
        <v-btn class="mx-2" small fab dark color="white" @click="method(false)">
          <v-icon dark small color="green"> mdi-close</v-icon>
        </v-btn>
      </div>
    </v-card-title>
 
     

    <div grid-list-xs class=" pl-14 pr-16 mr-4" elevation-5>
      <div class="d-flex mt-2">
        <v-avatar class="pa-4" color="black" size="25">
          <v-icon dark> mdi-account </v-icon>
        </v-avatar>
        <v-card-text class="font-weight-bold black--text text-subtitle-2 pt-2">
          NSE
        </v-card-text>
      </div>

      <div class="pa-4 blue text-no-wrap rounded-lg rounded-tr-0 white--text">
        This is a request for information test
      </div>
      <div class="d-flex mt-2">
        <v-avatar color="green" size="36">
          <v-icon dark> mdi-account </v-icon>
        </v-avatar>
        <v-card-text class="font-weight-bold red--text text-subtitle-2 pt-2">
          Safaricom
        </v-card-text>
      </div>
      <div class="pa-4 blue text-no-wrap rounded-lg rounded-tr-0 white--text">
        This is the requested info
      </div>
      <div class="d-flex mt-2">
        <v-avatar color="black" size="36">
          <v-icon dark> mdi-account </v-icon>
        </v-avatar>
        <v-card-text class="font-weight-bold black--text text-subtitle-2 pt-2">
          NSE
        </v-card-text>
      </div>
      <div class="pa-4 blue text-no-wrap rounded-lg rounded-tr-0 white--text">
        This is are the files we require
      </div>
      <div class="d-flex mt-2">
        <v-avatar color="green" size="36">
          <v-icon dark> mdi-account </v-icon>
        </v-avatar>
        <v-card-text class="font-weight-bold red--text text-subtitle-2 pt-2">
          Safaricom
        </v-card-text>
      </div>
      <div class="pa-4 blue text-no-wrap rounded-lg rounded-tr-0 white--text">
        We have already uploaded files 1.2 and 7.5
      </div>
    </div>
  
    <form class="ma-8">
      <v-textarea
        label="Description"
        v-model="desc"
        :counter="10"
        required
      clear-icon="mdi-close-circle"
       clearable
       
        :type="show1 ? 'text' : 'password'"
         @click:append="show1 = !show1"
         
      ></v-textarea>
      <v-text-field
        label="Password"
        v-model="pass"
        clear-icon="mdi-close-circle"
       clearable
        :append-icon="show ? 'mdi-eye' : 'mdi-eye-off'"
        :type="show1 ? 'text' : 'password'"
         @click:append="show1 = !show1"
           
        required
      ></v-text-field>
      <div class="mt-6 d-flex">
        <v-btn class="green white--text mb-4 mr-10">submit</v-btn>
        <v-btn class="red white--text mb-4"   @click:append="show1 = !show1">clear</v-btn>
        <v-btn
          class="blue white--text mb-4"
          style="margin-left: 24px"
           @click="method(false)"
         
        >
          Close
        </v-btn>
      </div>
    </form>
  </v-card>
</template>
<script>
export default {
  name: "verify",
    props: {
    method: { type: Function },
  },

  data: () => ({
    dialogs: false,
    head:[],
    return : {
        show1: false,},
    name: "",
    primary_color: "",
    secondary1: "",
    secondary2: "",
    secondary3: "",
    codes: [
      {
        id: 1,
        name: "Listing Rules",
      },
      {
        id: 2,
        name: "Late Submission of Audited Annual Accounts",
      },
      {
        id: 3,
        name: "Annual financial statements",
      },
      {
        id: 4,
        name: "Trading hours",
      },
    ],
    selects: "",
    codeselects: [],
  }),
  methods: {
    /**
     * Add checkbox values elese delete
     */
   clear(){
     this.desc = ""
   },

    addCodeSelects(id) {
      if (!this.codeselects.find((element) => element == id)) {
        this.codeselects.push(id);
      } else {
        let index = this.codeselects.indexOf(id);
        this.codeselects.splice(index, 1);
      }
      console.log(this.selects);
    },
  },
};
</script>
