@extends('layouts.app')

@section('content')
 <div class="container">
     <h1>Blog</h1>

     @if ($posts->isEmpty()) {{-- questo ritorna un true o false quando non trova posts ci fa capire che effettivamente non ci sono --}}
     <p>Nessun post trovato. <a href="{{route('admin.posts.create')}}"> Crea un post ora!!</a></p>
         
     @else
         
     @endif
 </div>
@endsection