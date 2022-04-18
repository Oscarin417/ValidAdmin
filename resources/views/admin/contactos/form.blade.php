{!!Form::open(['route'=>[$contacto->url(),$contacto->id],'method'=>$contacto->method(),'class'=>'app-form']) !!} 
@csrf
<div>
    {!! Form::label('nombres', 'Nombre(s)') !!}
    {!! Form::text('nombres', $contacto->nombres, ['class'=>'form-control']) !!}
</div>
<div>
    {!! Form::label('apellidos', 'Apellidos') !!}
    {!! Form::text('apellidos', $contacto->apellidos, ['class'=>'form-control']) !!}
</div>
<div>
    {!! Form::label('email', 'Correo Electronico') !!}
    {!! Form::email('email', $contacto->email, ['class'=>'form-control']) !!}
</div>
<div>
    {!! Form::label('mensaje', 'Mensaje') !!}
    {!! Form::textarea('mensaje', $contacto->mensaje, ['class'=>'form-control']) !!}
</div>
<div class="">
    <input type="submit" value="Guardar" class="btn btn-primary">
</div>
{!! Form::close()!!}