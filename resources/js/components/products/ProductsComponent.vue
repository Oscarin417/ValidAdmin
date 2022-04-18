<template>
  <section>
    <div class="col-xs-12 col-sm-6 col-md-4">
      <div class="card" v-for="product in products" :key="product.id">
        <div class="padding text-center bg-primary"></div>
        <header class=" padding">
            <a :href="'/productos/'+product.id"><img :src="'storage/'+product.image_url" width="200" height="180" class="mx-auto d-block"></a>
        </header>
        <div class="card-body">
            <a :href="'/productos/'+product.id"> <h2 class="card-title">{{product.title}}</h2></a>
           <h4 class="card-subtitle">{{product.humanPrice}}</h4>
           <p class="card-text">{{product.description}}</p>
        </div>
      </div>
    </div>
  </section>
</template>
<script>
import axios from 'axios';
let url = '/api/productos';
export default {
  data(){
    return{
      name: 'Producto Component',
      products: [],
      product:{
        id: null,
        title: '',
        price: '',
        description: '',
        image_url: ''
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
        this.products = response.data;
      })
    }
  }
}
</script>