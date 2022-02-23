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
    usercomps: [],
    frequencies: [],
    roles: []
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
      SET_FREQUENCIES(state, frequencies) {
        state.frequencies = [...frequencies];
      },
      SET_ROLES(state, roles) {
        state.roles = [...roles];
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
      fetchFrequencies({ commit }) {
        AdminApi.getFrequencies()
          .then((response) => {
            commit("SET_FREQUENCIES", response.data);
          })
          .catch((error) => {
            console.log("There was an error:", error.response);
          });
      },
      deleteFrequencies({ commit }) {
        AdminApi.deleteFrequencies()
          .then((response) => {
            commit("DELETE_FREQUENCIES", response.data);
          })
          .catch((error) => {
            console.log("There was an error:", error.response);
          });
      },
      fetchRoles({ commit }) {
        AdminApi.getRoles()
          .then((response) => {
            commit("SET_ROLES", response.data);
          })
          .catch((error) => {
            console.log("There was an error:", error.response);
          });
      },
  },
});
