@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            <i class="fa fa-home" aria-hidden="true"></i> Editar Hospedagem
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($hospedagem, ['route' => ['admin.hospedagens.update', $hospedagem->id], 'method' => 'patch']) !!}

                        @include('admin.hospedagens.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection