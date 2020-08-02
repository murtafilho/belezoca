<div class="table-responsive">
    <table class="table" id="clientes-table">
        <thead>
            <tr>
                <th>Nome</th>
        <th>Fone</th>
        <th>Email</th>
        <th>Obs</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($clientes as $cliente)
            <tr>
                <td><a href="{{route('admin.pets.index', ['cliente_id' => $cliente->id])}}" class="btn btn-sm btn-info">Pets</a> {{ $cliente->nome }}</td>
            <td>{{ $cliente->fone }}</td>
            <td>{{ $cliente->email }}</td>
            <td>{{ $cliente->obs }}</td>
                <td>
                    {!! Form::open(['route' => ['admin.clientes.destroy', $cliente->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('admin.clientes.show', [$cliente->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('admin.clientes.edit', [$cliente->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
