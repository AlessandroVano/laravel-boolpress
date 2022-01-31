@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    {{-- Auth::user (ISTANZA)  ->NOME DELLA COLONNA CHE VOGLIAMO STAMPARE --}}
                    <h1>Benvenuto {{ Auth::user()->name }} alla Dashboard Admin</h1>
                    <h4>Il tuo User ID è: {{ Auth::id() }}</h4>
                </div>

                <div class="card-body">
                   <h2>Completa il tuo profilo qui sotto</h2>

                   <ul>
                       <li>
                           <a href="">Lorem ipsum dolor</a>
                       </li>
                       <li>
                        <a href="">Lorem ipsum dolor</a>
                    </li>
                    <li>
                        <a href="">Lorem ipsum dolor</a>
                    </li>
                   </ul>

            
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
