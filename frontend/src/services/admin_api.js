import axios from 'axios'

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
  
  apiClient
    .get("/events")
    .then((response) => {
      sessionStorage.setItem("events", JSON.stringify(response.data));
    })
    .catch((error) => {
      console.log(error);
    });
  let Events = JSON.parse(sessionStorage.events);
  
  JSON.stringify(Events);
  
  
  export default {
    // AdminApi,
    Events,
  
  };
  