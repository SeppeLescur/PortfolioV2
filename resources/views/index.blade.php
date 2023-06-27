@extends('layout.layout')

@section('title')
Index
@endsection
@section('content')
    <?php include('../resources/views/slidesData/index.blade.php'); ?>
    @include('components.carousel',['slides'=>$slides])
@endsection