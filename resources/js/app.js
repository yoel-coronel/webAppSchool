
require('./bootstrap');
window.Vue = require('vue');

//auth -menu
Vue.component(
    'app-auth-component', 
    require('./components/shared/navbar/navbar.component.vue').default);

Vue.component(
    'app-footer-component', 
    require('./components/shared/footer/footer.component.vue').default);


Vue.component('app', 
    require('./components/Appcomponent.vue').default);


import store from './store';
import {router } from './routes';
import {mapState, mapMutations} from 'vuex';


const app = new Vue({
    el: '#app',
    router,
    store,

    data:{

    },
    created(){

    	console.log("Inicio el boot JS");
    	this.$store.commit('set_url', $('#baseUrl').val());
        //this.$store.dispatch({type:'exampleAsync',url:"http://localhost"});

    },
    computed:{
       ...mapState(['BaseUrl','MENU_SELECT_ROUTER','auth']),
       ...mapMutations(['exampleAsync'])
    },
    methods:{


    },
    mounted(){

        console.log(this.auth.nombre);

        setTimeout(function() {

        },  3000);
    },
 
});
