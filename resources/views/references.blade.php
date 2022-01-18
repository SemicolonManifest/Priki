@extends('layout')
@section('content')
    <table class="table table-striped">
        <tr>
            <th class="w-50">Title</th><th class="w-50">URL</th>
        </tr>
        @foreach (App\Models\Reference::all() as $reference )
        <tr>
            <td class="w-50">{{$reference->description}}</td><td class="w-50">{{$reference->url}}</td>
        </tr>
        @endforeach


    </table>
@endsection
