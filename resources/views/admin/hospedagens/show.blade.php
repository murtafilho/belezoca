@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            <i class="fa fa-home" aria-hidden="true"></i> Hospedagem
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('admin.hospedagens.show_fields')
                    <a href="{{ route('admin.hospedagens.index') }}" class="btn btn-default">Voltar</a>
                </div>
            </div>
        </div>
    </div>
@endsection
