@extends('layouts.app')

@section('content')
 <div class="container">
    <h1 class="mb-5">  {{ $category->name }}  </h1>

    @foreach ($category->posts as $post )
        <Article>
            <h2> {{ $post->title }} </h2>
         {{--   <a class="btn btn-succes" href="{{ route('admin.posts.show', $post->slug) }}">Show</a> 
           <a class="btn btn-primary" href="{{ route('admin.posts.edit', $post->id) }}">Edit</a>  --}}
        </Article>
    @endforeach
 </div>
@endsection