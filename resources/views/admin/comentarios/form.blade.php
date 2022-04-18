{!!Form::open(['route'=>[$comentario->url(),$comentario->id],'method'=>$comentario->method(),'class'=>'app-form']) !!} 
@csrf
<div>
    {!! Form::label('nombres', 'Nombre(s)') !!}
    {!! Form::text('nombres', $comentario->nombres, ['class'=>'form-control']) !!}
</div>
<div>
    {!! Form::label('apellidos', 'Apellidos') !!}
    {!! Form::text('apellidos', $comentario->apellidos, ['class'=>'form-control']) !!}
</div>
<div>
    {!! Form::label('comentario', 'Escribe tu Comentario') !!}
    {!! Form::textarea('comentario', $comentario->comentario, ['class'=>'form-control']) !!}
</div>
<div class="">
    <input type="submit" value="Guardar" class="btn btn-primary">
</div>
{!! Form::close()!!}