@extends('layouts.app')

@section('content')
 <div class="container">
     <h1>Blog</h1>

     @if ($posts->isEmpty()) {{-- questo ritorna un true o false quando non trova posts ci fa capire che effettivamente non ci sono --}}
     <p>Nessun post trovato. <a href="{{route('admin.posts.create')}}"> Crea un post ora!!</a></p>
     @else
         <table class="table">
             <thead>
                 <tr>
                     <th>ID</th>
                     <th>Title</th>
                     <th colspan="3">Actions</th>
                 </tr>
             </thead>
             <tbody>
                 @foreach ($posts as $post)
                     <tr>
                         <td> {{$post->id}} </td>
                         <td> {{$post->title}} </td>
                         <td> 
                             <a class="btn btn-success" href="{{ route('admin.posts.show', $post->slug) }}">Show</a> 
                            </td>
                         <td>EDIT</td>
                         <td>DELETE</td>
                     </tr>
                 @endforeach
             </tbody>
         </table>
     @endif
 </div>
@endsection