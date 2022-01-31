import Vue from 'vue'
import App from './App.vue'
import vuetify from './plugins/vuetify'
import router from './router'
import Vuelidate from 'vuelidate'
Vue.use(Vuelidate);
Vue.config.productionTip = false
import { validationMixin } from "vuelidate";
new Vue({
  vuetify,
  router,
  validationMixin,
  render: h => h(App)
}).$mount('#app')
