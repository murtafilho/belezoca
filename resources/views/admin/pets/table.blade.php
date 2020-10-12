<form action="{{route('admin.banho_tosa.index')}}" method="GET">
    <div class="">
        <table class="table table-responsive table-bordered table-striped" id="pets-table">
            <thead>
                <tr>
                    
                    <th>Serviços</th>
                    <th>Nome</th>
                    <th>Proprietário</th>
                    <th>Foto</th>
                    <th>Raca</th>
                    <th>Sexo</th>
                    <th>Castrado</th>
                    <th>Porte</th>
                    <th>Observações</th>

                    <th colspan="3">Admin</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pets as $pet)
                <tr>
                    
                    <td>
                        <a href="{{route('admin.servicos.create.id',$pet->id)}}" class="btn btn-default btn-xs btn-block">Banho/Tosa</a>
                        <a href="{{route('admin.hospedagens.create.id',$pet->id)}}" class="btn btn-success btn-xs btn-block">Hospedagem</a>
                    </td>
                    <td>{{ $pet->nome }}</td>
                    <td>{{ $pet->cliente->nome }}</td>

                    <td>

                        @if($pet->img)
                    
                        <a href="{{ route('admin.pets.show', [$pet->id]) }}">
                            <img src="{{asset($pet->img)}}" width="80px" alt="">
                        </a>
                        @endif
                    <td>{{ $pet->raca }}</td>
                    <td>{{ $pet->sexo }}</td>
                    <td>{{ $pet->castrado }}</td>
                    <td>{{ $pet->porte }}</td>
                    <td>{{ $pet->obs }}</td>

                    <td>
                        {!! Form::open(['route' => ['admin.pets.destroy', $pet->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('admin.pets.show', [$pet->id]) }}" class='btn btn-default btn-xs'><i
                                    class="glyphicon glyphicon-eye-open"></i></a>
                            <a href="{{ route('admin.pets.edit', [$pet->id]) }}" class='btn btn-default btn-xs'><i
                                    class="glyphicon glyphicon-edit"></i></a>
                            {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class'
                            => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                        </div>
                        {!! Form::close() !!}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</form>
@push('scripts')
<script>
    $(function(){
            $("#todos").change(function(){
                $('input:checkbox').not(this).prop('checked', this.checked);
            })
        })
</script>
@endpush