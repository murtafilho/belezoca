<a href="{{ route('admin.servicos.index') }}"><i class="fa fa-bath" aria-hidden="true"></i><span>Servicos</span></a>

@if(Request::is('admin/servicos*'))

<form action="{{ route('admin.servicos.index') }}" method="" class="">

  <div class="form-group">
    <input type="text" name="nomepet" value="{{ request()->nomepet }}" class="form-control" placeholder="Pet..." />
  </div>

  <div class="form-group">
    <input type="text" name="nomecliente" value="{{ request()->nomecliente }}" class="form-control" placeholder="Cliente..." />
  </div>

  <div class="form-group">
    {!! Form::select('status_id', status_options(), request()->status_id, ['class' => 'form-control','placeholder' => 'Selecionar
    Status...']) !!}
  </div>

<div class="form-group">
    <label for="searchdata" class="label label-info">Data Incicial:</label>
    <input type="text" name="searchdata" class="form-control datas-br" value="{{request()->searchdata}}">
</div>

<button type="submit" class="btn btn-primary">Buscar</button>
<a href="{{route('admin.servicos.index')}}" class="btn btn-warning">Todos</a>


</form>
@endif