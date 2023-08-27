@extends('layout.desgine')

@section('page-title', 'create New blog')

@section('content')
    <div class="container mt-5">
    @section('content-Title')
        Article {{ $blog->id }}
    @endsection
    <form>
        @csrf
        <div class="form-group">
            <label for="title"><strong>Article Title</strong></label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Enter article title"
                value="{{ $blog->title }}" readonly>
        </div>
        <div class="form-group">
            <label for="content"><strong>Article Content</strong></label>
            <textarea class="form-control" id="content" rows="5" placeholder="Enter article content" readonly>{{ $blog->body }}</textarea>
        </div>

        <a href="{{ route('blog.index') }}" class="btn btn-primary">Go back</a>
    </form>
</div>
@endsection
