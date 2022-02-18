// import dependency to handle HTTP request to our back end
import Vuex from "vuex";
import Vue from "vue";
import AdminApi from "../services/admin_api";
// import   Compliance from  '../services/admin_api'
// let events = Events.Events
// let compliance =  Compliance. Compliance
//load Vuex
Vue.use(Vuex);

//to handle state

export default new Vuex.Store({
  state: {
    events: [],
    compliances: [],
    companies: [],
    usercomps: []
    //   compliance
  },
  mutations: {
    SET_EVENT(state, events) {
      state.events = [...events];
    },
    SET_COMPLIANCES(state, compliances) {
      state.compliances = [...compliances];
    },
    SET_COMPANIES(state, companies) {
        state.companies = [...companies];
      },
      SET_USERCOMPS(state, usercomps) {
        state.usercomps = [...usercomps];
      },

  },
  actions: {
    fetchEvents({ commit }) {
      AdminApi.getEvents()
        .then((response) => {
          commit("SET_EVENT", response.data);
        })
        .catch((error) => {
          console.log("There was an error:", error.response);
        });
    },
    fetchCompliances({ commit }) {
      AdminApi.getComplinces()
        .then((response) => {
          commit("SET_COMPLIANCES", response.data);
        })
        .catch((error) => {
          console.log("There was an error:", error.response);
        });
    },
    fetchCompanies({ commit }) {
        AdminApi.getCompanies()
          .then((response) => {
            commit("SET_COMPANIES", response.data);
          })
          .catch((error) => {
            console.log("There was an error:", error.response);
          });
      },
      fetchUsercomps({ commit }) {
        AdminApi.getUsercomps()
          .then((response) => {
            commit("SET_USERCOMPS", response.data);
          })
          .catch((error) => {
            console.log("There was an error:", error.response);
          });
      },
  },
});
