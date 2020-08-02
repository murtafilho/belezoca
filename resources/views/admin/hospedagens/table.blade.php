<div class="table-responsive">
    <table class="table table-responsive table-bordered table-striped" id="hospedagens-table">
        <thead>
            <tr>
                <th>Entrada</th>
                <th>Saída</th>
                <th>Pet</th>
                <th>Foto</th>
                <th>Tipo Serviço</th>
                <th>Proprietário</th>
                <th>Obs</th>
                <th>Num Dias</th>
                <th>Preco</th>
                <th>Total</th>
                <th>Status</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($hospedagens as $hospedagem)
            <tr>
                <td><i class="fa fa-calendar" aria-hidden="true"></i>
                    {{Carbon\Carbon::parse($hospedagem->data_entrada)->format('d/m/Y')}}
                <td><i class="fa fa-calendar" aria-hidden="true"></i>
                    {{Carbon\Carbon::parse($hospedagem->data_saida)->format('d/m/Y')}}

                <td>{!! $hospedagem->pet->descr !!}</td>
                <td><img src="{{asset("storage/".$hospedagem->pet->img)}}" width="60" alt="{{$hospedagem->pet->nome}}"
                        class=""></td>
                <td>{{ $hospedagem->tipo }}</td>
                <td>{{ $hospedagem->pet->cliente->nome }} ({{ $hospedagem->pet->cliente->fone}})</td>
                <td>{{ $hospedagem->obs }}</td>
                <td>{{ $hospedagem->numdias }}</td>
                <td>R$ {{ $hospedagem->PrecoDiaria }}</td>
                <td>R$ {{ $hospedagem->total}} </td>
                <td>{{ $hospedagem->status->status }}</td>
                <td>
                    {!! Form::open(['route' => ['admin.hospedagens.destroy', $hospedagem->id], 'method' => 'delete'])
                    !!}
                    <div class='btn-group'>
                        <a href="{{ route('admin.hospedagens.show', [$hospedagem->id]) }}"
                            class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('admin.hospedagens.edit', [$hospedagem->id]) }}"
                            class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
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