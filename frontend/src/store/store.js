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
    codes: [],
    organizations: [],
    usercomps: [],
    frequencies: [],
    roles: []
  },
  mutations: {
    SET_EVENT(state, events) {
      state.events = [...events];
    },
    SET_CODES(state, codes) {
      state.codes = [...codes];
    },
    SET_ORGANIZATIONS(state, organizations){
        state.organizations = [...organizations]
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
          commit("SET_EVENT", response.data.data);
        })
        .catch((error) => {
          console.log("There was an error:", error.response);
        });
    },
    
    fetchCodes({ commit }) {
      AdminApi.getCodes()
        .then((response) => {
          commit("SET_CODES", response.data.data);
        })
        .catch((error) => {
          console.log("There was an error:", error.response);
        });
    },
    fetchOrganizations({ commit }) {
        AdminApi.getOrganizations()
          .then((response) => {
            commit("SET_ORGANIZATIONS", response.data.data);
          })
          .catch((error) => {
            console.log("There was an error:", error.response);
          });
      },
      fetchUsercomps({ commit }) {
        AdminApi.getUsercomps()
          .then((response) => {
            commit("SET_USERCOMPS", response.data.data);
          })
          .catch((error) => {
            console.log("There was an error:", error.response);
          });
      },
      fetchFrequencies({ commit }) {
        AdminApi.getFrequencies()
          .then((response) => {
            commit("SET_FREQUENCIES", response.data.data);
          })
          .catch((error) => {
            console.log("There was an error:", error.response);
          });
      },
      deleteFrequencies({ commit }) {
        AdminApi.deleteFrequencies()
          .then((response) => {
            commit("DELETE_FREQUENCIES", response.data.data);
          })
          .catch((error) => {
            console.log("There was an error:", error.response);
          });
      },
      fetchRoles({ commit }) {
        AdminApi.getRoles()
          .then((response) => {
            commit("SET_ROLES", response.data.data);
          })
          .catch((error) => {
            console.log("There was an error:", error.response);
          });
      },
  },
});

