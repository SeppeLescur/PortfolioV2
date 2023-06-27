@extends('layout.layout')

@section('title')
About
@endsection
@section('content')
    <?php include('../resources/views/slidesData/about.blade.php'); ?>
    @include('components.carousel',['slides' => $slides])
@endsection