<template>
  <v-card class="overflow-y-hidden" >
     <v-card-title
      primary-title
      class="
        green
        
        white--text
        text-h4
        d-flex
        flex-row
        justify-space-between
      "
    >
      <div> Request for Information</div>
      <div>
        <v-btn class="mx-2" small fab dark color="white" @click="method(false)">
          <v-icon dark small color="green"> mdi-close</v-icon>
        </v-btn>
      </div>
    </v-card-title>

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
  <v-form>
    <v-container>
      <v-row>
        <v-col cols="12">
          <v-text-field
            v-model="message"
            :append-icon="marker ? 'mdi-map-marker' : 'mdi-map-marker-off'"
            :append-outer-icon="message ? 'mdi-send' : 'mdi-microphone'"
            :prepend-icon="icon"
            filled
            clear-icon="mdi-close-circle"
            clearable
            label="Message"
            type="text"
            @click:append="toggleMarker"
            @click:append-outer="sendMessage"
            @click:prepend="changeIcon"
            @click:clear="clearMessage"
          ></v-text-field>
        </v-col>
      </v-row>
    </v-container>
  </v-form>

      <!-- <v-form class="mt-10 mb-8 pl-10 pr-10">
        <v-textarea
          label="Type a message"
          name="message"
          textarea
          multi-line
        ></v-textarea>
        <div style="display: flex; gap: 75px;">
            <v-btn class="pa-4 green white--text rounded-lg">Send Message</v-btn>
         <v-btn
          class="blue white--text mb-4"
          style="margin-left: 24px"
           @click="method(false)"
         
        >
          Close
        </v-btn>
        </div>
      
      </v-form> -->
    </v-container>
  </v-card>
</template>
<script>
export default {
  name: "chat",
    props: {
    method: { type: Function },
  },
  data: () => ({

  dialog: false,
        password: 'Password',
      show: false,
      message: 'Hey!',
      marker: true,
      iconIndex: 0,
      icons: [
        'mdi-emoticon',
        'mdi-emoticon-cool',
        'mdi-emoticon-dead',
        'mdi-emoticon-excited',
        'mdi-emoticon-happy',
        'mdi-emoticon-neutral',
        'mdi-emoticon-sad',
        'mdi-emoticon-tongue',
      ],
  }),

    computed: {
      icon () {
        return this.icons[this.iconIndex]
      },
    },

    methods: {
      toggleMarker () {
        this.marker = !this.marker
      },
      sendMessage () {
        this.resetIcon()
        this.clearMessage()
      },
      clearMessage () {
        this.message = ''
      },
      resetIcon () {
        this.iconIndex = 0
      },
      changeIcon () {
        this.iconIndex === this.icons.length - 1
          ? this.iconIndex = 0
          : this.iconIndex++
      },
    },
 

};

</script>
