@extends('layouts.admin')

@section('content')
        <h1>Edit Comic</h1>
        @include('partials.errors')
        <form action="{{ route('admin.projects.update', $project->id) }}" method="POST" enctype="multipart/form-data">
            @csrf

            @method('PUT')
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label text-warning">Project Name</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    name="title" value="{{ $project->title }}">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label text-warning">Description</label>
                <textarea class="form-control " name="content" id="" cols="30" rows="10">{{ $project->content }}</textarea>
            </div>
            <div class="mb-3">
                <label for="type" class="form-label text-warning">Language Type</label>
                <select class="form-select" aria-label="Default select example" name="type_id">
                    <option selected>Please choose the language used:</option>
                    @foreach ($types as $type)
                        <option value="{{$type->id}}">{{$type->title}}</option>
                    @endforeach
                    {{-- <option value="Js">Js</option>
                    <option value="Css">Css</option>
                    <option value="Php">Php</option> --}}
                </select>
            </div>
            <div class="mb-3">
                <label for="technology" class="form-label text-warning">Technology</label>
                @foreach ($technologies as $tech)
                    @if ($errors->any())
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="tech-{{ $tech->id }}"
                                value="{{ $tech->id }}" name="technologies"
                                {{ $technologies->contains($tech->id) ? 'checked' : '' }}
                                >
                            <label class="form-check-label text-warning" for="tech-{{ $tech->id }}">{{ $tech->title }}</label>
                        </div>
                    @else
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="tech-{{ $tech->id }}"
                                value="{{ $tech->id }}" name="technologies"
                                {{ in_array($tech->id, old('technologies', [])) ? 'checked' : '' }}>
                            <label class="form-check-label text-warning" for="tech-{{ $tech->id }}">{{ $tech->title }}</label>
                        </div>
                    @endif
            
            @endforeach
            </div>
            <div class="mb-3">
                <label for="post_image" class="form-label text-warning">Add an Image to your Project</label>
                <input class="form-control" type="file" id="post_image" name="post_image">
            </div>
            <button type="submit" class="btn btn-warning">Submit</button>
        </form>
    @endsection
