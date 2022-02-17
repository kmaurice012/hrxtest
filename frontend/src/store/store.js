import Vue from "vue";
import Vuex from "vuex";
// import * as user from '@/store/modules/user.js'
import Event from "../services/admin_api";
// import Compliance from "../services/admin_api";
// import userCompliances from '../services/admin_api'
// import * as notification from '@/store/modules/notification.js'

Vue.use(Vuex);
let event = Event.Event;
// let compliance = Compliance.Compliance;

export default new Vuex.Store({
  component: {
    Event,
    // Compliance,
  },
  state: {
    event,
    // compliance,
    // userCompliances
  },
});
