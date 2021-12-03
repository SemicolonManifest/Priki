@extends('layout',['pageTitle' => $pageTitle])
@section('content')
    <livewire:show-practices :domainSlug="'all'"/>
@endsection
