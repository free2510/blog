@extends('layout.desgine')

@section('page-title', 'create New blog')

@section('content')
    <div class="container mt-5">
    @section('content-Title')
        Edit Article {{ $blog->id }}
    @endsection
    <form action="{{ route('blog.update', $blog->id) }}" method="post">
        @csrf
        @method('put')
        <div class="form-group">
            <label for="title"><strong>Article Title</strong></label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $blog->title }}" placeholder="Enter article title"
                >
        </div>
        <div class="form-group">
            <label for="content"><strong>Article Content</strong></label>
            <textarea class="form-control" id="content" name="body" rows="5" placeholder="Enter article content">{{ $blog->body }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('blog.index') }}" class="btn btn-primary">Go back</a>
    </form>
</div>
@endsection
