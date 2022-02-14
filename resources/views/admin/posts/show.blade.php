@extends('layouts.app')

@section('content')
 <div class="container">
     <h1 class="mb-5"> {{ $post->title  }} </h1>
      <h4 class="mb-5"> {{ $post->created_at->format('l d/m/Y') }}</h4>
      <h4 class="mb-5"> {{ $post->created_at->isoFormat('dddd DD/MM/YY') }}</h4>
      <h4 class="mb-5"> {{ $post->created_at->diffForHumans() }}</h4> {{-- da quando è stato creato ad oggi --}}


     <div class="mb-5">
     
     <span class="mb-3">
         <strong>Category</strong>
         
         @if ($post->category) {{ $post->category->name }} @else Uncategorized  @endif
        </span>
        
         <a class="btn btn-warning" href=" {{ route('admin.posts.edit', $post->id) }} ">Edit</a>
         <a class="btn btn-primary" href=" {{ route('admin.posts.index') }} ">Back to Blog</a>
     </div>

     <div class="row mb-5">
         <div class="{{$post->cover ? 'col-md-6' : 'col'}}"> {{-- se l'immagine è presente fai la divisione in col-md-6, altrimenti fai gestire tutto a bootstrap in base al contenuto --}}
             {!! $post->body  !!}
         </div>
         @if ($post->cover)
             
           <div class="col-md-6">
               <img class="img-fluid" 
                    src="{{asset('storage/' . $post->cover)}}" 
                    alt="{{$post->title}}">
              </div>
       @endif
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