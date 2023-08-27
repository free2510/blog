@extends('layout.desgine')
@section('page-title', 'All blogs')
@section('content')
@section('content-Title', 'All blogs')
<div class="input-group my-3 mx-auto" style="max-width: 400px;">
    <input type="text" class="form-control" name="search" placeholder="Search..." aria-label="Search"
        aria-describedby="basic-addon1">
    <div class="input-group-append">
        <button class="btn btn-outline-primary" type="submit">Search</button>
    </div>
    <a href="{{ route('blog.create') }}">
        <button class="btn btn-outline-success">Create</button>
    </a>
</div>
<div class="mt-5 mx-5">
    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <table class="table table-bordered table-striped table-hover">
        <thead class="table-dark ">
            <tr>
                <th scope="col">id</th>
                <th scope="col">Title</th>
                <th scope="col">slug</th>
                <th scope="col">category id</th>
                <th scope="col">Created At</th>
                <th scope="col">Update At</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($blogs as $blog)
                <tr>
                    <th scope="row">{{$blog->id}}</th>
                    <td>{{ $blog->title }}</td>
                    <td></td>
                    <td>{{ $blog->category_id }}</td>
                    <td>{{ $blog->created_at }}</td>
                    <td>{{ $blog->updated_at }}</td>
                    <td>
                        <a href="{{ route('blog.show', $blog->id) }}"><button type="button"
                                class="btn btn-outline-warning">Show</button></a>
                        <a href="{{ route('blog.edit', $blog->id) }}"><button type="button"
                                class="btn btn-outline-info">Edit</button></a>
                        <form class="d-inline" action="{{ route('blog.destroy', $blog->id) }}" method="post">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-outline-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
</div>
@endsection
