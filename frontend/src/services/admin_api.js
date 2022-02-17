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
  let Events = JSON.parse(sessionStorage.events);
  
  JSON.stringify(Events);
  
  apiClient
    .get("/compliances")
    .then((response) => {
      sessionStorage.setItem("compliance", JSON.stringify(response.data));
    })
    let Compliance = JSON.parse(sessionStorage.compliance);
    
    apiClient
    .get("/userCompliancess")
    .then((response) => {
      sessionStorage.setItem("userCompliances", JSON.stringify(response.data));
    })
    let userCompliances = JSON.parse(sessionStorage.userCompliances);
    apiClient
    .get("/userCompliances")
    .then((response) => {
      sessionStorage.setItem("userCompliance", JSON.stringify(response.data));
    })
    let userCompliance = JSON.parse(sessionStorage.userCompliance);
  export default {
    // AdminApi,
    Events,
    Compliance,
    userCompliances,
    userCompliance 
  
  };
  