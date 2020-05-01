<style type="text/css">
    .footer{
          color: white;
          position: fixed;
          bottom: 0px;
          width: 100%;
        }

</style>
<template>
    <div class="footer bg-dark text-center">
        <h4 class="title">{{anno}} &copy;Sistema de Gestión {{nameapp}}</h4>
    </div>
</template>

<script>
    export default ({
        props:['nameapp'],
        data(){
            return {
                anno: new Date().getFullYear(),
            }
        },
        mounted() {
            
            console.log('Footer iniciado')
        }
    });
</script>
