<template>
  <div>
    <v-card class="mx-auto overflow-hidden">
      <v-app-bar
        app
        clipped-left
        style="background-color: #e33333; color: #fff"
        height="45px"
        elevation="4"
      >
        <v-menu origin="center center" transition="scale-transition" offset-y>
          <template v-slot:activator="{ on, attrs }">
            <v-btn
              style="padding-left: 38px; color: #fff"
              class="ms-5"
              icon
              v-bind="attrs"
              v-on="on"
              font-weight-bold
            >
              <v-list-item-title class="ms-6"></v-list-item-title>
              <v-icon>mdi-chevron-down</v-icon>
              STL Vision
            </v-btn>
            <v-list-item-title></v-list-item-title>
          </template>

          <v-list>
            <v-list-item v-for="(item, i) in companies" :key="i">
              <v-list-item-title>{{ item.name }}</v-list-item-title>
            </v-list-item>
          </v-list>
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
            <v-btn icon  v-bind="attrs" v-on="on">
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
            <v-btn icon  v-bind="attrs" v-on="on">
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
              <v-icon color = "white">mdi-account-circle</v-icon>
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
            <v-btn icon  v-bind="attrs" v-on="on">
              <v-icon color ="white">mdi-server</v-icon>
            </v-btn>
            <!-- <v-list-item-title></v-list-item-title> -->
          </template>

          <v-list>
            <v-list-item  >
              <v-list-item-title>Options</v-list-item-title>
            </v-list-item>
          </v-list>
          <v-list>
            <v-list-item >
              <v-list-item-title>Change Password</v-list-item-title>
            </v-list-item>
          </v-list>
          <v-list>
            <v-list-item  @click="logout()">
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
            <v-list-item-title  :class="'font-weight-bold text-subtitle-1 text-capitalize mb-2 '+menuItem.color+'--text'">
              
              <div>
                <v-icon left large :color="menuItem.color">{{ menuItem.icon }}</v-icon >
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
        color: "blue"
      },
      {
        name: "Reports",
        route: "/admin/dashboard/admin-reports",
        icon: "mdi-chart-box",
        color: "green"
      },
      // {
      //   name: "Compliances",
      //   route: "/dashboard/compliances",
      //   icon: "mdi-clipboard-text",
      //   color: "red"
      // },
      // {
      //   name: "Submit Compliance",
      //   route: "/dashboard/comply",
      //   icon: "mdi-file-plus",
      //   color: "brown",
      // },
    ],
    companies: [
      {name: "STL Vision",},
      {name: "STL South Africa",},
    ],
    userOptions: [
      {name: "Options", action:""},
      {name: "Change Password", action:""},
      {name: "Logout", action: 'logout()'},
    ],
  }),
  methods: {
    logout() {
      this.$router.push('/')
    }
  }
};
</script>

