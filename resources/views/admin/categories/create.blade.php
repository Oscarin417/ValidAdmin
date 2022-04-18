@extends('admin.app')

@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-briefcase"></i>Categorias</h1>
            <p>Gestión de categorias</p>
        </div>
        {{-- <a href="{{ route('admin.products.create') }}" class="btn btn-primary pull-right">Agregar Producto</a> --}}
    </div>
    
    <div class="row">
        <div class="col-md-12">
            <div class="title">
                <div class="title-body">
                    <div class="card padding">

                        <header>
                            <h4>Agregar categoria nueva</h4>
                        </header> 
                                                
                        <div class="card-body">
                            @include('admin.categories.form')
                        </div>
                    </div>                                                
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script type="text/javascript" src="{{ asset('backend/js/plugins/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/js/plugins/dataTables.bootstrap.min.js') }}"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>
@endpush