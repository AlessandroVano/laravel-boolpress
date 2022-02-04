@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-5">Create New Post</h1>


       @if ($errors->any())
       <div class="alert alert-danger">
           <ul>
               @foreach ($errors->all() as $error )
                   <li> {{$error}} </li>
               @endforeach
           </ul>
       </div>
       @endif

        <form action="{{ route('admin.posts.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label">Title*</label>
                <input class="form-control" type="text" name="title" id="title" value="{{ old('title') }}">
                @error('title')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="body" class="form-label">Body*</label>
                <textarea class="form-control" name="body" id="body" rows="5">{{ old('body') }}</textarea>
                @error('body')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
                  
               {{-- CATEGORIE --}}
               <div class="mb-3">
                   <label for="category_id">Category</label>
                   <select class="form-control" name="category_id" id="category_id">
                       <option value="">Uncategorized</option>
                       @foreach ($categories as $category )
                       <option value="{{ $category->id}}"
                        @if($category->id == old('category_id')) selected @endif>
                        {{ $category->name }}
                    </option>      
                       @endforeach
                   </select>
                   @error('category_id')
                       <div class="text-danger"> {{ $message }} </div>
                   @enderror
               </div>

               {{-- TAGS --}}

               <div class="mb-3">
                   <h4>Tags</h4>
                   @foreach ($tags as $tag )
                       <span class="d-inline-block mr-3">
                           {{-- name='tags[] mettiamo questo almeno gli diciamo di inviare 1 o + numeri di tag definiti in precedenza' --}}
                           <input type="checkbox" name="tags[]" id="tag{{ $loop->iteration }}" value=" {{ $tag->id }}"
                           {{-- cerco il valore id dentro l'array    con l'arrey vuoto non romperà le balle al caricamento della pagina --}}
                            @if (in_array($tag->id, old('tags', [] )))  checked @endif
                           > 

                           <label for="tag{{ $loop->iteration }}">
                                  {{ $tag->name }}
                           </label>
                       </span>
                   @endforeach
                   @error('tags')
                   <div class="text-danger"> {{ $message }} </div>
                   @enderror
               </div>

            <button class="btn btn-primary" type="submit">Create Post</button>
        </form>
    </div>
@endsection