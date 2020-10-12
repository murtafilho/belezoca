<div class="col-md-6">
    <div class="form-group">
        {!! Form::label('cliente_id', 'Cliente:') !!}
        <p>{{ $pet->cliente->nome }}</p>
    </div>
    
    <!-- Nome Field -->
    <div class="form-group">
        {!! Form::label('nome', 'Dados:') !!}
        <p><b>{{ $pet->nome }}</b> - {{ $pet->raca }} - {{ $pet->sexo }}</p>
        <div class="form-group">
            {!! Form::label('castrado', 'Castrado:') !!}
            <p>{{ $pet->castrado }}</p>
        </div>
    </div>
    
    <!-- Porte Field -->
    <div class="form-group">
        {!! Form::label('porte', 'Porte:') !!}
        <p>{{ $pet->porte }}</p>
    </div>
    
    <!-- Obs Field -->
    <div class="form-group">
        {!! Form::label('obs', 'Obs:') !!}
        <p>{{ $pet->obs }}</p>
    </div>
</div>

<div class="col-md-6">
<!-- Img Field -->
<div class="form-group">
    {!! Form::label('img', 'Img:') !!}
    <p><img src="{{asset($pet->img)}}" width="" alt="{{$pet->nome}}"></p>
</div>
</div>



