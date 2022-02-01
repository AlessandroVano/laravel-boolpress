@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-5">Edit {{ $post->title }}</h1>


       @if ($errors->any())
       <div class="alert alert-danger">
           <ul>
               @foreach ($errors->all() as $error )
                   <li> {{$error}} </li>
               @endforeach
           </ul>
       </div>
       @endif

        <form action="{{ route('admin.posts.update', $post->id) }}" method="POST">
            @csrf
            @method('PATCH')

            <div class="mb-3">
                <label for="title" class="form-label">Title*</label>
                <input class="form-control" type="text" name="title" id="title" value="{{ old('title', $post->title) }}">
                @error('title')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="body" class="form-label">Body*</label>
                <textarea class="form-control" name="body" id="body" rows="5">{{ old('body', $post->body) }}</textarea>
                @error('body')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button class="btn btn-primary" type="submit">Edit Post</button>
        </form>
    </div>
@endsection