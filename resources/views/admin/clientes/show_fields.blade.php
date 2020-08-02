<!-- Nome Field -->
<div class="form-group">
    {!! Form::label('nome', 'Nome:') !!}
    <p>{{ $cliente->nome }}</p>
</div>

<!-- Fone Field -->
<div class="form-group">
    {!! Form::label('fone', 'Fone:') !!}
    <p>{{ $cliente->fone }}</p>
</div>

<!-- Email Field -->
<div class="form-group">
    {!! Form::label('email', 'Email:') !!}
    <p>{{ $cliente->email }}</p>
</div>

<!-- Obs Field -->
<div class="form-group">
    {!! Form::label('obs', 'Obs:') !!}
    <p>{{ $cliente->obs }}</p>
</div>

