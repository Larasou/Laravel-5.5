@extends('layouts.template')
@php $title = "Nouveau article"; @endphp
@section('content')
    <h1>{{ $title }}</h1>
   @include('posts.form_post')
@endsection