<!--<template>
  <div>
    <v-app>
       DASHBOARD 
      <div
        class="nav-menu parent"
        style="
          height: 45px;
          width: 98%;
          padding: 0px;
          padding-top: 0.3%;
          margin-left: 1%;
          margin-right: 1%;
        "
      >
        <div class="left-buttons" style="margin-left: 10px">
          <button
            class="btn btn-lg"
            text
            v-on:click="
              getCompanyList();
              seen1 = !seen1;
            "
          >
            {{ selectedCompanyName }}
            <span class="input-group-addon"
              ><i class="fa fa-chevron-down"></i
            ></span>
          </button>
        </div>
        <div class="filler"></div>
        <img
          class="bgimg-1"
          src="../img/eboard_Logo_new@2x.png"
          style="height: 75%; width: auto; padding-top: 5px"
        />
        <div class="filler"></div>
        <div class="right-buttons">
          <button class="btn btn-lg" text v-on:click="seen2 = !seen2">
            {{ userLanguage.language }}
          </button>
          <button class="btn btn-lg" @click="reloadPage">
            <v-icon color="#ffffff">mdi-refresh</v-icon>
          </button>
          <button class="btn btn-lg" text v-on:click="seen4 = !seen4">
            <v-icon color="#ffffff">mdi-magnify</v-icon>
          </button>
          <button class="btn btn-lg" text v-on:click="seen5 = !seen5">
            <v-icon color="#ffffff">mdi-contact-mail</v-icon>
          </button>
          <button class="btn btn-lg" text v-on:click="seen6 = !seen6">
            <v-icon color="#ffffff">mdi-server</v-icon>
          </button>
        </div>
      </div>

      <div>
         Companies 
        <div
          style="
            height: 850px;
            width: auto;
            position: absolute;
            z-index: 1;
            margin-left: 1%;
            overflow: auto;
          "
          v-if="seen1"
        >
          <v-list>
            <v-list-item-title style="color: #e33333; padding: 15px"
              >Company List</v-list-item-title
            >
            <v-list-item v-for="(item, index) in companyList" :key="index">
              <v-list-item-title
                onMouseOver="this.style.color='red'"
                onMouseOut="this.style.color='#000'"
                v-on:click="changeCompanyDetails(item)"
                style="cursor: pointer"
              >
                {{ item.companyName }}
                <v-divider></v-divider>
              </v-list-item-title>
            </v-list-item>
          </v-list>
        </div>

         English 
        <div
          style="
            margin-left: 80%;
            height: auto;
            width: 19%;
            position: absolute;
            z-index: 1;
            margin-right: 1%;
          "
          v-if="seen2"
        >
          <v-list style="position">
            <v-list-item-title style="color: #e33333; padding: 15px"
              >Select Language</v-list-item-title
            >
            <v-list-item v-for="(item, index) in allLanguages" :key="index">
              <v-list-item-title>
                {{ item.language }} <v-divider></v-divider>
              </v-list-item-title>
            </v-list-item>
          </v-list>
        </div>

         Search 
        <div
          style="
            margin-left: 80%;
            height: auto;
            width: 19%;
            position: absolute;
            z-index: 1;
            margin-right: 1%;
          "
          v-if="seen4"
        >
          <v-list style="position; padding:5%; color:#e33333">
            <div class="input-group-addon" style="margin-bottom: 20px">
              <input
                type="text"
                placeholder="Search"
                style="
                  width: 84%;
                  float: left;
                  outline: none;
                  border-bottom: 2px solid #e33333;
                "
              />
              <button
                class="btn btn-md"
                style="padding: 0px; float: left; outline: none"
                text
              >
                <v-icon color="#e33333">mdi-magnify</v-icon>
              </button>
            </div>
          </v-list>
        </div>

         Profile 
        <div
          style="
            margin-left: 80%;
            height: auto;
            width: 19%;
            position: absolute;
            z-index: 1;
            margin-right: 1%;
          "
          v-if="seen5"
        >
          <v-card style="padding: 1%; color: #e33333; height: auto">
            <v-card-actions>
              <div style="float: left; margin: 0px">
                <img
                  v-bind:src="userInfo.imageUrl"
                  style="
                    height: 85px;
                    width: 95px;
                    background-color: #fff;
                    border: 1px solid black;
                  "
                />
              </div>
              <div style="float: left; position: relative; margin: 0px">
                <v-card-text>
                  <p style="font-size: 21px; margin: 0px">
                    {{ userInfo.userFullName }}
                  </p>
                  <p style="font-size: 13px; margin: 0px">
                    {{ userInfo.userPhone }}
                  </p>
                  <p style="font-size: 13px; margin: 0px">
                    {{ userInfo.userEmail }}
                  </p>
                </v-card-text>
              </div>
            </v-card-actions>
          </v-card>
        </div>

         OPTIONS 
        <div
          style="
            margin-left: 80%;
            height: auto;
            width: 19%;
            position: absolute;
            z-index: 1;
            margin-right: 1%;
          "
          v-if="seen6"
        >
          <v-list style="padding: 2%; background-color: #ffffff">
            <div>
              <p style="color: #e33333">
                Options<span style="float: right">v3.0.1</span>
              </p>
            </div>
            <div
              class="row"
              style="
                margin: 0px;
                margin-top: 3px;
                margin-bottom: 3px;
                padding: 0px;
              "
            >
              <div
                class="col-md-12 col-sm-12"
                style="margin: 0px; padding: 0px"
              >
                <v-dialog v-model="dialog" persistent max-width="390">
                  <template v-slot:activator="{ on, attrs }">
                    <a
                      v-bind="attrs"
                      v-on="on"
                      style="cursor: pointer"
                      onMouseOver="this.style.color='red'"
                      onMouseOut="this.style.color='#000'"
                      >Change Password</a
                    >
                  </template>
                  <div
                    class="expired-password"
                    style="background-color: #f5f5f5; padding: 5.5%"
                  >
                    <h4>Change Password?</h4>
                    <p
                      v-if="expiredSuccess == 1"
                      style="font-weight: bold; color: green"
                    >
                      {{ expiredMessage }}
                    </p>
                    <p v-else style="font-weight: bold; color: red">
                      {{ expiredMessage }}
                    </p>
                    <form @submit.prevent="expiredPassword">
                      <div class="input-group mb-2">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fa fa-lock"></i>
                          </div>
                        </div>
                        <input
                          type="password"
                          class="form-control"
                          name="oldPass"
                          id="oldPass"
                          placeholder="Old Password"
                          v-model="oldPass"
                        />
                      </div>
                      <div class="input-group mb-2">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fa fa-lock"></i>
                          </div>
                        </div>
                        <input
                          type="password"
                          class="form-control"
                          name="newPass"
                          id="newPass"
                          placeholder="New Password"
                          v-model="newPass"
                        />
                      </div>
                      <div class="input-group mb-2">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fa fa-lock"></i>
                          </div>
                        </div>
                        <input
                          type="password"
                          class="form-control"
                          name="confirmPass"
                          id="confirmPass"
                          placeholder="Confirm Password"
                          v-model="confirmPass"
                        />
                      </div>
                      <div style="display: flex">
                        <button
                          class="btn btn-primary"
                          @click="
                            dialog = false;
                            clearExpired();
                          "
                        >
                          Cancel
                        </button>
                        <span style="flex-grow: 1"></span>
                        <button type="submit" class="btn btn-primary">
                          Submit
                        </button>
                      </div>
                    </form>
                  </div>
                </v-dialog>
              </div>
            </div>
            <v-divider style="margin: 0px; padding: 0px"></v-divider>

            <div
              class="row"
              style="
                margin: 0px;
                margin-top: 3px;
                margin-bottom: 3px;
                padding: 0px;
              "
            >
              <div
                class="col-md-12 col-sm-12"
                style="margin: 0px; padding: 0px"
              >
                <a
                  style="cursor: pointer"
                  onMouseOver="this.style.color='red'"
                  onMouseOut="this.style.color='#000'"
                  v-on:click="logout"
                  >Logout</a
                >
              </div>
            </div>
            <v-divider style="margin: 0px; padding: 0px"></v-divider>
          </v-list>
        </div>
      </div>

      <div style="display: flex">
        <div
          class="col-left"
          style="
            width: 20%;
            height: 900px;
            overflow: auto;
            margin-left: 1%;
            margin-right: 1%;
            margin-top: 1%;
            float: left;
            position: relative;
          "
        >
          <div v-for="(item, index) in even(dashboardMenuList)" :key="index">
            <router-link
              :to="{ name: item.menuTitle }"
              style="text-decoration: none"
              :style="{ color: 'rgb(' + item.menuColor + ')' }"
            >
              <div
                class="left-menu"
                style="border-top: 5px solid; padding: 3.3%"
              >
                <div class="input-group d-flex" >
                  <span class="input-group-addon">
                    <img
                      v-bind:src="item.menuImageUrl"
                      v-bind:alt="item.menuTitle"
                      v-bind:style="{ width: '60px', height: '50px' }"
                    />
                  </span>
                  <v-spacer></v-spacer>
                  <p>{{ item.menuTitle }}</p>
                </div>
              </div>
            </router-link>
          </div>
        </div>

        <div
          class="right"
          style="
            width: 77%;
            height: 900px;
            overflow: hidden;
            margin-right: 1%;
            margin-top: 1%;
            float: left;
            position: relative;
          "
        >
          <div
            class="col-right-top"
            style="padding: 1%; width: 100%; height: 35%"
          >
            <div class="input-group" style="color: #27ae60; font-weight: bold">
              <span class="input-group-addon"
                ><v-icon color="#27ae60">mdi-file-document</v-icon></span
              >
              <p style="margin-left: 20px; margin-right: 20px">My Inbox</p>
              <v-spacer></v-spacer>
            </div>

            <div style="width: 100%">
              <table width="100%" style="overflow-y: auto; overflow-x: auto">
                <tr>
                  <td>
                    <div style="width: 100%">
                      <table width="100%">
                        <tr style="color: #fff; background-color: #27ae60">
                          <th style="width: 5%; padding: 7px">No.</th>
                          <th style="width: 5%"></th>
                          <th style="width: 60%">Name</th>
                          <th style="width: 15%">Size</th>
                          <th style="width: 15%">Created_on</th>
                        </tr>
                      </table>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>
                    <div style="width: 100%; height: 190px; overflow: auto">
                      <table class="table-striped" width="100%">
                        <tbody>
                          <tr
                            v-for="(
                              item, index
                            ) in getRecentDocumentsArr.recentDocumentsList"
                            :key="index"
                          >
                            <td
                              style="
                                overflow: hidden;
                                text-overflow: ellipsis;
                                white-space: nowrap;
                                width: 5%;
                                padding: 7px;
                              "
                            >
                              {{ index + 1 + "." }}
                            </td>
                            <td
                              style="
                                overflow: hidden;
                                text-overflow: ellipsis;
                                white-space: nowrap;
                                width: 5%;
                              "
                            >
                              <span class="input-group-addon"
                                ><v-icon
                                  color="#27ae60"
                                  style="margin-right: 5px"
                                  >mdi-file-pdf-outline</v-icon
                                ></span
                              >
                            </td>
                            <td
                              style="
                                overflow: hidden;
                                text-overflow: ellipsis;
                                white-space: nowrap;
                                width: 60%;
                              "
                            >
                              <a
                                href="#"
                                style="color: #000"
                                onMouseOver="this.style.color='#27ae60'"
                                onMouseOut="this.style.color='#000'"
                                v-on:click="openPdfAnnotated(item)"
                              >
                                {{ item.itemName }}
                              </a>
                            </td>
                            <td
                              style="
                                overflow: hidden;
                                text-overflow: ellipsis;
                                white-space: nowrap;
                                width: 15%;
                              "
                            >
                              {{ item.itemSize | prettyBytes }}
                            </td>
                            <td
                              style="
                                overflow: hidden;
                                text-overflow: ellipsis;
                                white-space: nowrap;
                                width: 15%;
                              "
                            >
                              {{
                                parseInt(item.itemCreatedOn * 1000, 10)
                                  | moment("DD-MMM-YYYY")
                              }}
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </td>
                </tr>
              </table>
            </div>
          </div>

          <div
            class="right-bottom"
            style="width: 100%; height: 64%; margin-top: 1%"
          >
            <div
              class="col-right-bottom-left"
              style="
                width: 35%;
                height: 100%;
                margin-right: 1%;
                float: left;
                position: relative;
              "
            >
              <div v-if="test" class="input-group" style="width: 100%">
                <div class="parent">
                  <div class="left-buttons">
                    <v-icon
                      size="40"
                      style="
                        color: #e33333;
                        margin-top: 4px;
                        font-weight: bold;
                        display: inline;
                      "
                      >mdi-bell-outline</v-icon
                    >
                    <p
                      v-on:click="test = !test"
                      style="
                        margin-left: 9px;
                        font-size: 25px;
                        color: #e33333;
                        font-weight: bold;
                        cursor: pointer;
                        display: inline;
                      "
                    >
                      Notifications
                    </p>
                  </div>
                  <div class="filler"></div>
                  <div class="right-buttons">
                    <p
                      v-on:click="test = !test"
                      style="
                        margin-right: 9px;
                        font-size: 20px;
                        color: #e33333;
                        cursor: pointer;
                        display: inline;
                      "
                    >
                      Tasks
                    </p>
                    <span
                      class="input-group-addon"
                      style="
                        font-size: 17px;
                        font-weight: bold;
                        color: #e33333;
                        margin-top: 4px;
                        display: inline;
                      "
                      ><i class="fa fa-chevron-right"></i
                    ></span>
                  </div>
                </div>

                <div style="height: 500px; overflow: auto; width: 100%">
                  <div
                    class="parent"
                    style="padding: 4%; padding-bottom: 1%"
                    v-for="(
                      notification, index
                    ) in getLatestNotificationsArr.notificationsList"
                    :key="index"
                  >
                    <div class="left-buttons">
                      <v-icon
                        color="#E74343"
                        style="margin-top: 25px; margin-right: 70px"
                        >mdi-square</v-icon
                      >
                    </div>
                    <div class="right-buttons">
                      <p style="font-size: 21.5px">
                        {{ notification.notificationTitle }}
                      </p>
                      <p style="font-size: 17px">
                        {{ "Due on " }}
                        {{
                          parseInt(notification.notificationDateTime * 1000, 10)
                            | moment("DD-MMM-YYYY")
                        }}
                      </p>
                      <p style="font-size: 17px">
                        {{ notification.companyName }}
                      </p>
                    </div>
                    <hr />
                  </div>
                </div>
              </div>

              <div v-else class="input-group" style="width: 100%">
                <div class="parent">
                  <div class="left-buttons">
                    <v-icon
                      size="40"
                      style="
                        color: #e33333;
                        margin-top: 4px;
                        font-weight: bold;
                        display: inline;
                      "
                      >mdi-bell-outline</v-icon
                    >
                    <p
                      v-on:click="test = !test"
                      style="
                        margin-left: 9px;
                        font-size: 25px;
                        color: #e33333;
                        font-weight: bold;
                        cursor: pointer;
                        display: inline;
                      "
                    >
                      Tasks
                    </p>
                  </div>
                  <div class="filler"></div>
                  <div class="right-buttons">
                    <p
                      v-on:click="test = !test"
                      style="
                        margin-right: 9px;
                        font-size: 20px;
                        color: #e33333;
                        cursor: pointer;
                        display: inline;
                      "
                    >
                      Notifications
                    </p>
                    <span
                      class="input-group-addon"
                      style="
                        font-size: 17px;
                        font-weight: bold;
                        color: #e33333;
                        margin-top: 4px;
                        display: inline;
                      "
                      ><i class="fa fa-chevron-right"></i
                    ></span>
                  </div>
                </div>

                <div style="height: 500px; overflow: auto; width: 100%">
                  <div
                    class="parent"
                    style="padding: 4%; padding-bottom: 1%"
                    v-for="(task, index) in getLatestNotificationsArr.taskList"
                    :key="index"
                  >
                    <div class="left-buttons">
                      <v-icon
                        color="#E74343"
                        style="margin-top: 25px; margin-right: 70px"
                        >mdi-radiobox-marked</v-icon
                      >
                    </div>
                    <div class="right-buttons">
                      <p style="font-size: 21.5px">{{ task.taskTitle }}</p>
                      <p style="font-size: 17px">{{ task.companyName }}</p>
                    </div>
                    <hr />
                  </div>
                </div>
              </div>
            </div>

            <div
              class="col-right-bottom-right"
              style="
                padding: 1%;
                width: 64%;
                height: 100%;
                float: left;
                position: relative;
                overflow: auto;
              "
            >
              <FullCalendar
                defaultView="dayGridMonth"
                :plugins="calendarPlugins"
                :events="eventArray"
              />
            </div>
          </div>
        </div>

        <div
          v-if="closePDF"
          style="
            position: absolute;
            background-color: #f5f5f5;
            width: 77%;
            height: 900px;
            padding: 1%;
            overflow: hidden;
            margin-top: 1%;
            margin-right: 1%;
            margin-left: 22%;
            z-index: 2;
          "
        >
          <div style="margin-bottom: 10px">
            <button
              class="btn btn-lg"
              v-on:click="
                closePDF = !closePDF;
                shareDocument = false;
              "
              style="background-color: red; float: right; margin-right: 10px"
            >
              <v-icon>mdi-close-outline</v-icon>
            </button>
            <button
              class="btn btn-lg"
              v-on:click="openShareButton()"
              style="background-color: red; float: right; margin-right: 10px"
            >
              <v-icon>mdi-share-variant</v-icon>
            </button>
          </div>
          <v-card
            v-if="shareDocument"
            style="
              background-color: rgb(250, 250, 250);
              margin-bottom: 10px;
              position: absolute;
              margin-top: 7%;
              margin-left: 72%;
              width: 23%;
              height: 570px;
              overflow-y: hidden;
            "
          >
            <div
              style="
                height: 90%;
                overflow: auto;
                padding-left: 20px;
                padding-top: 10px;
              "
            >
              <div
                style="display: block"
                v-for="(item, index) in sharePeople"
                v-bind:key="index"
              >
                <input
                  type="checkbox"
                  v-bind:id="item.id_user"
                  v-bind:value="item.id_user"
                  v-model="checkNames"
                />
                <label
                  v-bind:for="item.id_user"
                  style="font-size: 15px; margin-left: 10px"
                  >{{ item.name }}</label
                ><br />
              </div>
            </div>
            <div style="height: 10%; margin-top: 13px">
              <v-btn
                v-on:click="shareDocument = !shareDocument"
                style="margin-left: 7px; float: left"
              >
                CANCEL
              </v-btn>

              <v-btn
                v-on:click="sendSharePeople()"
                style="margin-right: 7px; float: right"
              >
                SHARE
              </v-btn>
            </div>
          </v-card>

          <pspdfkit
            :pdf-url="pdf"
            :license-key="LICENSE_KEY"
            :base-url="baseUrl"
          >
          </pspdfkit>
        </div>
      </div>
    </v-app>
  </div>
