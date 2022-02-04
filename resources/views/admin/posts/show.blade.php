@extends('layouts.app')

@section('content')
 <div class="container">
     <h1 class="mb-5"> {{ $post->title  }} </h1>

     <div class="mb-5">
     
     <span class="mb-3">
         <strong>Category</strong>
         
         @if ($post->category) {{ $post->category->name }} @else Uncategorized  @endif
        </span>
        
         <a class="btn btn-warning" href=" {{ route('admin.posts.edit', $post->id) }} ">Edit</a>
         <a class="btn btn-primary" href=" {{ route('admin.posts.index') }} ">Back to Blog</a>
     </div>

     <div class="row mb-5">
         <div class="col-md-6">
             {!! $post->body  !!}
         </div>
         <div class="col-md-6">
             Image...
         </div>
     </div>

       @if(! $post->tags->isEmpty())
           <h4>Tags</h4>

           @foreach ($post->tags as $tag )
               <span class="badge badge-primary">{{ $tag->name }}</span>
           @endforeach
       @else
            <p>Non abbiamo tag per questo post.</p>
       @endif
 </div>
@endsection