<template>
    <div class="container">
        <div class="border border-dark">
            <h1 class="text-center">Comentarios</h1>
        </div>
        <div class="input-group mb-3" v-for="comentario in comentarios" :key="comentario.id">
            <input class="form-control" v-model="comentario.nombres">
            <input type="text" class="form-control" v-model="comentario.apellidos">
        </div>
        <div class="input-group" v-for="comentario in comentarios" :key="comentario.id">
            <input class="form-control" v-model="comentario.comentario">
        </div>
    </div>
</template>
<script>
import axios from 'axios';
let url = "http://127.0.0.1:8000/api/comentarios";
export default {
    data(){
        return{
            name: 'Comentario Component',
            comentarios: [],
            comentario: {
                id: null,
                nombres: '',
                apellidos: '',
                comentario: ''
            }
        }
    },
    created(){
        this.mostrar()
    },
    methods:{
        mostrar(){
            axios.get(url).then(response => {
                console.log(response.data);
                this.comentarios = response.data;
            });
        }
    }
}
</script>