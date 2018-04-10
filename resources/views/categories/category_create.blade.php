@extends('layouts.template')
@php $title = "Nouvelle categorie"; @endphp
@section('content')
    <h1>{{ $title }}</h1>
    <form method="POST" action="{{ url("category") }}">
        {{ csrf_field() }}
        <div class="form-group">
            <input type="text" name="name"
                   class="form-control {!! $errors->has('name') ? 'is-invalid' : '' !!}"
                   value="{{ old('name') }}"
                   placeholder="Nom de la categorie">
            {!! $errors->first('name', '<p class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-dark"> Envoyer</button>
        </div>
    </form>
@endsection