<template>
  <div>
    <v-app>
      <p class="footer">
        &copy; {{ new Date().getFullYear() }}
        <strong>Software Technologies Limited</strong>
      </p>
      <NavDrawer />
      <v-card>
        <v-navigation-drawer
          v-model="drawer"
          class="sidebar-1"
          :style="{
            display: $store.getters['sidebarOpen'] ? 'block' : 'none',
          }"
          width="180"
          color="dark"
        >
          <v-btn icon @click.stop="mini = !mini" class="black--text">
            <v-icon @click.stop="$store.dispatch('toggleSidebar', false)">
              mdi-chevron-left</v-icon
            >
          </v-btn>
          <v-list dense>
            <v-list-item
              v-for="(item, i) in $store.getters['sidebar']"
              :key="i"
              link
            >
              <v-list-item-icon>
                <v-icon color="text">{{ item.icon }}</v-icon>
              </v-list-item-icon>

              <v-list-item-content class="black--text">
                <v-list-item-title>{{ item.title }}</v-list-item-title>
                {{ $store.getters["sidebarOpen"] }}
              </v-list-item-content>
            </v-list-item>
          </v-list>
        </v-navigation-drawer>
      </v-card>
      <v-main>
        <router-view></router-view>
      </v-main>
      <!-- <Footer /> -->
    </v-app>
  </div>
</template>

<script>

import NavDrawer from "../components/NavDrawer.vue";

export default {
  name: "Dashboard",
  components: {
    NavDrawer,
 
  },
  data() {
    return {
      mini: false,
      drawer: true,
    };
  },
  computed: {
    year() {
      const d = new Date();
      let year_ = d.getFullYear();
      return year_;
    },
  },
  // beforeMount() {
  //   this.$store.dispatch("setSideBarMenuItem", [
  //     { icon: "mdi-view-dashboard", title: "Dashboard" },
  //     { icon: "mdi-view-dashboard", title: "Dashboard" },
  //     { icon: "mdi-view-dashboard", title: "Dashboard" },
  //   ]);
  //   this.$store.dispatch("toggleSidebar", true);
  // },
};
</script>
<style scoped>
.main_1 {
  overflow-y: auto !important;
  min-height: 100%;
  background-color: white;
  border-radius: 34px;
  margin: 40px 10px 40px 10px;
}
.main {
  background-color: rgba(216, 217, 218) !important;
  min-height: 100%;
}

.footer {
  position: absolute;
  left: 0;
  bottom: 0;
  width: 100%;
  padding-top: 10px;
  color: black;
  text-align: center;
}
.sidebar-1 {
  background-color: #9e9fa3;
  min-height: 100% !important;
  border-radius: 0 5px 0 0 !important;
}
</style>
