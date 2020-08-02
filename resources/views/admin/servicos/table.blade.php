<div class="table-responsive">
    <table class="table table-responsive table-bordered table-striped" id="servicos-table">
        <thead>
            <tr>
                <th>Data</th>
                <th>Pet</th>
                <th>Foto</th>
                <th>Tipo Serviço</th>
                <th>Proprietário</th>
                <th>Obs</th>
                <th>Preco</th>
                <th>Status</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($servicos as $servico)
            <tr>
                <td><i class="fa fa-calendar" aria-hidden="true"></i> 
                    {{$servico->databr}} {{$servico->hora}}</td>

                <td>{!! $servico->pet->descr !!}</td>
                <td><img src="{{asset("storage/".$servico->pet->img)}}" width="60" alt="{{$servico->pet->nome}}" class=""></td>
                <td>{{ $servico->tipo }}</td>
                <td>{{ $servico->pet->cliente->nome }} ({{ $servico->pet->cliente->fone}})</td>
                <td>{{ $servico->obs }}</td>
                <td>{{ $servico->moeda }}</td>
                <td>{{ $servico->status->status }}</td>
                <td>
                    {!! Form::open(['route' => ['admin.servicos.destroy', $servico->key1], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('admin.servicos.show', [$servico->key1]) }}" class='btn btn-default btn-xs'><i
                                class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('admin.servicos.edit', [$servico->key1]) }}" class='btn btn-default btn-xs'><i
                                class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' =>
                        'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>