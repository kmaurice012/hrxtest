import Vue from 'vue';
import Vuetify from 'vuetify';
import 'vuetify/dist/vuetify.min.css';

Vue.use(Vuetify);

export default new Vuetify({
  breakpoint: {
    thresholds: {
      xs: 340,
      sm: 540,
      md: 800,
      lg: 1280,
    },
    scrollBarWidth: 24,
  },
  theme: {
      options: {
        customProperties: true,
      
      },
    themes: {
      light: {
        primary: '#FF0000',
        secondary: '#424242',
        accent: '#fff',
        error: '#FF5252',
        info: '#2196F3',
        success: '#4CAF50',
        warning: '#FFC107',
        dark: "#9E9FA3",
        text:"#000000",
        white:"#fff",
        switch:"#fff"
       
      },

      dark: {
        primary: "#010203",
        secondary: "#CCC",
        error: "#113768",
        accent: "#555555",
        dark: "#CCC",
        white: "#fff",
        text:"#000000",
        switch:"#fff"
       

    },
    },
    
  },

  
});
