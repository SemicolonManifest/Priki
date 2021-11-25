@extends('layout')
@app

@section('content')
<h1>Liste des domaines</h1>

@foreach ($practices as $practice)
    {{$practice->user->fullname}}
    <p>{{$practice->description}}</p>
@endforeach
@endsection
