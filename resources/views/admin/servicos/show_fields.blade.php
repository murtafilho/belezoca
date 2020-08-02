<!-- Pet Id Field -->
<div class="form-group">
    {!! Form::label('pet_id', 'Pet Id:') !!}
    <p>{{ $servico->pet_id }}</p>
</div>

<!-- Tipo Field -->
<div class="form-group">
    {!! Form::label('tipo', 'Tipo:') !!}
    <p>{{ $servico->tipo }}</p>
</div>

<!-- Obs Field -->
<div class="form-group">
    {!! Form::label('obs', 'Obs:') !!}
    <p>{{ $servico->obs }}</p>
</div>

<!-- Preco Field -->
<div class="form-group">
    {!! Form::label('preco', 'Preco:') !!}
    <p>{{ $servico->preco }}</p>
</div>

