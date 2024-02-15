@extends('layouts.admin')

@section('content')
<ul class="text-warning list-group mt-5 ml-5 ">
   @foreach ($projects as $project)
       <li class="list-group-item-dark">{{ $project->title }}</li>
       <li class="list-group-item-dark"> {{ $project->content }}</li>    
       <li class="list-group-item-dark"> {{ $project->slug }}</li>
       <li class="list-group-item-dark"> {{ $project->type->title }}</li>
       @foreach ($project->technologies as $tech)
            <li class="list-group-item-dark">{{$tech['title']}}</li>
        @endforeach
       <img src="{{asset('public\storage'. $project->post_image)}}" alt="">
       <li> <a rel="stylesheet" href="{{ route('admin.projects.edit', $project) }}" role="button"
        class="btn btn-primary btn-warning">edit</a></li>
       <li>
        <form action="{{ route('admin.projects.destroy', $project) }}" method="POST">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger btn-sm">delete</button>
        </form>
    </li>
       <hr>   
               
   @endforeach
</ul>

@endsection