@extends('layouts.template')
@section('content')
    <div class="container">
        @auth()
            <a href="{{ url('post/create') }}"><button class="btn-md btn btn-primary">Nouveau article</button></a>
            <a href="{{ url('category/create') }}"><button class="btn-md btn btn-dark">Nouvelle catégorie</button></a>

            <p>Satut {{ auth()->user()->name }}</p>
        @endauth
     <div class="row">
         <div class="col-10">
             <div class="row">
                 <div class="col-lg-12 text-center">
                     <h2 class="section-heading text-uppercase">Les articles</h2>
                 </div>
             </div>

             @auth()
                <table class="table">
                 <thead class="thead-dark">
                 <tr>
                     <th scope="col">#</th>
                     <th scope="col">Nom</th>
                     <th scope="col">Slug</th>
                     <th scope="col">Actions</th>
                 </tr>
                 </thead>
                 <tbody>
                 @foreach($categories as $category)
                     <tr>
                         <th scope="row">{{ $category->id }}</th>
                         <td>{{ $category->name }}</td>
                         <td>{{ $category->slug }}</td>
                         <td>
                             <form action="{{ url("/category/$category->id/delete") }}" method="POST">
                                 {{ csrf_field() }}
                                 {{ method_field('DELETE') }}
                                 <button class="btn btn-danger">Supprimer</button>
                             </form>
                         </td>
                     </tr>
                 @endforeach
                 </tbody>
             </table>
             @endauth()

             @forelse($posts as $post)
                 <h1><a href="{{ url($post->path()) }}">{{ $post->name }}</a></h1>
                 <div class="d-flex justify-content-between">
                <span>
                    <strong><?= $post->category->name ?></strong> -
                    Publié par {{ $post->user->name }},
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

                 {!!$post->body !!}

                 @empty
                 <h3 class="text-center">Pas d'article trouvé</h3>
             @endforelse
         </div>
         <div class="col-2">
                     @forelse($categories as $category)
                         <p><a href="/post?category={{ $category->id }}">{{ $category->name }}</a></p>
                         @empty
                         PAS DE CATEGORIE
                     @endforelse
         </div>
     </div>
    </div>
@endsection