
<a href="{{ route('admin.clientes.index') }}"><i class="fa fa-address-book" aria-hidden="true"></i>Clientes</a>
@if(Request::is('admin/clientes*'))
<form action="{{ route('admin.clientes.index') }}" method="get" class="">
  <div class="form-group">
    <input type="text" name="searchcliente" class="form-control" placeholder="Buscar Cliente..." />
  </div>
  <div class="form-group">
    <button type="submit" class="btn btn-block btn-primary">Buscar</button>
  </div>
</form>
@endif