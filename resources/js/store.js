import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex)

import { AutenticationService } from './services/auth/auth.config.services';

export default new  Vuex.Store({
  modules: {
    auth: AutenticationService,
  },
  state: {

      MENU_SELECT_ROUTER:0,
      exampleArr:[],
      BaseUrl:'',
  },
  mutations: {
    set_base_url( state, data ) {

      state.MENU_SELECT_ROUTER = data;
    },
    set_url (state , data) {
      state.BaseUrl = data;
    },
    example( state, data ) {

      state.exampleArr = data;

      console.log(state.exampleArr);

    }
 
  },
  actions:{

    async exampleAsync({commit}){

      try {
          let response = await fetch("https://restcountries.eu/rest/v2/lang/es");

          let responseJson = await response.json();

            let data =  responseJson;

            commit('example',data);

        } catch (error) {

          console.error(error);

        }
    }
  }
});
