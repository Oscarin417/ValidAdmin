{!!Form::open(['route'=>[$faq->url(),$faq->id],'method'=>$faq->method(),'class'=>'app-form']) !!}
@csrf
<div>
    {!! Form::label('pregunta', 'Escribe tu Prgunta') !!}
    {!! Form::text('pregunta', $faq->pregunta, ['class'=>'form-control']) !!}
</div>
<div class="">
    <input type="submit" value="Guardar" class="btn btn-primary">
</div>
{!! Form::close()!!}