</template>

<script>
var moment = require("axios");
import axios from "axios";
import FullCalendar from "../App.vue";
// import dayGridPlugin from "../App.vue";
import UserData from "../App.vue";
import JQuery from "../App.vue";
window.$ = JQuery;
import Vue from "vue";
import PSPDFKit from "../App.vue";

const LICENSE_KEY =
  "vuF0E1oK-8zmH0-rz6t6lt5x3AowOhR0kRILumR6xH5T9Ctre9Fo8gkBb404wT0dORhQliyk5XuSMMayurmNTJi4GRIuHL92DKOflXw04fv1UWthdwqHGQ0wM-E_0xTt4sk1jk9pWSkN5im3J_XmU8frGN2NYiSu-LP2BF_SFitDv9E-TSJWExDAZJVh4x3djWVg0bKVI-Pv2uS7fTh8ynEe4_7ivc-SoqEldi7evAfvas4X1EPse0VhJYWtgzhIjNs4RoXAazz4j4xPRgAQEYSL4JG6ZnT2fwCNq8uTqsnxi77aP0NvM69CmaOm_h-4yL3xCpVWV0k6HEiwO-fgn0fFQeHHRemKeXlGWnjrCBob4s1bDgjh0VWkTHRmZIbEA3jt6Ehh1VZQrlVusPOJggRF63X3sTowcQM5dPae-bHLMhdOB6pov8PKEOaWoR1pRw64NheynDAaA5elyCbP_xnG5cCuzDekt6U5K9KZ-wdc3kQFgS4kgbA1Ox1n3k2zbag_mqPkNOhzQ9AzDehO8H6W8L49hvQCQtmGAcm6nuA=";

