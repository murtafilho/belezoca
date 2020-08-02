
<a href="{{ route('admin.pets.show', [$pet->id]) }}" class='btn btn-default btn-xs'>
    <img src="{{asset("storage/".$pet->img)}}" width="{{$size}}" alt="{{$pet->nome}}" class="">
</a>
