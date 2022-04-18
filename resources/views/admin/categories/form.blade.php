{!!Form::open(['route'=>[$category->url(),$category->id],'method'=>$category->method(),'class'=>'app-form']) !!} 
@csrf
<div>
    {!! Form::label('name', 'Nombre de la categoria') !!}
    {!! Form::text('name', $category->name, ['class'=>'form-control']) !!}
</div>
<div>
    {!! Form::label('description', 'Descripción del producto') !!}
    {!! Form::textarea('description', $category->description, ['class'=>'form-control']) !!}
</div>

<div class="">
    <input type="submit" value="Guardar" class="btn btn-primary">
</div>
{!! Form::close()!!}