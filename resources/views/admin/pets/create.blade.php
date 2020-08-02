@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            <i class="fa fa-paw" aria-hidden="true"></i> Novo Pet
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'admin.pets.store','files' =>'true']) !!}

                        @include('admin.pets.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
