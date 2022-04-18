<template>
    <div class="container">
        <div class="border boder-dark">
            <h1 class="text-center">Contacto</h1>
        </div>
        <div class="input-group mb-3" v-for="contacto in contactos" :key="contacto.id">
            <input class="form-control" v-model="contacto.nombres">
            <input type="text" class="form-control" v-model="contacto.apellidos">
        </div>
        <div class="input-group" v-for="contacto in contactos" :key="contacto.id">
            <input type="email" class="form-control" v-model="contacto.email">
            <input type="text" class="form-control" v-model="contacto.mensaje">
        </div>
    </div>
</template>
<script>
import axios from 'axios';
let url = "http://127.0.0.1:8000/api/contactos";
export default {
    data(){
        return{
            name: 'Contacto Component',
            contactos: [],
            contacto:{
                id: null,
                nombres: '',
                apellidos: '',
                email: '',
                mensaje: ''
            }
        }
    },
    created(){
        this.mostrar()
    },
    methods:{
        mostrar(){
            axios.get(url).then(response => {
                console.log(response);
                this.contactos = response.data;
            })
        }
    }
}
</script>