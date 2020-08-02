@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            <i class="fa fa-bath" aria-hidden="true"></i> Editar Servico
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($servico, ['route' => ['admin.servicos.update', $servico->id], 'method' => 'patch']) !!}

                        @include('admin.servicos.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection