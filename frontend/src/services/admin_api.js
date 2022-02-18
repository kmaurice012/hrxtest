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
// apiClient.get("/roles-table").then((response) => {
//   sessionStorage.setItem("roles_table", JSON.stringify(response.data));
// });
// let roles_table = JSON.parse(sessionStorage.roles_table);

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
    }
 
    // userCompliances,
    // userCompliance,
    // roles_table
    // getEvent(id) {
    //   return apiClient.get('/compliances')
    // },
    // postEvent(event) {
    //   return apiClient.post('/events', event)
    // }
  }


