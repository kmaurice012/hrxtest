<template>
  <div>
    <v-card class="mx-auto overflow-hidden">
      <v-app-bar
        app
        clipped-left
        style="background-color: #303b4b; color: #fff"
        height="45px"
        elevation="4"
      >
        <v-menu origin="center center" transition="scale-transition" offset-y>
          <template v-slot:activator="{ on, attrs }">
            <v-btn
              style="padding-left: 38px; color: #fff"
              class="ms-14"
              icon
              v-bind="attrs"
              v-on="on"
              font-weight-bold
            >
              <v-list-item-title class="ms-6"></v-list-item-title>
              <!-- <v-icon>mdi-chevron-down</v-icon> -->
              Nairobi Stocks Exchange
            </v-btn>
            <v-list-item-title></v-list-item-title>
          </template>

          <!-- <v-list>
            <v-list-item v-for="(item, i) in companies" :key="i">
              <v-list-item-title>{{ item.name }}</v-list-item-title>
            </v-list-item>
          </v-list> -->
        </v-menu>

        <v-spacer></v-spacer>
        <v-spacer></v-spacer>
        <img
          style="height: 75%; width: auto; padding-top: 5px"
          src="../../assets/img/eboard_Logo_new@2x.png"
        />
        <v-spacer></v-spacer>
        <v-menu
          origin="center center"
          transition="scale-transition"
          offset-y
          open-on-hover
        >
          <template v-slot:activator="{ on, attrs }">
            <v-btn icon v-bind="attrs" v-on="on">
              <v-icon style="color: white">mdi-refresh</v-icon>
            </v-btn>
            <v-list-item-title></v-list-item-title>
          </template>

          <v-list>
            <v-list-item v-for="(item, i) in companies" :key="i">
              <v-list-item-title>{{ item.name }}</v-list-item-title>
            </v-list-item>
          </v-list>
        </v-menu>
        <v-menu
          origin="center center"
          transition="scale-transition"
          offset-y
          open-on-hover
        >
          <template v-slot:activator="{ on, attrs }">
            <v-btn icon v-bind="attrs" v-on="on">
              <v-icon style="color: white">mdi-magnify</v-icon>
            </v-btn>
            <!-- <v-list-item-title></v-list-item-title> -->
          </template>

          <v-list>
            <v-list-item v-for="(item, i) in companies" :key="i">
              <v-list-item-title>{{ item.name }}</v-list-item-title>
            </v-list-item>
          </v-list>
        </v-menu>
        <v-menu
          origin="center center"
          transition="scale-transition"
          offset-y
          open-on-hover
        >
          <template v-slot:activator="{ on, attrs }">
            <v-btn icon v-bind="attrs" v-on="on">
              <v-icon color="white">mdi-account-circle</v-icon>
            </v-btn>
            <!-- <v-list-item-title></v-list-item-title> -->
          </template>

          <v-list>
            <v-list-item v-for="(item, i) in companies" :key="i">
              <v-list-item-title>{{ item.name }}</v-list-item-title>
            </v-list-item>
          </v-list>
        </v-menu>
        <v-menu
          origin="center center"
          transition="scale-transition"
          offset-y
          open-on-hover
        >
          <template v-slot:activator="{ on, attrs }">
            <v-btn icon v-bind="attrs" v-on="on">
              <v-icon color="white">mdi-server</v-icon>
            </v-btn>
            <!-- <v-list-item-title></v-list-item-title> -->
          </template>

          <v-list>
            <v-list-item>
              <v-list-item-title>Options</v-list-item-title>
            </v-list-item>
          </v-list>
          <v-list>
            <v-list-item>
              <v-list-item-title>Change Password</v-list-item-title>
            </v-list-item>
          </v-list>
          <v-list>
            <v-list-item @click="logout()">
              <v-list-item-title>Logout</v-list-item-title>
            </v-list-item>
          </v-list>
        </v-menu>

        <v-spacer></v-spacer>
      </v-app-bar>

      <v-navigation-drawer clipped app permanent>
        <!-- <v-list>

          <v-list-item link>
            <v-list-item-content>
              <v-list-item-title class="text-h6">
                
              </v-list-item-title>
              <v-list-item-subtitle></v-list-item-subtitle>
            </v-list-item-content>
          </v-list-item>
        </v-list> -->

        <v-divider></v-divider>

        <v-list nav dense class="grow">
          <!-- <v-list-group> -->
          <v-list-item
            v-for="menuItem in menuItems"
            :key="menuItem.name"
            link
            class="py-5"
            :to="menuItem.route"
          >
            <v-divider></v-divider>
            <v-list-item-title
              :class="
                'font-weight-bold text-subtitle-1 text-capitalize mb-2 ' +
                menuItem.color +
                '--text'
              "
            >
              <div>
                <v-icon left large :color="menuItem.color">{{
                  menuItem.icon
                }}</v-icon>
                {{ menuItem.name }}
              </div>
            </v-list-item-title>
          </v-list-item>
          <!-- </v-list-group>  -->
        </v-list>
      </v-navigation-drawer>
    </v-card>
  </div>
</template>

<script>
export default {
  data: () => ({
    drawer: false,
    group: null,
    mini: false,
    menuItems: [
      {
        name: "Dashboard",
        route: "/admin/dashboard",
        icon: "mdi-home",
        color: "blue",
      },
      // {
      //   name: "Company Compliances",
      //   route: "/admin/dashboard/company-compliance",
      //   icon: "mdi-clipboard-check",
      //   color: "orange",
      // },
      {
        name: "Manage Codes",
        route: "/admin/dashboard/codes",
        icon: "mdi-clipboard-list",
        color: "red",
      },
      {
        name: "Manage Companies",
        route: "/admin/dashboard/companies",
        icon: "mdi-office-building",
        color: "indigo",
      },
      {
        name: "Reports",
        route: "/admin/dashboard/admin-reports",
        icon: "mdi-chart-box",
        color: "green",
      },
       {
        name: "Manage Roles",
        route: "/admin/dashboard/admin-report",
        icon: "mdi-chart-box",
        color: "orange",
      },
        {
        name: "Manage Frequencies",
        route: "/admin/dashboard/admin-report",
        icon: "mdi-chart-box",
        color: "black",
      },
      // {
      //   name: "Submit Compliance",
      //   route: "/dashboard/comply",
      //   icon: "mdi-file-plus",
      //   color: "brown",
      // },
    ],
    companies: [{ name: "STL Vision" }, { name: "STL South Africa" }],
    userOptions: [
      { name: "Options", action: "" },
      { name: "Change Password", action: "" },
      { name: "Logout", action: "logout()" },
    ],
  }),
  methods: {
    logout() {
      this.$router.push("/");
    },
  },
};
</script>
