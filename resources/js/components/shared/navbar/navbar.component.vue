<style type="text/css" scope="">
     nav li:hover,
     nav li.router-link-active,
     nav li.router-link-exact-active {
       background-color: indianred;
       cursor: pointer;
     }
</style>

<template>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
        <div class="container">
            <router-link  class="navbar-brand" :to="{ name: 'main'}">{{ nameapp}}</router-link>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#appschool" aria-controls="appschool" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="appschool">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <router-link class="nav-link router-link-active" :to="{ name: 'home'}">User</router-link>
                    </li>
                     <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Mantenimiento
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <router-link class="dropdown-item" :to="{ name: 'persona'}">Persona</router-link>
                      <a class="dropdown-item" href="#">Another action</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                  </li>
                    
                </ul>
                <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ auth.name }} 
                                <span class="caret"></span>
                            </a>
                           <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#" @click="logout()"> Logout </a>
                            </div>
                        </li>
                </ul>
            </div>
        </div>
    </nav>
</template>

<script>
    import {mapState} from 'vuex';
    export default ({
        props:['nameapp','auth'],
        mounted() {
            console.log('Usuario autenticado '+ this.auth.name)
        },
        computed:{
           ...mapState(['BaseUrl']),
        },
        methods:{

            logout(){
                let me = this;
                if (confirm('Está seduro de cerrar sesión')) {
                    axios.post(me.BaseUrl+'/logout').then(()=>{
                        location.reload()
                    });
                }
            }
        }
    });
</script>
