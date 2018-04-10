@extends('layouts.template')
@php $title = "Se connecter"; @endphp

@section('content')
    <h1>{{ $title }}</h1>
    <form action="{{ url('login') }}" method="POST">
        {{ csrf_field() }}

        <div class="form-group col-6">
            <input type="text" name="name"
                   class="form-control {!! $errors->has('name') ? 'is-invalid' : '' !!}"
                   value="{{ old('name') }}"
                   placeholder="Nom d'utilisateur">
            {!! $errors->first('name', '<p class="invalid-feedback">:message</p>') !!}
        </div>

        <div class="form-group col-6">
            <input type="password" name="password"
                   class="form-control {!! $errors->has('password') ? 'is-invalid' : '' !!}"
                   placeholder="Votre mot de passe">
            {!! $errors->first('password', '<p class="invalid-feedback">:message</p>') !!}
        </div>

        <fib class="form-group">
            <label for="remember">Se souvenir de moi</label>
            <input type="checkbox" name="remember" id="remember">
        </fib>

        <input type="hidden" name="page"
               value="{{ isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '/' }}">

        <div class="form-group">
            <button type="submit" class="btn btn-outline-primary"> Se connecter</button>
        </div>
    </form>
@endsection

