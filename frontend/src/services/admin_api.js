import axios from 'axios'
class AdminApi {

    /**
     *  Access Api
     * @returns apiClient
     */
    accessApi() {
        const apiClient = new axios.create({
            baseURL: "http://127.0.0.1:8000",
            credentials: true,
            headers: {
                Accept: "application/json",
                "Content-Type": "application/json",
            },
        });

        return apiClient.interceptors.request.use(
            (config) => {
                let token = localStorage.getItem("authtoken");

                if (token) {
                    config.headers["Authorization"] = `Bearer ${token}`;
                }

                return config;
            },

            (error) => {
                return Promise.reject(error);
            }
        );
    }
    //get company list
    // get company codes list
    // get company compliances
    //get compliance details
    //verify form
    //get company report for a specific code
}

export default {
    AdminApi
}