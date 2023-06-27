
@extends('layout.layout')

@section('title')
Projects
@endsection
@section('content')
    <?php include('../resources/views/slidesData/projects.blade.php'); ?>
    @include('components.carousel',['slides'=>$slides])
@endsection