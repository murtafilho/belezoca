<hr>
<li class="{{ Request::is('admin/servicos*') ? 'active' : '' }}">
  @include('layouts.servicos-menu.index')
</li>

<hr>

<li class="{{ Request::is('admin/hospedagens*') ? 'active' : '' }}">
  @include('layouts.hospedagens-menu.index')
</li>

<hr>

<li class="{{ Request::is('admin/pets*') ? 'active' : '' }}">
  @include('layouts.pets-menu.index')
</li>

<hr>

<li class="{{ Request::is('admin/clientes*') ? 'active' : '' }}">
  @include('layouts.clientes-menu.index')
</li>