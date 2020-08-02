<a href="{{ route('admin.pets.index') }}"><i class="fa fa-paw" aria-hidden="true"></i>Pets</a>
@if(Request::is('admin/pets*'))
<form action="{{route('admin.pets.index')}}" method="get" class="">
  <div class="form-group">
    <input type="text" name="searchpets" class="form-control" placeholder="Buscar Pet ou Cliente..." />
  </div>
  <div class="form-group">
    <button type="submit" class="btn btn-block btn-primary">Buscar</button>
  </div>
</form>
@endif