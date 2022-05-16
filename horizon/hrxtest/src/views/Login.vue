<template>
  <div>
    <div class="main">
      <div class="login">
        <div>
          <div class="container">
            <div class="logo">
              <a href="https://www.stl-horizon.com/" target="__blank"
                ><img src="../assets/images/logo.png" alt=""
              /></a>
            </div>
            <div>
              <form action="" v-on:submit="checkForm">
                <!-- <p v-if="errors.length">
    
    <ul>
      <li v-for="error in errors" v-bind:key="error" class="error">{{ error }} </li>
    </ul>
  </p> -->
                <input
                  type="text"
                  placeholder="Username"
                  name="username"
                  class="input_"
                  id="username"
                  v-model="username"
                />

                <!-- <span  class="error" v-if="errors.username !== null">{{errors.username}}</span> -->

                <input
                  type="password"
                  placeholder="Password"
                  name="password"
                  class="input_"
                  id="password"
                  v-model="password"
                />
                <!-- <span v-if="errors.password !== null" class="error">{{errors.password}}</span> -->
                <input
                  type="text"
                  placeholder="Company Code"
                  name="companycode"
                  class="input_"
                  id="companycode"
                  v-model="companycode"
                />
                <!-- <span v-if="errors.companycode !== null" class="error">{{errors.companycode}}</span> -->
                <div class="form-1">
                  <button type="submit" @click="login()" class="btn">
                    LOGIN
                  </button>
                  <div class="remember-me">
                    <input type="checkbox" name="" id="" />Remember Me
                  </div>

                  <button type="button" class="password" role="dialog">
                    Forgot Password?
                  </button>
                </div>
              </form>
              <div class="footer-1"></div>
              <div class="form-footer">
                <p>Human Resource Management V5.0.0</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="footer">
      <a href="https://www.stl-horizon.com/" target="_blank">
        <p>&copy; {{ year }} Software Technologies Ltd</p></a
      >
    </div>
    <div class="stl-logo">
      <a href="https://www.stl-horizon.com/" target="_blank"
        ><img src="../assets/images/stl-logo.png"
      /></a>
    </div>
  </div>
</template>

<script>
export default {
  name: "LoginView",
  data: () => ({
    displayModal: false,
    username: "",
    password: "",
    companycode: "",
  }),
  computed: {
    year() {
      const d = new Date();
      let year_ = d.getFullYear();
      return year_;
    },
  },
  methods: {
    openModal() {
      this.displayModal = true;
    },

    //validation
    checkForm(e) {
      e.preventDefault();

      if (this.username && this.password && this.companycode) {
        return true;
      }
      this.errors = [];

      if (!this.username) {
        this.errors.username = "Username cannot be blank.";
      }
      if (!this.password) {
        this.errors.password = "Password cannot be blank";
      }
      if (!this.companycode) {
        this.errors.companycode = "Code cannot be blank";
      }
    },
    login() {
      if (
        this.username == "dev" &&
        this.password == "dev" &&
        this.companycode == "dev"
      ) {
        this.$router.push(`/dashboard`);
        console.log("Login Sucessfull");
      } else {
        console.log("There was an Error");
      }
    },
  },
};
</script>

<style scoped>
.error {
  color: #a94442;
  padding: 0.5em 0em 0em 1em;
}
.login {
  margin: "100px";
}
.main {
  height: 70%;
  max-width: 400px;
  margin: auto !important;
  display: flex;
  flex-direction: column;
  border: 1px solid #9e9fa3;
  border-radius: 9px;
  margin-top: 40px !important;
}

.footer p {
  text-align: center;
  color: #a3a4a8;
}
.footer a {
  text-decoration: none;
}
.footer {
  margin-top: 40px;
}
.stl-logo a {
  display: flex;

  height: 100px !important;
  justify-content: center;
}

.container {
  display: block;
  align-content: center;
  padding: 0 !important;
}

.container form {
  display: flex;
  flex-direction: column;
  justify-items: center;
}

.input_ {
  width: 90%;
  height: 40px;
  margin-top: 10px;
  margin-left: auto;
  margin-right: auto;
  border-radius: 5px;
  border: 1px solid #f2f2f3 !important;
  padding-left: 10px;
  color: #9e9fa3;
}
input:focus {
  outline: none;
  border: 1px #9e9fa3;
}
::placeholder {
  color: #9e9fa3;
}
.footer-1 {
  border: 1px solid #f2f2f3;
  margin-top: 35px;
  padding: 5px;
  border-bottom: none;
  border-left: none;
  border-right: none;
}
.btn {
  margin-bottom: 0 !important;
  padding: 10px;
  border-radius: 25px;
  background: #9e9fa3 !important;
  border: none;
  color: white;
  width: 70px;
  font-size: 14px;
  outline: none !important;
  cursor: pointer;
}
.password {
  text-decoration: none;
  color: grey;
  font-size: 14px;
  font-family: inherit;
  line-height: inherit;
  border: none;
  background-color: #fff;
  cursor: pointer;
}
.form-footer {
  margin-top: 10px;
  text-align: center !important;
  font-weight: bolder;
  background-color: #9e9fa3;
  border-radius: 0 0 7px 7px;
  color: #fff;
  font-size: 14px;
}
.form-footer p {
  padding: 10px 0px;
  margin: 0px !important;
}
.remember-me {
  font-weight: bold !important;
  font-size: 13px !important;
  color: #3c763d;
}
.logo {
  display: flex;
  justify-content: center;
  border-bottom: 1px solid #f2f2f3;
  padding: 20px;
  margin-bottom: 10px;
}
.form-1 {
  display: flex;
  box-sizing: border-box;
  justify-content: space-between;
  width: 94%;
  margin: auto;
  margin-top: 20px;
  align-items: center;
}
@media only screen and (max-width: 400px) {
  .form-1 {
    display: block;
    text-align: center;
  }
  .btn {
    width: 50% !important;
    margin: 10px 0px !important;
  }
  .remember-me {
    margin: 10px 0px !important;
  }
  .password {
    margin: 10px 0px !important;
    font-size: 14px;
  }
}
</style>>
