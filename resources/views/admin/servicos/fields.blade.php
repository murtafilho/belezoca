<div class="col-sm-6">
    <div class="form-group col-sm-12">
        {!! Form::label('pet_id', 'Pet:') !!}
        {!! Form::select('pet_id', $pets, isset($pet_id)?$pet_id:null, ['id'=>'pet_id','class' => 'form-control','placeholder' =>
        'Selecionar...']) !!}
    </div>

    <div class="form-group col-sm-6">
        {!! Form::label('data_servico', 'Data Servico:') !!}
        <input name="data_servico" type="text" value="{{isset($servico)?date_to_input($servico->data_servico): old('data_servico') }}" class="form-control datas-br">
    </div>

    <!-- Horario Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('horario', 'Horario:') !!}
        {!! Form::text('horario', null, ['class' => 'form-control hora','autocomplete'=>'off']) !!}
    </div>

    <!-- Tipo Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('tipo', 'Tipo Servico:') !!}
        {!! Form::select('tipo',$servicos, null, ['class' => 'form-control','placeholder' => 'Selecionar...']) !!}
    </div>

    <!-- Status Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('status_id', 'Status:') !!}
        {!! Form::select('status_id',$status, null, ['class' => 'form-control','placeholder' => 'Selecionar...']) !!}
    </div>

    <!-- Preco Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('preco', 'Preco:') !!}
        {!! Form::text('preco', null, ['class' => 'form-control preco','autocomplete'=>'off'])!!}
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

<div class="col-sm-6">
    <br>
    @if(isset($pet_id))
        {{$pet_id}}
    @endif
</div>

