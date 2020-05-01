<template>
	<div>
        <div class="card">
          <div class="card-header">
            Mantenimiento de persona
          </div>
          <div class="card-body">
                <div class="form-group row">
                    <label for="data_persona" class="col-sm-2 col-form-label">Datos de Persona</label>
                    <div class="col-sm-10">
                      <div class="input-group">
                          <input type="text" class="form-control" placeholder="Nombre y Apellidos" readonly="true">
                          <div class="input-group-append">
                            <button class="btn btn-success" type="button">buscar</button>
                          </div>
                        </div>
                    </div>
                  </div>
                  <h5>Registrar Persona</h5>
                  <hr>
                  <form method="POST" @submit="registrarPersona">
                      <label>Tipo Documento</label>
                      <select v-model="tip_doc">
                          <option value="1">DNI</option>
                          <option value="2">RUC</option>
                      </select>

                      <label>Numero Documento</label>
                      <input type="text" v-model="num_docu">

                      <label>Genero</label>
                      <select v-model="genero">
                          <option value="1">M</option>
                          <option value="2">F</option>
                      </select>

                     <label>Primer Nombre</label>
                      <input type="text" v-model="primerNombre" required="true">

                      <label>Segundo Nombre</label>
                      <input type="text" v-model="segundoNombre">

                      <label>Tercer Nombre</label>
                      <input type="text" v-model="tercerNombre">

                      <label>Primer Apellido</label>
                      <input type="text" v-model="primerApellido" required="true">

                      <label>Segundo Apellido</label>
                      <input type="text" v-model="segundoApellido" required="true">
                      
                      <label>Fecha Nacimiento</label>
                      <input type="date" v-model="fecha_nac" required="true">

                      <label>Correo Electrónico</label>
                      <input type="email" v-model="email">
                      
                      <label>Ubigeo</label>
                      <input type="text" v-model="ubigeo">

                      <label for="customFileLangHTML">Imagen</label>
                      <input type="file" id="customFileLangHTML"  @change="getImage" accept="image/*">

                      <figure>
                        <img  class="img-responsive" style="width:100px; height:100px;" :src="imagenVista">
                    </figure>

                      <label>Nacionalidad</label>
                      <input type="text" v-model="nacionalidad" required="true">

                      <label>Especialidad</label>
                      <input type="text" v-model="especialidad">

                      <label>Grado Académico</label>
                      <input type="text" v-model="grado_aca">

                      <label>Codigo Matrícula</label>
                      <input type="text" v-model="code_matr">

                      <label>Codigo Matrícula</label>
                      <input type="text" v-model="code_matr">

                      <label>Codigo SIAGIE</label>
                      <input type="text" v-model="siagie">

                      <label>Estado Académico</label>
                      <input type="text" v-model="estado_aca">

                      <label>Estado Matrícula</label>
                      <input type="text" v-model="estado_matricula">

                      <button type="button" @click="registrarPersona()" class="btn btn-outline-primary">Registrar</button>
                  </form>
            </div>
        </div>
    </div>
    
</template>

<script>
    import {mapState} from 'vuex';
    export default ({
    	props:['nameapp','auth'],
        data(){
            return {
                num_docu:0,
                tip_doc:1,
                genero:1,
                primerNombre:"",
                segundoNombre:"",
                tercerNombre:"",
                primerApellido:"",
                segundoApellido:"",
                fecha_nac:new Date(),
                email:"",
                ubigeo:"",
                imagen:"",
                nacionalidad:"Peruana",
                especialidad:"",
                grado_aca:"",
                code_matr:"",
                siagie:"",
                estado_aca:"",
                estado_matricula:"",

                ImagenLogo:""
            }
        },
        computed:{
            ...mapState(['BaseUrl']),
            imagenVista(){
                return this.ImagenLogo;
            },
        },
        methods:{
            getImage(event){
                this.imagen = event.target.files[0];
                this.cargaimagen(this.imagen);
            },
            cargaimagen(file){
                let reader = new FileReader();

                reader.onload = (e) => {
                    this.ImagenLogo = e.target.result;
                }
                reader.readAsDataURL(file);
            },
            registrarPersona(){
                let formData = new  FormData();
                formData.append('numero_documento', this.num_docu);
                formData.append('tipo_documento', this.tip_doc);
                formData.append('tipo_genero',this.genero);
                formData.append('primer_nombre', this.primerNombre);
                formData.append('segundo_nombre', this.segundoNombre);
                formData.append('tercer_nombre', this.tercerNombre);
                formData.append('primer_apellido', this.primerApellido);
                formData.append('segundo_apellido', this.segundoApellido);
                formData.append('fecha_nacimiento', this.fecha_nac);
                formData.append('correo_electronico', this.email);
                formData.append('ubigeo', this.ubigeo);
                formData.append('imagen', this.imagen);
                formData.append('nacionalidad', this.nacionalidad);
                formData.append('codigo_matricula', this.code_matr);
                formData.append('codigo_siagie', this.siagie);
                formData.append('estado_academico', this.estado_aca);
                formData.append('estado_matriculado', this.estado_matricula);
                formData.append('especialidad', this.especialidad);
                formData.append('grado_academico', this.grado_aca);

                let me = this;

                axios.post(me.BaseUrl+'/personas',formData).then(function (response) {

                    console.log(response);

                }).catch(function (error) {

                    console.log(error);
                });
            }
        },
        mounted() {
            console.log('Component mounted.')
        }
    });
</script>