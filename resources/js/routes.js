import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

const routes = [
  { path: '/main',
  	name: 'main',
  	component: require('./components/home/home.component').default 
  },
  { path: '/home',
  	name: 'home',
  	component: require('./components/home/home.component').default
  },
  { path: '/persona',
  	name: 'persona',
  	component: require('./components/mantenimientos/persona/persona.component').default
  },

  { path: '*',
   	component: require('./components/Appcomponent').default 
   },
]


export const router = new VueRouter({
  routes,
  mode:'history'
})