<?php
if ($post->id)
    $uri = ['url' => url("{$post->path()}/update"), 'method' > 'PUT'];
$uri = ['url' => url('post'), 'method' => 'POST'];
?>

{!! Form::model($post, $uri) !!}
{{ csrf_field() }}
   <div class="row">
       <div class="col-6">
           <div class="form-group">
               {!! Form::text('name', null, [
               'class' => $errors->has('name') ? 'form-control is-invalid' : 'form-control',
               'placeholder' => "Nom de l'article"
               ]) !!}

               {!! $errors->first('name', '<p class="invalid-feedback">:message</p>') !!}
           </div>
       </div>

       <div class="col-6">
           <div class="form-group">
               {!! Form::select('category_id', $categories, null, [
               'class' => $errors->has('category_id') ? 'form-control is-invalid' : 'form-control',
               ]) !!}

               {!! $errors->first('category_id', '<p class="invalid-feedback">:message</p>') !!}
           </div>
       </div>
   </div>

    <div class="form-group">
        {!! Form::textarea('body', null, [
       'class' => $errors->has('body') ? 'form-control is-invalid' : 'form-control',
       'placeholder' => "Votre message...",
       'cols' => 30, 'rows' => 10
       ]) !!}
        {!! $errors->first('body', '<p class="invalid-feedback">:message</p>') !!}
    </div>
<div class="form-group">
    <button type="submit" class="btn btn-info"> Envoyer</button>
    <button type="reset" class="btn btn-danger"> Actualiser</button>
</div>
{!! Form::close() !!}
