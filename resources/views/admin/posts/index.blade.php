@extends('layouts.app')

@section('content')
 <div class="container">
     <h1>Blog</h1>

     @if (session('deleted'))
         <div class="alert alert-success">
             <strong> {{ session('deleted') }}  </strong>
             Permanently deleted
         </div>
     @endif

     @if ($posts->isEmpty()) {{-- questo ritorna un true o false quando non trova posts ci fa capire che effettivamente non ci sono --}}
     <p>Nessun post trovato. <a href="{{route('admin.posts.create')}}"> Crea un post ora!!</a></p>
     @else
         <table class="table">
             <thead>
                 <tr>
                     <th>ID</th>
                     <th>Title</th>
                     <th>Category</th>
                     <th colspan="3">Actions</th>
                 </tr>
             </thead>
             <tbody>
                 @foreach ($posts as $post)
                     <tr>
                         <td> {{$post->id}} </td>
                         <td> {{$post->title}} </td>
                         <td>
                            @if ($post->category) {{ $post->category->name }} @else Uncategorized  @endif
                         </td>
                         <td> 
                             <a class="btn btn-success" href="{{ route('admin.posts.show', $post->slug) }}">Show</a> 
                            </td>
                         <td>
                             <a class="btn btn-primary" href=" {{ route('admin.posts.edit', $post->id) }} ">Edit</a>
                         </td>
                         <td>
                             <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST">
                                @csrf
                                @method('DELETE')

                                <input class="btn btn-danger" type="submit" value="Delete"
                                onclick="return confirm('sicuro sicuro sicuro??')">
                            </form>
                         </td>
                     </tr>
                 @endforeach
             </tbody>
         </table>
     @endif
 </div>
@endsection