<template>
  <div>
    <v-card class="mx-auto overflow-hidden">
      <v-app-bar
        app
        clipped-left
        clipped-right
        flat
        dense
        elevation="1"
        height="55"
        class="nav"
      >
        <v-avatar width="95" class="logo" tile>
          <img src="../assets/images/stl-logo.png" alt="" />
        </v-avatar>
        <v-spacer></v-spacer>
        <v-spacer></v-spacer>
        <v-toolbar-title ml-3 class="name"> My Company Name </v-toolbar-title>
        <v-spacer></v-spacer>
        <v-spacer></v-spacer>
        <v-switch
          v-model="ex11"
          color="switch"
          value="red"
          hide-details
          @change="toggleDark()"
        ></v-switch>
        <v-btn icon>
          <v-icon>mdi-heart</v-icon>
        </v-btn>

        <v-btn icon>
          <v-icon>mdi-magnify</v-icon>
        </v-btn>
      </v-app-bar>

      <v-navigation-drawer clipped app permanent width="105">
        <v-list nav dense class="grow">
          <v-list-item
            v-for="menuItem in menuItems"
            :key="menuItem.name"
            link
            class="py-5 mr-n2"
            :to="menuItem.route"
          >
            <v-list-item-title
              :class="
                'font-weight-bold text-subtitle-1 text-capitalize mb-2   ' +
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
        </v-list>
      </v-navigation-drawer>
    </v-card>
  </div>
</template>

<script>
// import AdminApi from "../../services/admin_api";

export default {
  data: () => ({
    drawer: false,
    active: false,
    group: null,
    mini: false,
    ex11: "",
    // items: [
    //   { title: "Home", icon: "mdi-home-city" },
    //   { title: "My Account", icon: "mdi-account" },
    //   { title: "Users", icon: "mdi-account-group-outline" },
    // ],
    // menuItems: [
    //   {
    //     title: "Dashboard",
    //     icon: "mdi-view-dashboard",
    //     // route: "/dashboard",
    //     // to: { name: "DashBoard", icon: "mdi-view-dashboard" },
    //     children: [
    //       {
    //         icon: "mdi-view-dashboard",
    //         title: "MyDashboard ",
    //         route: "/myDashboard",
    //         name: "myDashboard",
    //       },
    //       { icon: "mdi-view-dashboard", title: "HR Dashboard" },
    //       { icon: "mdi-view-dashboard", title: "Payroll Dashboard" },
    //     ],
    //   },
    //   {
    //     title: "Company",
    //     icon: "mdi-home",
    //     // route: "/compliance",
    //     // to: { name: "Compliance", icon: "mdi-home" },
    //     children: [
    //       {
    //         icon: "mdi-home",
    //         title: "MyCompany",
    //         route: "compliance",
    //         to: { name: "Compliance" },
    //       },
    //       { icon: "mdi-home", title: "HR Company" },
    //       { icon: "mdi-home", title: "Payroll Company" },
    //     ],
    //   },
    // ],
    menuItems: [
      {
        name: "D",
        route: "/dashboard",
        icon: "mdi-view-dashboard",
        color: "blue",
      },
      {
        name: "c",
        route: "/dashboard/contracts",
        icon: "mdi-bank",
        color: "orange",
      },
      {
        name: "e",
        route: "/dashboard/managers",
        icon: "mdi-clipboard-list",
        color: "green",
      },

      {
        route: "/admin/dashboard/all_compliances",
        icon: "mdi-clipboard-list",
        color: "red",
      },
      {
        route: "/admin/dashboard/material_announcement",
        icon: "mdi-clipboard-list",
        color: "teal",
      },
    ],
    username: "",
    companies: [{ name: "STL Vision" }, { name: "STL South Africa" }],
    userOptions: [
      { name: "Options", action: "" },
      { name: "Change Password", action: "" },
      { name: "Logout", action: "logout()" },
    ],
  }),
  computed: {
    height() {
      switch (this.$vuetify.breakpoint.name) {
        case "xs":
          return 200;
        case "sm":
          return 400;
        case "md":
          return 500;
        case "lg":
          return 600;
        case "xl":
          return 800;
        default:
          return 800;
      }
    },
  },

  methods: {
    toggleDark() {
      this.isDark = !this.isDark;
      this.$vuetify.theme.dark = !this.$vuetify.theme.dark;
    },
  },
};
</script>

