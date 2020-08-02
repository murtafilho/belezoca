@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            <i class="fa fa-home" aria-hidden="true"></i> Criar Hospedagem
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'admin.hospedagens.store']) !!}

                        @include('admin.hospedagens.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
