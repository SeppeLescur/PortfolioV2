@extends('layout.layout')

@section('title')
Contact
@endsection
@section('content')
    <?php include('../resources/views/slidesData/contact.blade.php'); ?>
    @include('components.carousel',['slides'=>$slides])
@endsection