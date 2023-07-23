@extends('layout.layout')

@section('title')
About
@endsection
@section('content')
    <div class="account">
        @if($auth->user())
        @endif
    </div>
@endsection