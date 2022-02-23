<template>
  <v-card>
      <div>
          <v-card-title primary-title class="green font-weight-bold white--text text-h4"> View File &nbsp; <v-spacer></v-spacer><span class="text-subtitle-2">Safaricom_Code_compliance.pdf</span></v-card-title>
      </div>
    
<v-spacer></v-spacer>
    <pdf src="/Get_Started_With_Smallpdf.pdf"></pdf>
  </v-card>
</template>

<script>
import pdf from "vue-pdf";

export default {
  components: {
    pdf,
  },

  data: () => ({
     
  }),
};
</script>
