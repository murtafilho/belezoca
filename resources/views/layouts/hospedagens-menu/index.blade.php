<a href="{{ route('admin.hospedagens.index') }}"><i class="fa fa-home"
    aria-hidden="true"></i><span>Hospedagens</span></a>
@if(Request::is('admin/hospedagens*'))
<form action="{{ route('admin.hospedagens.index') }}" method="" class="">

  <div class="form-group">
    <label for="searchdata" class="label label-info">Data Entrada:</label>
    <input type="text" name="searchentrada" class="form-control datas-br" value="{{request()->searchdata}}">
  </div>

  <div class="form-group">
    <label for="searchdata" class="label label-warning">Data Saída:</label>
    <input type="text" name="searchsaida" class="form-control datas-br" value="{{request()->searchdata}}">
  </div>

  <div class="form-group">
    <input type="text" name="nomepet" value="{{ request()->nomepet }}" class="form-control" placeholder="Pet..." />
  </div>

  <div class="form-group">
    <input type="text" name="nomecliente" value="{{ request()->nomecliente }}" class="form-control"
      placeholder="Cliente..." />
  </div>

  <div class="form-group">
    {!! Form::select('status_id', status_options(), request()->status_id, ['class' => 'form-control','placeholder' =>
    'Selecionar
    Status...']) !!}
  </div>
  <div class="form-group">
    <select class="form-control" name="atuais">
      <option value="1">Atuais</option>
      <option value="0">Todos</option>
    </select>
  </div>

  <button type="submit" class="btn btn-primary">Buscar</button>
  <a href="{{route('admin.hospedagens.index')}}" class="btn btn-warning">Todas Hospedagens</a>


</form>
@endif