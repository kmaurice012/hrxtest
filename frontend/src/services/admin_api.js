import axios from "axios";

//get company list
// get company codes list
// get company compliances
//get compliance details
//verify form
//get company report for a specific code
//

const apiClient = axios.create({
  baseURL: `http://localhost:3000`,
  withCredentials: false, // This is the default
  headers: {
    Accept: "application/json",
    "Content-Type": "application/json",
  },
});
  export default {
    getEvents() {
      return apiClient.get('/events')
    },
    getComplinces() {
      return apiClient.get('/compliances')
    },
    getCompanies() {
      return apiClient.get('/companies')
    },
    getUsercomps() {
      return apiClient.get('/userCompliances')
    },
    getFrequencies() {
      return apiClient.get('/frequencies')
    },
    getRoles() {
      return apiClient.get('/roles')
    }

  }


