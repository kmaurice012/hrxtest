import axios from 'axios';

class AuthApi {
    /**
     *  Login axios instance
     * @returns axios Instance
     */
    loginClient() {
        return new axios.create({
            baseURL: "http://127.0.0.1:8000",
            credentials: true,
            headers: {
                Accept: "application/json",
                "Content-Type": "application/json",
            },
        });
    }
    /**
     * 
     * @param {username, password} data 
     * @returns user data
     */
    login(data) {
        return this.loginClient.post('api/login', data)
    }
    /**
     * Logout a user
     * @returns success message
     */
    logout() {
        let data = {
            token: localStorage.getItem('auth_token')
        }
        return this.loginClient.post('api/logout', data)
    }
}

export default {
    AuthApi
}