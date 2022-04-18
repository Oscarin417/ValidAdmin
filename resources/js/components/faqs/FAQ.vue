<template>
    <div class="container">
        <h1 class="text-center">Preguntas Frequentes</h1>
        <h2 class="text-center">Estas son las preguntas que con mas frequencia realisan</h2>
        <ul class="list-group" v-for="faq in faqs" :key="faq.id">
            <li class="list-group-item">{{faq.pregunta}}</li>
        </ul>
    </div>
</template>
<script>
import axios from 'axios';
let url = "http://127.0.0.1:8000/api/faqs";
export default{
    data(){
        return{
            name: 'FAQ Component',
            faqs: [],
            faq:{
                id: null,
                pregunta: ''
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
                this.faqs = response.data;
            });
        }
    }
}
</script>