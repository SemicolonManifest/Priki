@extends('layout')
@section('content')
<form class="box" method="post" action="/references/create">
    @csrf
    <h1 class="title mb-4">{{__("references.add")}}</h1>

    <div class="field">
        <label class="label">Name</label>
        <div class="control">
          <input name="name" class="input" type="text" placeholder="Reference name" pattern=".{10,}" required title="10 characters minimum">
        </div>
    </div>

    <div class="field">
        <label class="label">link</label>
        <div class="control">
          <input name="url" class="input" type="url" placeholder="Reference link">
        </div>
    </div>


    <div class="field">
        <div class="control">
          <button class="button is-link">{{__('forms.submit')}}</button>
        </div>
    </div>
</form>





<div class="w-100 mr-4">
    <table id="referencesTable" class="table table-striped w-100" style="overflow-wrap: break-word">
        <tr>
            <th class="w-50">Title</th><th class="w-50">URL</th>
        </tr>
        @foreach (App\Models\Reference::all() as $reference )
        <tr>
            <td>{{$reference->description}}</td><td><a href="{{$reference->url}}">{{$reference->url}}</a></td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
