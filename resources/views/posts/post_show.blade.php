@extends('layouts.template')
@php $title = $post->name; @endphp
@section('css')
    <link rel="stylesheet" href="{{ secure_asset('highlight/styles/solarized-dark.css') }}">
@endsection
@section('content')
    <h1 class="text-center">{{ $post->name }}</h1>
    <div class="d-flex justify-content-between">
                <span>Publié par {{ $post->user->name }},
                    le {{ ucwords($post->created_at->formatLocalized("%a %e %b %Y")) }}
                </span>
        <span>Mise à jour {{ $post->updated_at->diffForHumans() }}</span>
    </div>

    @can('update', $post)
        <div class="d-flex justify-content-end">
            <a href="{{ url($post->path()) . '/edit'}}">
                <button class="btn btn-outline-success">Editer</button>
            </a>

            <form action="{{ url($post->path() . '/delete') }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <button type="submit" class="btn btn-outline-danger">Supprimer</button>
            </form>
        </div>
    @endcan()


   <div class="mt-3">
       {!! $post->body !!}
   </div>
    <hr>
    @auth()
      <form class="mt-5" action="{{ url("{$post->path()}/comments") }}" method="POST">
          {{ csrf_field() }}
          <div class="form-group">
              <textarea name="body" placeholder="Votre commentaire..." cols="70" rows="3">{{ old('body') }}</textarea>
          </div>
          <button class="btn btn-dark">Commenter</button>
      </form>
    @endauth

    <div class="card mt-5">
        @foreach($post->comments()->latest()->get() as $comment)
            <div class="d-flex justify-content-between">
              <div>
                  <strong>{{ $comment->user->name }}</strong> -
                  {{ $comment->created_at->diffForHumans() }}
              </div>
               @can('update', $comment)
                    <div>
                        <form method="POST" action="{{ url("{$post->path()}/{$comment->id}") }}">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button class="btn btn-danger btn-xs">Supprimer</button>
                        </form>
                    </div>
                @endcan
            </div>

            <div class="card-body">
                {{ $comment->body }}
            </div>
        @endforeach
    </div>

@endsection
@section('js')
    <script src="{{ secure_asset('highlight/highlight.pack.js') }}"></script>
    <script>hljs.initHighlightingOnLoad();</script>

@endsection