<template>
  <v-card class="overflow-x-hidden overflow-y-hidden">
    <v-card-title
      primary-title
      class="
        green
        font-weight-bold
        white--text
        text-h4
        d-flex
        flex-row
        justify-space-between
      "
    >
      <div>Create Role</div>
      <div>
        <v-btn class="mx-2" small fab dark color="white" @click="method(false)">
          <v-icon dark small color="green"> mdi-close</v-icon>
        </v-btn>
      </div>
    </v-card-title>
    <form class="ma-8 dbox">
      <v-text-field
        label="Name"
        v-model="code"
        :counter="10"
        required
      ></v-text-field>

      <v-select
        label="Code"
        v-model="select"
        :items="codes"
        required
      ></v-select>

      <v-select
        label="Parent"
        v-model="select"
        :items="parent_id"
        required
      ></v-select>

      <v-btn class="green white--text mb-4 mr-10">save code</v-btn>
      <v-btn class="red white--text mb-4">clear</v-btn>
      <v-btn
        class="blue white--text mb-4"
        style="margin-left: 24px"
        text
        @click="method(false)"
      >
        Close
      </v-btn>
    </form>
  </v-card>
</template>

<script>
export default {
  name: "role",
  props: {
    method: { type: Function },
  },
  data: () => ({
    dialog: false,
    code: "",
    serial_no: "",
    description: "",
    code_details: "",
    codes: ["NSE01", "NSE02", "NSE03", "NSE04"],
    parent_id: ["1", "2", "3", "4","5"],
    picker: "",
  }),
};
</script>
<style>
/* Hide scrollbar for Chrome, Safari and Opera */
.dbox::-webkit-scrollbar {
  display: none !important;
}

/* Hide scrollbar for IE, Edge and Firefox */
.dbox {
  -ms-overflow-style: none !important; /* IE and Edge */
  scrollbar-width: none !important; /* Firefox */
}
</style>
