<template>
	<div>
    	<app-auth-component 

    		:nameapp = "nameapp" 
    		:auth="auth">

    	</app-auth-component>

    	<div class="container mt-3">

    		<router-view></router-view>

		</div> 

    	<app-footer-component 

    		:nameapp = "nameapp">
        
        </app-footer-component>
    </div>
    
</template>

<script>
    export default ({
    	props:['nameapp','auth'],
        mounted() {
            console.log('Component mounted.')
        }
    });
</script>
