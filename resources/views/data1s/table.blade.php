<div class="table-responsive">
    <table class="table" id="data1s-table">
        <thead>
            <tr>
                <th>Data1</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($data1s as $data1)
            <tr>
                <td>{{ $data1->data1 }}</td>
                <td>
                    {!! Form::open(['route' => ['data1s.destroy', $data1->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('data1s.show', [$data1->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('data1s.edit', [$data1->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
