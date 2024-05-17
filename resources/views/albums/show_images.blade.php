@extends('layout.app')

@section('content')
<div class="container">
    <h1>Images in {{ $album->name }}</h1>
    <div class="row">
        @foreach ($images as $image)
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-img">
                    <img src="{{ asset('storage/' . $image->url) }}" alt="{{ $image->title }}">
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{ $image->title }}</h5>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="mt-4">
        <h2>Add Image to Album</h2>
        <form action="{{ route('pictures.store',$album) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="album_id" value="{{ $album->id }}">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" class="form-control-file" id="image" name="image" required>
            </div>
            <input type="hidden" name="album_id" value="{{ $album->id }}">

            <button type="submit" class="btn btn-primary">Upload Image</button>
        </form>
    </div>
</div>
@endsection
