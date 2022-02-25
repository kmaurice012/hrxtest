import axios from "axios";

//get company list
// get company codes list
// get company compliances
//get compliance details
//verify form
//get company report for a specific code
//

const apiClient = axios.create({
  baseURL: `http://127.0.0.1:8000/api`,
  credentials: true,
  headers: {
    Accept: "application/json",
    "Content-Type": "application/json",
    'Authorization': 'Bearer 1|wzCYsfpPzRQNk70dNxWgWhL904T4AF34NKKxDife'
  },
});
  export default {
    getEvents() {
      return apiClient.get('/events')
    },
    getCodes() {
      return apiClient.get('/codes')
    },
    getOrganizations() {
      return apiClient.get('/organizations')
    },
    getUsercomps() {
      return apiClient.get('/userCompliances')
    },
    getFrequencies() {
      return apiClient.get('/frequencies')
    },
    getRoles() {
      return apiClient.get('/roles')
    },
  }


