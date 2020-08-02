@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            <i class="fa fa-bath" aria-hidden="true"></i> Criar/Agendar Serviço
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'admin.servicos.store']) !!}

                        @include('admin.servicos.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
