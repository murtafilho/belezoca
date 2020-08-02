<!-- Cliente Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cliente_id', 'Nome Proprietário:') !!}
    {!! Form::select('cliente_id', $clientes, null, ['class' => 'form-control','placeholder'=>'Selecionar...']) !!}
</div>

<!-- Nome Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nome', 'Nome Pet:') !!}
    {!! Form::text('nome', null, ['class' => 'form-control']) !!}
</div>

<!-- Raca Field -->
<div class="form-group col-sm-6">
    {!! Form::label('raca', 'Raca:') !!}
    {!! Form::text('raca', null, ['class' => 'form-control']) !!}
</div>

<!-- Sexo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sexo', 'Sexo:') !!}
    {!! Form::select('sexo', ['MACHO'=>'MACHO','FÊMEA'=>'FÊMEA'] ,null, ['class' => 'form-control','placeholder'=>'Selecionar...']) !!}
</div>

<!-- Castrado Field -->
<div class="form-group col-sm-6">
    {!! Form::label('castrado', 'Castrado:') !!}
    {!! Form::select('castrado',['SIM'=>'SIM','NÃO'=>'NÃO'], null, ['class' => 'form-control','placeholder'=>'Selecionar...']) !!}
</div>

<!-- Porte Field -->
<div class="form-group col-sm-6">
    {!! Form::label('porte', 'Porte:') !!}
    {!! Form::select('porte', ['PEQUENO'=>'PEQUENO','MÉDIO'=>'MÉDIO','GRANDE' => 'GRANDE'],null, ['class' => 'form-control','placeholder'=>'Selecionar...']) !!}
</div>

<!-- Obs Field -->
<div class="form-group col-sm-6">
    {!! Form::label('obs', 'Obs:') !!}
    {!! Form::textarea('obs', null, ['class' => 'form-control']) !!}
</div>

<!-- Img Field -->
<div class="form-group col-sm-6">
    {!! Form::label('img', 'Photo:') !!}
    {!! Form::file('img',  null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Enviar', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('admin.pets.index') }}" class="btn btn-default">Cancelar</a>
</div>
