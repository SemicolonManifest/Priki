@extends('layout')
@section('content')
    <table class="table table-striped">
        <tr>
            <th class="w-50">Title</th><th class="w-50">URL</th>
        </tr>
        @foreach (App\Models\Reference::all() as $reference )
        <tr>
            <td>{{$reference->description}}</td><td><a href="{{$reference->url}}">{{$reference->url}}</a></td>
        </tr>
        @endforeach
    </table>
@endsection
