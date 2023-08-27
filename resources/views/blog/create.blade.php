@extends('layout.desgine')

@section('page-title', 'create New blog')

@section('content')
    <div class="container mt-5">
    @section('content-Title', 'Create New Article')
    <form action="{{route('blog.store')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="title"><strong>Article Title</strong></label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Enter article title" required>
        </div>
        <div class="form-group">
            <label for="content"><strong>Article Content</strong></label>
            <textarea class="form-control" id="content" name="body" rows="5" placeholder="Enter article content" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Create Article</button>
        <a href="{{ route('blog.index') }}" class="btn btn-primary">Go back</a>
    </form>
</div>
@endsection
