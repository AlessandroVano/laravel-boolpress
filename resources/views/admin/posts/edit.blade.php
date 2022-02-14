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

        <form action="{{ route('admin.posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
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

                     {{-- CATEGORIE --}}

            <div class="mb-3">
                <label for="category_id">Category</label>
                <select class="form-control" name="category_id" id="category_id">
                    <option value="">Uncategorized</option>
                    @foreach ($categories as $category )
                    <option value="{{ $category->id}}"
                     @if($category->id == old('category_id', $post->category_id)) selected @endif>
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
                            
                            <input type="checkbox" name="tags[]" id="tag{{ $loop->iteration }}" value=" {{ $tag->id }}"
                            {{-- cerco il valore id dentro l'array    con l'arrey vuoto non romperà le balle al caricamento della pagina --}}
                             @if  ($errors->any() && in_array($tag->id, old('tags')))
                               checked
                               {{-- questa linea praticamente mi va a pescare i tag dentro all'array --}}
                               {{-- tiene anche conto dei tag selezionati in precedenze e quindi in caso di errore li tiene cmq selezionati al refresh della pagina --}}
                               {{-- any() questo serve che se un burlone ci va a modifica l'id lui fa un check e controlla gli id che ci sono nel db se il numero degli id risultano corretti lui esegue altrimenti ci da errore  --}}
                               @elseif(!$errors->any() && $post->tags->contains($tag->id)) {{-- questo serebbe come un in_array ma lo fa su una collection --}}
                                 checked
                                @endif> 
 
                            <label for="tag{{ $loop->iteration }}">
                                   {{ $tag->name }}
                            </label>
                        </span>
                    @endforeach
                    @error('tags')
                    <div class="text-danger"> {{ $message }} </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label  class="form-label" for="cover">post image</label>
                    @if ($post->cover)
                        <figure class="mb-3">
                            <img width="200" src="{{asset('storage/' . $post->cover)}}" 
                             alt="{{$post->title}}">
                        </figure>
                    @endif
                    <input type="file" class="form-control-file" name="cover" id="cover">
                    @error('cover')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                </div>

            <button class="btn btn-primary" type="submit">Edit Post</button>
        </form>
    </div>
@endsection