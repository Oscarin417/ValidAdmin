@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card padding">
            <header class="title-shopping-car">
                <h2>Mi carrito de compras</h2>
            </header>
            <div class="card-body">
                <div class="row">
                    <div class="col-xs-12 col-md-6">
	                    {{--En está sección se implentará un componente para mostrar los productos --}}
                         <product-shopping-component></product-shopping-component>
                     <a href="/productos" class="btn btn-success">Seguir comprando</a>
                    </div>

                    <div class="col-xs-12 col-md-6">
                        <p>Paga facilmente con cualquiera de estos métodos a traves de Paypal.</p>
                        <div>
                           <img src="" class="mx-auto d-block">          

                            <img src="" class="mx-auto d-block"> 
                                     
                        <div class="btn-payment">
                          <a href="#" class="btn btn-primary mx-auto d-block" >Proceder al pago</a>
                        </div>    
                    </div>
                </div> 
            </div>
        </div>
    </div>
    
@endsection