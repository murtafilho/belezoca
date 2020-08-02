@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Data1
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($data1, ['route' => ['data1s.update', $data1->id], 'method' => 'patch']) !!}

                        @include('data1s.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection