<template>
  <div>
    <v-app>
    <NavDrawer/>
    <v-main>
      <router-view></router-view>
    </v-main>
    <!-- <Footer /> -->
    </v-app>
  </div>
</template>

<script>
// @ is an alias to /src
import NavDrawer from "../components/user/NavDrawer.vue";
// import Footer from "../components/Footer.vue";
// import Calendar from "../components/Calendar.vue";

export default {
  name: "Dashboard",
  components: {
    NavDrawer,
    // Footer
  },
};
</script>
