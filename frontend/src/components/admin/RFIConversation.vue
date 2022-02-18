<template>
  <v-card class="pa-4">
    <v-card-title class="green white--text text-h6">
      Request for Information</v-card-title
    >

    <v-container grid-list-xs class=" pl-14 pr-16 mr-4" elevation-5>
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

      <v-form class="mt-10 mb-8 pl-10 pr-10">
        <v-textarea
          label="Type a message"
          name="message"
          textarea
          multi-line
        ></v-textarea>
        <v-btn class="pa-4 green white--text rounded-lg">Send Message</v-btn>
      </v-form>
    </v-container>
  </v-card>
</template>
<script>
export default {
  name: "chat",
  data: () => ({}),
  methods: {},
};
</script>
