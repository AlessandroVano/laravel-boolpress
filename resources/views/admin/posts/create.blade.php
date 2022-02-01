@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-5">Create New Post</h1>

        <form action="{{ route('admin.posts.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label">Title*</label>
                <input class="form-control" type="text" name="title" id="title">
            </div>
            <div class="mb-3">
                <label for="body" class="form-label">Body*</label>
                <textarea class="form-control" name="body" id="body" rows="5"></textarea>
            </div>

            <button class="btn btn-primary" type="submit">Create Post</button>
        </form>
    </div>
@endsection