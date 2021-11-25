@extends('layout')

@section('content')
    <h1>Liste des domaines</h1>

    @foreach (App\Models\Domain::all() as $domain)
        <p>{{ $domain->name }}</p>
    @endforeach
@endsection

