<div class="col-sm-6">

    <div class="form-group col-sm-12">
        {!! Form::label('pet_id', 'Pet:') !!}
        {!! Form::select('pet_id', $pets, isset($pet_id)?$pet_id:null, ['class' => 'form-control','placeholder' =>
        'Selecionar...']) !!}
    </div>

    <div class="form-group col-sm-6">
        {!! Form::label('data_entrada', 'Data Entrada:') !!}
        <input name="data_entrada" type="text" value="{{isset($hospedagem)?date_to_input($hospedagem->data_entrada): old('data_entrada') }}" class="form-control datas-br">
    </div>

    <div class="form-group col-sm-6">
        {!! Form::label('data_saida', 'Data Saida:') !!}
        <input name="data_saida" type="text" value="{{isset($hospedagem)?date_to_input($hospedagem->data_saida): old('data_saida') }}" class="form-control datas-br">
    </div>

    <!-- Horario Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('horario', 'Horario:') !!}
        {!! Form::text('horario', null, ['class' => 'form-control hora','autocomplete'=>'off']) !!}

    </div>

    <!-- Tipo Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('status_id', 'Status:') !!}
        {!! Form::select('status_id',$status, null, ['class' => 'form-control','placeholder' => 'Selecionar...']) !!}
    </div>

    <!-- Preco Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('preco_dia', 'Valor diária:') !!}
        {!! Form::text('preco_dia', null, ['class' => 'form-control preco', 'autocomplete'=>'off'])
        !!}
    </div>
    <!-- Preco Field -->
    <div class="form-group col-sm-12">
        {!! Form::label('obs', 'Observações:') !!}
        {!! Form::text('obs', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Submit Field -->
    <div class="form-group col-sm-12">
        {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
        <a href="{{ URL::previous() }}" class="btn btn-default">Cancel</a>
    </div>
</div>