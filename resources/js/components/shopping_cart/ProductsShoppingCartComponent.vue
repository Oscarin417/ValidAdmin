<template>
    <section>
   
   <material-transition-group tag="div">  
        <article  class="card-product" :key="product.id" :data-index="index" v-bind:product="product"  v-for="(product, index) in products" >
            <div class="row">
                <div class="col-9">
                    <strong>{{product.title}}</strong>
                </div>
                <div class="col-3">
                    <strong>{{product.humanPrice}}</strong>
                </div>
            </div>
        </article>  
   </material-transition-group>
      <article class="total card-product">
          <div class="row alert alert-primary">
                    <div class="col-9">
                    <strong>Total</strong>
                </div>
                <div class="col-3">
                    <strong>{{total}}</strong>
                </div>
          </div>
         </article>
</section>
</template>
<script>
export default {
   data(){
       return{

           endpoint: '/carrito/productos',
            products: []
    }
   },
    created(){
        this.fetchProducts();
    },
    computed:{
        total(){
            let cents = this.products.reduce((acumulator,currentObj)=>{
                return acumulator + currentObj.numberPrice
            },0)
            return `$${cents/100}`
        }
    },
   methods:{
       fetchProducts(){
           axios.get(this.endpoint).then(response=>{
               console.log(response);
               return this.products = response.data.data;
           })
       }
   }
   
}
</script>