const pspdfkit = Vue.component("pspdfkit", {
  template: `
        <div class="container" style="height:100%; width:97%;">
        </div>  
        `,
  name: "pspdfkit",
  props: ["pdfUrl", "licenseKey", "baseUrl"],
  _instance: null,

  mounted: function mounted() {
    this.getImportedData((annotations) => {
      try {
        this.load(JSON.parse(annotations));
      } catch (error) {
        this.load(JSON.parse(null));
      }
    });
  },

  data: () => ({
    quay: ";oihugvjk",
  }),

  methods: {
    load: function load(annotations) {
      const that = this;
      PSPDFKit.load({
        disableWebAssemblyStreaming: true,
        pdf: this.pdfUrl,
        pdf2: "example.pdf",
        container: ".container",
        licenseKey: this.licenseKey,
        baseUrl: this.baseUrl,
        instantJSON: annotations,
      })
        .then(function (instance) {
          that._instance = instance;
          that.$parent.errorMsg = "";
          instance.addEventListener("annotations.didSave", async () => {
            instance.exportInstantJSON().then(function (instantJSON) {
              const form = new FormData();
              form.append("payload", JSON.stringify(instantJSON));
              form.append("document_id", UserData.getDocumentId());
              form.append("user_id", UserData.getUserId());
              form.append("company_code", UserData.getCompanyCode());
              axios
                .post(
                  "                                                                                                                                            ",
                  form
                )
                .then((response) => {
                  console.log(response);
                });
            });
          });
        })
        .catch(function (err) {
          PSPDFKit.unload(".container");
          that.$parent.errorMsg = err.message;
        });
    },

    unload: function unload() {
      if (this._instance) {
        PSPDFKit.unload(this._instance || ".container");
        this._instance = null;
      }
    },

    getImportedData: function getImportedData(annotationsCallBack) {
      const form = new FormData();
      form.append("document_id", UserData.getDocumentId());
      form.append("user_id", UserData.getUserId());
      form.append("company_code", UserData.getCompanyCode());

      axios
        .post(
          "https://eserver1.stl-horizon.com/pspdfkit/importAnnotation.php",
          form
        )
        .then((response) => {
          var data = response.data;
          if (data) {
            if (annotationsCallBack instanceof Function) {
              annotationsCallBack(data.replace(/\\"/g, '"'));
            }
          } else {
            if (annotationsCallBack instanceof Function) {
              annotationsCallBack(data);
            }
          }
        });
    },
  },

  watch: {
    pdfUrl: function pdfUrl() {
      this.unload();
      this.load();
    },
  },

  beforeMount: function beforeMount() {},

  beforeDestroy: function beforeDestroy() {
    this.unload();
  },
});

export default {
  data: () => ({
    items: [
      { title: "Computer Warehouse Group" },
      { title: "STL Vision Botswana" },
      { title: "STL Vision Nairobi" },
      { title: "Vision Uganda" },
      { title: "Finserve Africa" },
      { title: "Deloite" },
    ],
    languages: [
      { title: "English" },
      { title: "French" },
      { title: "Amharic" },
      { title: "Portugese" },
    ],
    navDrawer: [
      { title: "Home", icon: "mdi-home-city" },
      { title: "My Account", icon: "mdi-account" },
      { title: "Users", icon: "mdi-account-group-outline" },
    ],
    tasks: [
      {
        title: "Prepare a report for FY 2019-2020",
        date: "Due on 31-Dec-2020",
        mark: "STL Training Env.",
      },
      {
        title: "Finalize on budgets for FY 2019-2020",
        date: "Due on 31-Dec-2020",
        mark: "STL Training Env.",
      },
      {
        title: "To prepare a Variance Report",
        date: "Due on 31-Dec-2020",
        mark: "STL Training Env.",
      },
      {
        title: "Prepare advert for new CEO position",
        date: "Due on 31-Dec-2020",
        mark: "STL Training Env.",
      },
    ],
    notifications: [
      {
        title: "Upcoming HR & Admin Committee",
        date: "Due on 22-Oct-2020",
        mark: "STL Vision",
      },
      {
        title: "Finalize on budgets for FY 2019-2020",
        date: "Due on 31-Oct-2020",
        mark: "STL Vision",
      },
      {
        title: "To prepare a Variance Report",
        date: "Due on 27-Oct-2020",
        mark: "STL Vision",
      },
      {
        title: "Prepare advert for new CEO position",
        date: "Due on 9-Nov-2020",
        mark: "STL Vision",
      },
    ],

    seen: false,
    seen1: false,
    seen2: false,
    seen3: true,
    seen4: false,
    seen5: false,
    seen6: false,
    test: true,
    closePDF: false,
    closePDF2: false,
    shareDocument: false,
    showMessages: false,
    dialog: false,
    changePassDiv: false,
    calendarPlugins: [
      {
        id: "5",
        deps: [],
        reducers: [],
        eventDefParsers: [],
        isDraggableTransformers: [],
        eventDragMutationMassagers: [],
        eventDefMutationAppliers: [],
        dateSelectionTransformers: [],
        datePointTransforms: [],
        dateSpanTransforms: [],
        views: {
          dayGrid: {
            _custom: {
              type: "function",
              display:
                "<span>ƒ</span> DayGridView(_context, viewSpec, dateProfileGenerator, parentEl)",
            },
          },
          dayGridDay: { type: "dayGrid", duration: { days: 1 } },
          dayGridWeek: { type: "dayGrid", duration: { weeks: 1 } },
          dayGridMonth: {
            type: "dayGrid",
            duration: { months: 1 },
            monthMode: true,
            fixedWeekCount: true,
          },
        },
        viewPropsTransformers: [],
        isPropsValid: null,
        externalDefTransforms: [],
        eventResizeJoinTransforms: [],
        viewContainerModifiers: [],
        eventDropTransformers: [],
        componentInteractions: [],
        calendarInteractions: [],
        themeClasses: {},
        eventSourceDefs: [],
        cmdFormatter: "__vue_devtool_undefined__",
        recurringTypes: [],
        namedTimeZonedImpl: "__vue_devtool_undefined__",
        defaultView: "dayGridMonth",
        elementDraggingImpl: "__vue_devtool_undefined__",
        optionChangeHandlers: {},
      },
    ],
    requestUserLogin: {
      twoFactorAuth: 0,
      passwordPolicy: [
        "password length: optional",
        "lower case letters: optional",
        "upper case letters: optional",
        "digits: optional",
        "special characters: optional",
      ],
      licencePolicyUrl: "http://eboard.stl-horizon.com/php/license.pdf",
      licencePolicyUrlHtml:
        "https://eserver1.stl-horizon.com/api/frontend/web/license/license.html",
      userId: "1",
      isDeviceVerified: "0",
      success: "1",
      message: "Login Successfull",
      accessToken: "8d6e8ae89a35af08b4ab6ea8f4c3278c",
      timeStamp: "1648305156",
      briefCaseTimeStamp: "1645540356",
      companyDetail: {
        companyName: "STL Vision",
        companyId: "2",
        companyCode: "dev",
        supportEmail:
          "eboardsupport@stl-horizon.com,jaswinder@stl-horizon.com, michael@stl-horizon.com",
        reportIssueEmail:
          "eboardsupport@stl-horizon.com,jaswinder@stl-horizon.com, michael@stl-horizon.com",
        companyLogo:
          "https://eserver1.stl-horizon.com/api_v14/frontend/web/user/files?companyCode=dev&actionTypes=getCompanyLogo&ImageId=1",
      },
      messageInfo: [
        {
          idUser: "1",
          groupName: "CEO",
          mesage: "\tyyy\t\t\t\t\t",
          fullMesage: "\tiiii\t\t\t\t\t",
          fullName: "Evance Omondi",
          imageUrl: "",
        },
        {
          idUser: "7",
          groupName: "Chair Lady",
          mesage: "\t\tchairlady test\t\t\t\t",
          fullMesage: "chairlady test\t\t\t\t\t\t",
          fullName: "jaswinder gahir",
          imageUrl: "",
        },
        {
          idUser: "1",
          groupName: "Chairman",
          mesage: "\tnew message jas\t\t\t\t\t",
          fullMesage: "\t\tnew messae jas\t\t\t\t",
          fullName: "Evance Omondi",
          imageUrl: "",
        },
        {
          idUser: "1",
          groupName: "Chairman",
          mesage: "\t\tnew jas \t\t\t\t",
          fullMesage: "new jas\t\t\t\t\t\t",
          fullName: "Evance Omondi",
          imageUrl: "",
        },
        {
          idUser: "1",
          groupName: "Chairman",
          mesage: "\ttest\t\t\t\t\t",
          fullMesage: "TEST\t\t\t\t\t\t",
          fullName: "Evance Omondi",
          imageUrl: "",
        },
      ],
      userInfo: {
        userFullName: "Evance Omondi",
        userName: "dev",
        userEmail: "michael@stl-horizon.com",
        companyName: "STL Vision",
        userPhone: "0721564198",
        userDesignation:
          "Directors,Administrator,CEO,Non Executive Directors (Shareholder),Managers,Non Executive Directors (Independent),Company Secretary,Committee,HR Committee,Audit Committee,group1,Chairman,Administrator,Non Executive Directors (Shareholder),Managers,Directors,Company Secretary,Committee",
        userImageId: "",
        imageUrl: "",
        userId: "1",
      },
      passwordExpiry: "0",
      userLanguage: { languageId: "1", language: "English" },
      allLanguages: [
        { languageId: "1", language: "English" },
        { languageId: "2", language: "French" },
        { languageId: "3", language: "Swahili (Kiswahili)" },
      ],
      dashboardMenuList: [
        {
          menuId: "0",
          menuImageUrl:
            "https://eboard.stl-horizon.com/devices/images/icons/briefcase@2x.png",
          menuCount: 0,
          menuColor: "205,143,41",
          menuTitle: "Briefcase",
          isEnablem: "1",
          sortOrder: "0",
          menuColor2: "#CD8F29",
          moduleCode: "",
        },
        {
          menuId: "1",
          menuImageUrl:
            "https://eboard.stl-horizon.com/devices/images/icons/meetingpacks_icon@2x.png",
          menuCount: 0,
          menuColor: "86,182,229",
          menuTitle: "Meeting Packs",
          isEnablem: "1",
          sortOrder: "0",
          menuColor2: "#56B6E5",
          moduleCode: "",
        },
        {
          menuId: "2",
          menuImageUrl:
            "https://eboard.stl-horizon.com/devices/images/icons/resource_icon@2x.png",
          menuCount: 0,
          menuColor: "227,58,58",
          menuTitle: "Resources",
          isEnablem: "1",
          sortOrder: "0",
          menuColor2: "#E33A3A",
          moduleCode: "",
        },
        {
          menuId: "3",
          menuImageUrl:
            "https://eboard.stl-horizon.com/devices/images/icons/Approvals_icon@2x.png",
          menuCount: 0,
          menuColor: "71,183,83",
          menuTitle: "Approvals",
          isEnablem: "1",
          sortOrder: "0",
          menuColor2: "#47B753",
          moduleCode: "",
        },
        {
          menuId: "4",
          menuImageUrl:
            "https://eboard.stl-horizon.com/devices/images/icons/Compliance@2x.png",
          menuCount: 0,
          menuColor: "162,29,33",
          menuTitle: "Compliance",
          isEnablem: "1",
          sortOrder: "0",
          menuColor2: "#A21D21",
          moduleCode: "CMP",
        },
        {
          menuId: "5",
          menuImageUrl:
            "https://eboard.stl-horizon.com/devices/images/icons/Evaluation_icon@2x.png",
          menuCount: 0,
          menuColor: "72,61,139",
          menuTitle: "Evaluation",
          isEnablem: "1",
          sortOrder: "0",
          menuColor2: "#483D8B",
          moduleCode: "EVL",
        },
        {
          menuId: "6",
          menuImageUrl: "",
          menuCount: 0,
          menuColor: "78,115,223",
          menuTitle: "Discussion",
          isEnablem: "1",
          sortOrder: "0",
          menuColor2: "#4E73DF",
          moduleCode: "",
        },
        {
          menuId: "9",
          menuImageUrl:
            "https://eboard.stl-horizon.com/devices/images/icons/plans.png",
          menuCount: 0,
          menuColor: "38,172,194",
          menuTitle: "Plans",
          isEnablem: "1",
          sortOrder: "0",
          menuColor2: "#26ACC2",
          moduleCode: "",
        },
        {
          menuId: "11",
          menuImageUrl:
            "https://eboard.stl-horizon.com/devices/images/icons/meetingpacks_icon@2x.png",
          menuCount: 0,
          menuColor: "86,182,229",
          menuTitle: "Meetings",
          isEnablem: "1",
          sortOrder: "0",
          menuColor2: "#56B6E5",
          moduleCode: "MTN",
        },
      ],
      videoConferenceCredentials: {
        userVideoLogin: "",
        userVideoEmail: "",
        userVideoPassword: "",
      },
      showMessagePopup: 1,
      qrImageUrl: "",
    },
    userInfo: {
      userFullName: "Evance Omondi",
      userName: "dev",
      userEmail: "michael@stl-horizon.com",
      companyName: "STL Vision",
      userPhone: "0721564198",
      userDesignation:
        "Directors,Administrator,CEO,Non Executive Directors (Shareholder),Managers,Non Executive Directors (Independent),Company Secretary,Committee,HR Committee,Audit Committee,group1,Chairman,Administrator,Non Executive Directors (Shareholder),Managers,Directors,Company Secretary,Committee",
      userImageId: "",
      imageUrl: "",
      userId: "1",
    },
    dashboardMenuList: [
      {
        menuId: "0",
        menuImageUrl:
          "https://eboard.stl-horizon.com/devices/images/icons/briefcase@2x.png",
        menuCount: 0,
        menuColor: "205,143,41",
        menuTitle: "Briefcase",
        isEnablem: "1",
        sortOrder: "0",
        menuColor2: "#CD8F29",
        moduleCode: "",
      },
      {
        menuId: "1",
        menuImageUrl:
          "https://eboard.stl-horizon.com/devices/images/icons/meetingpacks_icon@2x.png",
        menuCount: 0,
        menuColor: "86,182,229",
        menuTitle: "Meeting Packs",
        isEnablem: "1",
        sortOrder: "0",
        menuColor2: "#56B6E5",
        moduleCode: "",
      },
      {
        menuId: "2",
        menuImageUrl:
          "https://eboard.stl-horizon.com/devices/images/icons/resource_icon@2x.png",
        menuCount: 0,
        menuColor: "227,58,58",
        menuTitle: "Resources",
        isEnablem: "1",
        sortOrder: "0",
        menuColor2: "#E33A3A",
        moduleCode: "",
      },
      {
        menuId: "3",
        menuImageUrl:
          "https://eboard.stl-horizon.com/devices/images/icons/Approvals_icon@2x.png",
        menuCount: 0,
        menuColor: "71,183,83",
        menuTitle: "Approvals",
        isEnablem: "1",
        sortOrder: "0",
        menuColor2: "#47B753",
        moduleCode: "",
      },
      {
        menuId: "4",
        menuImageUrl:
          "https://eboard.stl-horizon.com/devices/images/icons/Compliance@2x.png",
        menuCount: 0,
        menuColor: "162,29,33",
        menuTitle: "Compliance",
        isEnablem: "1",
        sortOrder: "0",
        menuColor2: "#A21D21",
        moduleCode: "CMP",
      },
      {
        menuId: "5",
        menuImageUrl:
          "https://eboard.stl-horizon.com/devices/images/icons/Evaluation_icon@2x.png",
        menuCount: 0,
        menuColor: "72,61,139",
        menuTitle: "Evaluation",
        isEnablem: "1",
        sortOrder: "0",
        menuColor2: "#483D8B",
        moduleCode: "EVL",
      },
      {
        menuId: "6",
        menuImageUrl: "",
        menuCount: 0,
        menuColor: "78,115,223",
        menuTitle: "Discussion",
        isEnablem: "1",
        sortOrder: "0",
        menuColor2: "#4E73DF",
        moduleCode: "",
      },
      {
        menuId: "9",
        menuImageUrl:
          "https://eboard.stl-horizon.com/devices/images/icons/plans.png",
        menuCount: 0,
        menuColor: "38,172,194",
        menuTitle: "Plans",
        isEnablem: "1",
        sortOrder: "0",
        menuColor2: "#26ACC2",
        moduleCode: "",
      },
      {
        menuId: "11",
        menuImageUrl:
          "https://eboard.stl-horizon.com/devices/images/icons/meetingpacks_icon@2x.png",
        menuCount: 0,
        menuColor: "86,182,229",
        menuTitle: "Meetings",
        isEnablem: "1",
        sortOrder: "0",
        menuColor2: "#56B6E5",
        moduleCode: "MTN",
      },
    ],
    eventArray: [
      {
        title: "Board Briefing",
        date: "Invalid date",
        color: "rgb(element.eventColor)",
        textColor: "#fff",
      },
      {
        title: "The Board of Trustees' Meeting ",
        date: "Invalid date",
        color: "rgb(element.eventColor)",
        textColor: "#fff",
      },
      {
        title: "30th Board Meeting",
        date: "Invalid date",
        color: "rgb(element.eventColor)",
        textColor: "#fff",
      },
      {
        title: "31st Board Meeting",
        date: "Invalid date",
        color: "rgb(element.eventColor)",
        textColor: "#fff",
      },
      {
        title: "Evance And Briliant test",
        date: "Invalid date",
        color: "rgb(element.eventColor)",
        textColor: "#fff",
      },
      {
        title: "Briliant and Evance v m",
        date: "Invalid date",
        color: "rgb(element.eventColor)",
        textColor: "#fff",
      },
      {
        title: "BEB meeting test",
        date: "Invalid date",
        color: "rgb(element.eventColor)",
        textColor: "#fff",
      },
      {
        title: "aa",
        date: "Invalid date",
        color: "rgb(element.eventColor)",
        textColor: "#fff",
      },
      {
        title: "new year 2022",
        date: "Invalid date",
        color: "rgb(element.eventColor)",
        textColor: "#fff",
      },
      {
        title: "test 1 24012022",
        date: "Invalid date",
        color: "rgb(element.eventColor)",
        textColor: "#fff",
      },
    ],
    companyDetail: {
      companyName: "STL Vision",
      companyId: "2",
      companyCode: "dev",
      supportEmail:
        "eboardsupport@stl-horizon.com,jaswinder@stl-horizon.com, michael@stl-horizon.com",
      reportIssueEmail:
        "eboardsupport@stl-horizon.com,jaswinder@stl-horizon.com, michael@stl-horizon.com",
      companyLogo:
        "https://eserver1.stl-horizon.com/api_v14/frontend/web/user/files?companyCode=dev&actionTypes=getCompanyLogo&ImageId=1",
    },
    userLanguage: [{"languageId":"1","language":"English"}],
    allLanguages: [
      { languageId: "1", language: "English" },
      { languageId: "2", language: "French" },
      { languageId: "3", language: "Swahili (Kiswahili)" },
    ],
    companyList: [
      {
        companyId: "1",
        companyName: "parent company",
        companyLogo: "",
        companyCode: "dev",
        allowSharing: "Y",
        passwordPolicy: [
          "password length: optional",
          "lower case letters: optional",
          "upper case letters: optional",
          "digits: optional",
          "special characters: optional",
        ],
        reportIssueEmail:
          "eboardsupport@stl-horizon.com,jaswinder@stl-horizon.com, michael@stl-horizon.com",
        supportEmail:
          "eboardsupport@stl-horizon.com,jaswinder@stl-horizon.com, michael@stl-horizon.com",
        dashboardMenuList: [
          {
            menuId: "0",
            menuImageUrl:
              "https://eboard.stl-horizon.com/devices/images/icons/briefcase@2x.png",
            menuCount: 0,
            menuColor: "205,143,41",
            menuTitle: "Briefcase",
            isEnablem: "1",
            sortOrder: "0",
            menuColor2: "#CD8F29",
            moduleCode: "",
          },
          {
            menuId: "1",
            menuImageUrl:
              "https://eboard.stl-horizon.com/devices/images/icons/meetingpacks_icon@2x.png",
            menuCount: 0,
            menuColor: "86,182,229",
            menuTitle: "Meeting Packs",
            isEnablem: "1",
            sortOrder: "0",
            menuColor2: "#56B6E5",
            moduleCode: "",
          },
          {
            menuId: "2",
            menuImageUrl:
              "https://eboard.stl-horizon.com/devices/images/icons/resource_icon@2x.png",
            menuCount: 0,
            menuColor: "227,58,58",
            menuTitle: "Resources",
            isEnablem: "1",
            sortOrder: "0",
            menuColor2: "#E33A3A",
            moduleCode: "",
          },
          {
            menuId: "3",
            menuImageUrl:
              "https://eboard.stl-horizon.com/devices/images/icons/Approvals_icon@2x.png",
            menuCount: 0,
            menuColor: "71,183,83",
            menuTitle: "Approvals",
            isEnablem: "1",
            sortOrder: "0",
            menuColor2: "#47B753",
            moduleCode: "",
          },
          {
            menuId: "4",
            menuImageUrl:
              "https://eboard.stl-horizon.com/devices/images/icons/Compliance@2x.png",
            menuCount: 0,
            menuColor: "162,29,33",
            menuTitle: "Compliance",
            isEnablem: "1",
            sortOrder: "0",
            menuColor2: "#A21D21",
            moduleCode: "CMP",
          },
          {
            menuId: "5",
            menuImageUrl:
              "https://eboard.stl-horizon.com/devices/images/icons/Evaluation_icon@2x.png",
            menuCount: 0,
            menuColor: "72,61,139",
            menuTitle: "Evaluation",
            isEnablem: "1",
            sortOrder: "0",
            menuColor2: "#483D8B",
            moduleCode: "EVL",
          },
          {
            menuId: "6",
            menuImageUrl: "",
            menuCount: 0,
            menuColor: "78,115,223",
            menuTitle: "Discussion",
            isEnablem: "1",
            sortOrder: "0",
            menuColor2: "#4E73DF",
            moduleCode: "",
          },
          {
            menuId: "9",
            menuImageUrl:
              "https://eboard.stl-horizon.com/devices/images/icons/plans.png",
            menuCount: 0,
            menuColor: "38,172,194",
            menuTitle: "Plans",
            isEnablem: "1",
            sortOrder: "0",
            menuColor2: "#26ACC2",
            moduleCode: "",
          },
          {
            menuId: "11",
            menuImageUrl:
              "https://eboard.stl-horizon.com/devices/images/icons/meetingpacks_icon@2x.png",
            menuCount: 0,
            menuColor: "86,182,229",
            menuTitle: "Meetings",
            isEnablem: "1",
            sortOrder: "0",
            menuColor2: "#56B6E5",
            moduleCode: "MTN",
          },
        ],
        messageInfo: [],
      },
      {
        companyId: "2",
        companyName: "STL Vision",
        companyLogo:
          "https://eserver1.stl-horizon.com/api_v14/frontend/web/user/files?companyId=2&userId=1&companyCode=dev&actionTypes=getCompanyLogo&ImageId=1",
        companyCode: "dev",
        allowSharing: "Y",
        passwordPolicy: [
          "password length: optional",
          "lower case letters: optional",
          "upper case letters: optional",
          "digits: optional",
          "special characters: optional",
        ],
        reportIssueEmail:
          "eboardsupport@stl-horizon.com,jaswinder@stl-horizon.com, michael@stl-horizon.com",
        supportEmail:
          "eboardsupport@stl-horizon.com,jaswinder@stl-horizon.com, michael@stl-horizon.com",
        dashboardMenuList: [
          {
            menuId: "0",
            menuImageUrl:
              "https://eboard.stl-horizon.com/devices/images/icons/briefcase@2x.png",
            menuCount: 0,
            menuColor: "205,143,41",
            menuTitle: "Briefcase",
            isEnablem: "1",
            sortOrder: "0",
            menuColor2: "#CD8F29",
            moduleCode: "",
          },
          {
            menuId: "1",
            menuImageUrl:
              "https://eboard.stl-horizon.com/devices/images/icons/meetingpacks_icon@2x.png",
            menuCount: 0,
            menuColor: "86,182,229",
            menuTitle: "Meeting Packs",
            isEnablem: "1",
            sortOrder: "0",
            menuColor2: "#56B6E5",
            moduleCode: "",
          },
          {
            menuId: "2",
            menuImageUrl:
              "https://eboard.stl-horizon.com/devices/images/icons/resource_icon@2x.png",
            menuCount: 0,
            menuColor: "227,58,58",
            menuTitle: "Resources",
            isEnablem: "1",
            sortOrder: "0",
            menuColor2: "#E33A3A",
            moduleCode: "",
          },
          {
            menuId: "3",
            menuImageUrl:
              "https://eboard.stl-horizon.com/devices/images/icons/Approvals_icon@2x.png",
            menuCount: 0,
            menuColor: "71,183,83",
            menuTitle: "Approvals",
            isEnablem: "1",
            sortOrder: "0",
            menuColor2: "#47B753",
            moduleCode: "",
          },
          {
            menuId: "4",
            menuImageUrl:
              "https://eboard.stl-horizon.com/devices/images/icons/Compliance@2x.png",
            menuCount: 0,
            menuColor: "162,29,33",
            menuTitle: "Compliance",
            isEnablem: "1",
            sortOrder: "0",
            menuColor2: "#A21D21",
            moduleCode: "CMP",
          },
          {
            menuId: "5",
            menuImageUrl:
              "https://eboard.stl-horizon.com/devices/images/icons/Evaluation_icon@2x.png",
            menuCount: 0,
            menuColor: "72,61,139",
            menuTitle: "Evaluation",
            isEnablem: "1",
            sortOrder: "0",
            menuColor2: "#483D8B",
            moduleCode: "EVL",
          },
          {
            menuId: "6",
            menuImageUrl: "",
            menuCount: 0,
            menuColor: "78,115,223",
            menuTitle: "Discussion",
            isEnablem: "1",
            sortOrder: "0",
            menuColor2: "#4E73DF",
            moduleCode: "",
          },
          {
            menuId: "9",
            menuImageUrl:
              "https://eboard.stl-horizon.com/devices/images/icons/plans.png",
            menuCount: 0,
            menuColor: "38,172,194",
            menuTitle: "Plans",
            isEnablem: "1",
            sortOrder: "0",
            menuColor2: "#26ACC2",
            moduleCode: "",
          },
          {
            menuId: "11",
            menuImageUrl:
              "https://eboard.stl-horizon.com/devices/images/icons/meetingpacks_icon@2x.png",
            menuCount: 0,
            menuColor: "86,182,229",
            menuTitle: "Meetings",
            isEnablem: "1",
            sortOrder: "0",
            menuColor2: "#56B6E5",
            moduleCode: "MTN",
          },
        ],
        messageInfo: [
          {
            idUser: "1",
            groupName: "CEO",
            mesage: "\tyyy\t\t\t\t\t",
            fullMesage: "\tiiii\t\t\t\t\t",
            fullName: "Evance Omondi",
            imageUrl: "",
          },
          {
            idUser: "7",
            groupName: "Chair Lady",
            mesage: "\t\tchairlady test\t\t\t\t",
            fullMesage: "chairlady test\t\t\t\t\t\t",
            fullName: "jaswinder gahir",
            imageUrl: "",
          },
          {
            idUser: "1",
            groupName: "Chairman",
            mesage: "\tnew message jas\t\t\t\t\t",
            fullMesage: "\t\tnew messae jas\t\t\t\t",
            fullName: "Evance Omondi",
            imageUrl: "",
          },
          {
            idUser: "1",
            groupName: "Chairman",
            mesage: "\t\tnew jas \t\t\t\t",
            fullMesage: "new jas\t\t\t\t\t\t",
            fullName: "Evance Omondi",
            imageUrl: "",
          },
          {
            idUser: "1",
            groupName: "Chairman",
            mesage: "\ttest\t\t\t\t\t",
            fullMesage: "TEST\t\t\t\t\t\t",
            fullName: "Evance Omondi",
            imageUrl: "",
          },
        ],
      },
      {
        companyId: "4",
        companyName: "STL South Africa",
        companyLogo: "",
        companyCode: "dev",
        allowSharing: "Y",
        passwordPolicy: [
          "password length: optional",
          "lower case letters: optional",
          "upper case letters: optional",
          "digits: optional",
          "special characters: optional",
        ],
        reportIssueEmail:
          "eboardsupport@stl-horizon.com,jaswinder@stl-horizon.com, michael@stl-horizon.com",
        supportEmail:
          "eboardsupport@stl-horizon.com,jaswinder@stl-horizon.com, michael@stl-horizon.com",
        dashboardMenuList: [
          {
            menuId: "0",
            menuImageUrl:
              "https://eboard.stl-horizon.com/devices/images/icons/briefcase@2x.png",
            menuCount: 0,
            menuColor: "205,143,41",
            menuTitle: "Briefcase",
            isEnablem: "1",
            sortOrder: "0",
            menuColor2: "#CD8F29",
            moduleCode: "",
          },
          {
            menuId: "1",
            menuImageUrl:
              "https://eboard.stl-horizon.com/devices/images/icons/meetingpacks_icon@2x.png",
            menuCount: 0,
            menuColor: "86,182,229",
            menuTitle: "Meeting Packs",
            isEnablem: "1",
            sortOrder: "0",
            menuColor2: "#56B6E5",
            moduleCode: "",
          },
          {
            menuId: "2",
            menuImageUrl:
              "https://eboard.stl-horizon.com/devices/images/icons/resource_icon@2x.png",
            menuCount: 0,
            menuColor: "227,58,58",
            menuTitle: "Resources",
            isEnablem: "1",
            sortOrder: "0",
            menuColor2: "#E33A3A",
            moduleCode: "",
          },
          {
            menuId: "3",
            menuImageUrl:
              "https://eboard.stl-horizon.com/devices/images/icons/Approvals_icon@2x.png",
            menuCount: 0,
            menuColor: "71,183,83",
            menuTitle: "Approvals",
            isEnablem: "1",
            sortOrder: "0",
            menuColor2: "#47B753",
            moduleCode: "",
          },
          {
            menuId: "4",
            menuImageUrl:
              "https://eboard.stl-horizon.com/devices/images/icons/Compliance@2x.png",
            menuCount: 0,
            menuColor: "162,29,33",
            menuTitle: "Compliance",
            isEnablem: "1",
            sortOrder: "0",
            menuColor2: "#A21D21",
            moduleCode: "CMP",
          },
          {
            menuId: "5",
            menuImageUrl:
              "https://eboard.stl-horizon.com/devices/images/icons/Evaluation_icon@2x.png",
            menuCount: 0,
            menuColor: "72,61,139",
            menuTitle: "Evaluation",
            isEnablem: "1",
            sortOrder: "0",
            menuColor2: "#483D8B",
            moduleCode: "EVL",
          },
          {
            menuId: "6",
            menuImageUrl: "",
            menuCount: 0,
            menuColor: "78,115,223",
            menuTitle: "Discussion",
            isEnablem: "1",
            sortOrder: "0",
            menuColor2: "#4E73DF",
            moduleCode: "",
          },
          {
            menuId: "9",
            menuImageUrl:
              "https://eboard.stl-horizon.com/devices/images/icons/plans.png",
            menuCount: 0,
            menuColor: "38,172,194",
            menuTitle: "Plans",
            isEnablem: "1",
            sortOrder: "0",
            menuColor2: "#26ACC2",
            moduleCode: "",
          },
          {
            menuId: "11",
            menuImageUrl:
              "https://eboard.stl-horizon.com/devices/images/icons/meetingpacks_icon@2x.png",
            menuCount: 0,
            menuColor: "86,182,229",
            menuTitle: "Meetings",
            isEnablem: "1",
            sortOrder: "0",
            menuColor2: "#56B6E5",
            moduleCode: "MTN",
          },
        ],
        messageInfo: [
          {
            idUser: "11",
            groupName: "Chairman",
            mesage: "\t\ttest\t\t\t\t",
            fullMesage: "\t\t\ttest\t\t\t",
            fullName: "Derick Prince",
            imageUrl:
              "https://eserver1.stl-horizon.com/api_v14/frontend/web/user/files?companyCode=dev&actionTypes=getUserImages&ImageId=14",
          },
        ],
      },
    ],
    getLatestNotificationsArr: [],
    getRecentDocumentsArr: [],
    getCalendarEventsArr: [],
    checkNames: [],
    companyListId: "",
    selectedCompanyName: "STL Vision",
    moment: moment,
    date: 1570064727,
    pdf: "example.pdf",
    LICENSE_KEY: LICENSE_KEY,
    baseUrl: "",
    errorMsg: "",
    expiredMessage: "",
    expiredSuccess: "",
    oldPass: "",
    newPass: "",
    confirmPass: "",
  }),

  filters: {
    moment: function (date) {
      return moment(date).format("YYYY-MM-DD");
    },
  },

  computed: {
    isLoggedIn: function () {
      return this.$store.getters.isLoggedIn;
    },
  },

  methods: {
    logout() {
      this.$store.commit("setAuthentication", false);
      this.$router.replace("/");
    },

    openPdfAnnotated(item) {
      if (item.itemExtension == "pdf") {
        this.closePDF = !this.closePDF;
        this.pdf = item.itemUrl;
        UserData.setDocumentId(item.itemId);
        return;
      }
      if (item.itemExtension == "docx") {
        window.open(item.itemUrl);
      }
      if (item.itemExtension == "pptx") {
        window.open(item.itemUrl);
      }
      if (item.itemExtension == "xlsx") {
        window.open(item.itemUrl);
      }
    },

    openPdfOriginal(item) {
      this.closePDF = !this.closePDF;
      this.pdf = item.itemUrl;
    },

    reloadPage() {
      window.location.reload();
    },

    convertDate(date, format) {
      return moment(this.date).format(format);
    },

    convertToUtc(date, format) {
      return moment(this.date).utc().format(format);
    },

    getRequestUserLogin() {
      const formData = new FormData();
      formData.append("userName", UserData.getUserName());
      formData.append("userPassword", UserData.getUserPassword());
      formData.append("companyCode", UserData.getCompanyCode());
      formData.append("model", "requestUserLogin");
      formData.append("mobileVersion", "11.4.1");
      formData.append("deviceName", "ipad air 2");
      formData.append(
        "deviceToken",
        "b41dfaf1ba018196d5068a0ecc3bde33f83c94131ecf71d053260b944da14612"
      );
      formData.append("eboardVersion", "2.5.7");

      axios
        .post(UserData.getBaseUrl(), formData)
        .then((response) => {
          this.requestUserLogin = response.data;
          this.dashboardMenuList = this.requestUserLogin.dashboardMenuList;
          this.allLanguages = this.requestUserLogin.allLanguages;
          this.userInfo = JSON.parse(
            JSON.stringify(this.requestUserLogin.userInfo)
          );
          this.companyDetail = JSON.parse(
            JSON.stringify(this.requestUserLogin.companyDetail)
          );
          this.userLanguage = JSON.parse(
            JSON.stringify(this.requestUserLogin.userLanguage)
          );
        })
        .catch((error) => {
          console.log(error);
        });
    },

    getCompanyName() {
      this.selectedCompanyName = UserData.getCompanyName();
    },

    getCompanyList() {
      const formData = new FormData();
      formData.append("userId", UserData.getUserId());
      formData.append("companyCode", UserData.getCompanyCode());
      formData.append("accessToken", UserData.getAccessToken());
      formData.append("model", "getCompanyList");
      formData.append("companyId", UserData.getCompanyId());

      axios
        .post(UserData.getBaseUrl(), formData)
        .then((response) => {
          this.getCompanyListArr = response.data;
          this.companyList = this.getCompanyListArr.companyList;
          this.$localStorage.set(
            "getCompanyList",
            JSON.stringify(this.getCompanyListArr)
          );
        })
        .catch((e) => {
          console.log("Error", e);
        });
    },

    getLatestNotifications() {
      const formData = new FormData();
      formData.append("userId", UserData.getUserId());
      formData.append("companyCode", UserData.getCompanyCode());
      formData.append("accessToken", UserData.getAccessToken());
      formData.append("model", "getLatestNotifications");
      formData.append("companyId", UserData.getCompanyId());

      axios
        .post(UserData.getBaseUrl(), formData)
        .then((response) => {
          this.getLatestNotificationsArr = response.data;
          this.$localStorage.set(
            "getLatestNotifications",
            JSON.stringify(this.getLatestNotificationsArr)
          );
        })
        .catch((e) => {
          console.log("Error", e);
        });
    },

    getEboardUpdates() {
      axios
        .get("../assets/json-APIs/getEboardUpdates.json")
        .then((response) => {
          this.getEboardUpdates = response.data;
        })
        .catch((e) => {
          console.log("Error", e);
        });
    },

    getRecentDocuments() {
      const formData = new FormData();
      formData.append("userId", UserData.getUserId());
      formData.append("companyCode", UserData.getCompanyCode());
      formData.append("accessToken", UserData.getAccessToken());
      formData.append("model", "getRecentDocuments");
      formData.append("companyId", UserData.getCompanyId());

      axios
        .post(UserData.getBaseUrl(), formData)
        .then((response) => {
          this.getRecentDocumentsArr = response.data;
          this.$localStorage.set(
            "getRecentDocuments",
            JSON.stringify(this.getRecentDocumentsArr)
          );
        })
        .catch((e) => {
          console.log("Error", e);
        });
    },

    getCalendarEvents() {
      const formData = new FormData();
      formData.append("userId", UserData.getUserId());
      formData.append("companyCode", UserData.getCompanyCode());
      formData.append("accessToken", UserData.getAccessToken());
      formData.append("model", "getCalendarEvents");
      formData.append("companyId", UserData.getCompanyId());

      axios
        .post(UserData.getBaseUrl(), formData)
        .then((response) => {
          this.getCalendarEventsArr = response.data;
          this.eventArray = this.getCalendarEventsArr.eventList;
          this.$localStorage.set(
            "getCalendarEvents",
            JSON.stringify(this.getCalendarEventsArr)
          );
          this.eventArray = this.eventArray.map((element) => {
            return {
              title: element.eventTitle,
              date: moment(parseInt(element.eventBeginDate * 1000, 10)).format(
                "YYYY-MM-DD"
              ),
              color: `rgb(element.eventColor)`,
              textColor: "#fff",
            };
          });
        })
        .catch((e) => {
          console.log("Error", e);
        });
    },

    changeCompanyDetails(item) {
      this.seen1 = false;
      this.dashboardMenuList = 0;
      this.dashboardMenuList = item.dashboardMenuList;
      UserData.setCompanyId(item.companyId);
      UserData.setCompanyName(item.companyName);
      this.getCompanyList();
      this.getLatestNotifications();
      this.getRecentDocuments();
      this.getCalendarEvents();
      this.selectedCompanyName = UserData.getCompanyName();
    },

    clearExpired() {
      this.oldPass = "";
      this.newPass = "";
      this.confirmPass = "";
    },

    expiredPassword() {
      const formData = new FormData();
      formData.append("oldPassword", this.oldPass);
      formData.append("newPassword", this.newPass);
      formData.append("confirmPassword", this.confirmPass);
      formData.append("companyCode", UserData.getCompanyCode());
      formData.append("userName", UserData.getUserName());
      formData.append("model", "changePassword");
      formData.append("passwordExpiry", 0);

      axios.post(UserData.getBaseUrl(), formData).then((response) => {
        this.expiredPasswordArr = response.data;
        this.expiredMessage = this.expiredPasswordArr.message;
        this.expiredSuccess = this.expiredPasswordArr.success;
        this.clearExpired();
      });
    },

    getLink() {
      let routeData = this.$router.resolve({
        name: this.getRecentDocumentsArr.recentDocumentsList.itemUrl,
        query: { data: this.getRecentDocumentsArr.recentDocumentsList.itemUrl },
      });
      window.open(routeData.href, "_blank");
    },

    even: function (dashboardMenuList) {
      return dashboardMenuList.slice().sort(function (a, b) {
        return a.menuId - b.menuId;
      });
    },

    // postData() {
    //   const dt = { data: { value: "gdfg1df2g2121dgfdg" } };
    //   const request = axios.post(
    //     "../assets/json-APIs/requestUserLogin.json",
    //     dt
    //   );
    // },

    sendSharePeople() {
      if (this.checkNames == 0) {
        console.log("Select persons to share to!");
      } else {
        const formData = new FormData();
        formData.append("document_id", UserData.getDocumentId());
        formData.append("company_code", UserData.getCompanyCode());
        formData.append("id_users", this.checkNames);

        axios
          .post(
            "https://eserver1.stl-horizon.com/pspdfkit/shareAnnotation.php",
            formData
          )
          .then((response) => {
            this.sendSharePeopleArray = response.data;
          })
          .catch((e) => {
            console.log("Error", e);
          });
        this.checkNames.length = 0;
        this.shareDocument = false;
      }
    },

    openShareButton() {
      const formData = new FormData();
      formData.append("company_code", UserData.getCompanyCode());
      formData.append("document_id", UserData.getDocumentId());

      axios
        .post(
          "https://eserver1.stl-horizon.com/pspdfkit/shareAnnotation.php",
          formData
        )
        .then((response) => {
          this.sharePeople = response.data;
          console.log(this.sharePeople);
          this.shareDocument = !this.shareDocument;
        })
        .catch((e) => {
          console.log("Error", e);
        });
    },

    openPDF: function openPDF(e) {
      this.pdf = window.URL.createObjectURL(e.target.files[0]);
    },

    swapComponent: function (component) {
      this.currentComponent = component;
    },
  },

  beforeMount() {
    this.getRequestUserLogin();
    this.getLatestNotifications();
    this.getRecentDocuments();
    this.getCalendarEvents();
    this.getCompanyName();
  },

  components: {
    FullCalendar, // make the <FullCalendar> tag available
    pspdfkit: pspdfkit,
  },
};
</script>

<style scoped>
/* @import "~@fullcalendar/core/main.css";
@import "~@fullcalendar/daygrid/main.css"; */

body {
  padding: 0px;
  margin: 0px;
}

.fixed_header {
  width: 100%;
  table-layout: fixed;
  border-collapse: collapse;
}

.fixed_header tbody {
  display: block;
  width: 100%;
  height: 190px;
  overflow-y: scroll;
  overflow-x: hidden;
}

.fixed_header thead tr {
  display: block;
}

.fixed_header thead {
  background: black;
  color: #fff;
}

.fixed_header th,
.fixed_header td {
  text-align: left;
  height: 40px;
}

.nav-menu {
  margin-top: 0px;
  background-color: #e33333;
}

.nav-menu .btn {
  background-color: #e33333;
  border: none;
  padding: 0px;
  margin-right: 15px;
  color: white;
  outline: none;
}

.col-left .left-menu {
  background-color: #f5f5f5;
  align-content: center;
  margin-bottom: 10px;
  font-size: 20px;
}

.col-right {
  float: left;
  width: 73%;
  overflow: hidden;
  height: auto;
  margin-top: 1%;
  position: relative;
}

.col-right th {
  padding: 5px;
}

.col-right td {
  padding: 3px;
}

.col-right-top {
  height: 230px;
  background-color: #f5f5f5;
  margin-bottom: 15px;
  padding: 10px;
  border-top: 5px solid #27ae60;
}

.col-right-bottom {
  height: 430px;
  background-color: #ffffff;
}

.col-right-bottom-left {
  background-color: #f5f5f5;
}

.col-right-bottom-right {
  width: 59%;
  height: 430px;
  background-color: #f5f5f5;
  float: left;
  padding: 1%;
}
.col-right-top .btn {
  padding: 3px;
  width: 100px;
}

.menu-row-icon-six {
  margin: 0px;
  padding: 0px;
  color: #e33333;
}

button:focus {
  outline: 0 !important;
  border: 0 !important;
  box-shadow: none !important;
}

a {
  text-decoration: none;
  color: #000000;
}

a:hover {
  color: #27ae60;
}

.parent {
  display: flex;
  width: 100%;
  height: auto;
  padding: 2%;
}

.filler {
  flex-grow: 1;
}
</style>
-->
