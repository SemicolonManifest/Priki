@extends('layout',['pageTitle' => $pageTitle])

@section('content')
    <h1>Home</h1>

    {{ $filterValue }}

    @foreach (\App\Models\Practice::all() as $practice)

        <p>{{$practice->description}}<br>{{$practice->domain->name}},  {{\Carbon\Carbon::parse($practice->updated_at)->isoFormat("d MMMM YYYY") }}</p>

    @endforeach


@endsection
