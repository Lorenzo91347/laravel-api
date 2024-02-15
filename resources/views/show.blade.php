@extends('layouts.admin')

@section('content')

<h1 class="text-warning">{{$project->title}}</h1>
<div class="text-warning">{{$project->content}}</div>
<div class="text-warning">{{$project->type->title}}</div>
@foreach ($project->technologies as $tech)
    <div class="text-warning">{{$tech['title']}}</div>
@endforeach
<img src="{{asset('storage/'. $project->post_image)}}" alt="">
<a href="{{ route('admin.projects.index') }}" role="button" class="btn btn-warning ">Back to the projects</a>
@endsection

