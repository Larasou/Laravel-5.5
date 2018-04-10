@extends('layouts.template')
@php $title = "S'enregistrer"; @endphp

@section('content')
    <h1>{{ $title }}</h1>
    <form action="{{ url('register') }}" method="POST">
        {{ csrf_field() }}
        <div class="form-group col-6">
        <input type="text" name="name"
           class="form-control {!! $errors->has('name') ? 'is-invalid' : '' !!}"
           value="{{ old('name') }}"
           placeholder="Nom d'utilisateur">
        {!! $errors->first('name', '<p class="invalid-feedback">:message</p>') !!}
    </div>

        <div class="row">
        <div class="form-group col-6">
            <input type="email" name="email"
                   class="form-control {!! $errors->has('email') ? 'is-invalid' : '' !!}"
                   value="{{ old('email') }}"
                   placeholder="Votre email">
            {!! $errors->first('email', '<p class="invalid-feedback">:message</p>') !!}
        </div>

        <div class="form-group col-6">
            <input type="email" name="email_confirmation"
                   class="form-control {!! $errors->has('email') ? 'is-invalid' : '' !!}"
                   value="{{ old('email') }}"
                   placeholder="Confirmez votre email">
            {!! $errors->first('email', '<p class="invalid-feedback">:message</p>') !!}
        </div>
    </div>

        <div class="row">
        <div class="form-group col-6">
            <input type="password" name="password"
                   class="form-control {!! $errors->has('password') ? 'is-invalid' : '' !!}"
                   placeholder="Votre mot de passe">
            {!! $errors->first('password', '<p class="invalid-feedback">:message</p>') !!}
        </div>

        <div class="form-group col-6">
            <input type="password" name="password_confirmation"
                   class="form-control {!! $errors->has('password') ? 'is-invalid' : '' !!}"
                   placeholder="Confirmez votre mot de passe">
            {!! $errors->first('password', '<p class="invalid-feedback">:message</p>') !!}
        </div>
    </div>

        <div class="form-group">
        <button type="submit" class="btn btn-outline-primary"> S'enregistrer</button>
        <button type="reset" class="btn btn-outline-danger"> Reinitialiser</button>
    </div>
    </form>
@endsection
