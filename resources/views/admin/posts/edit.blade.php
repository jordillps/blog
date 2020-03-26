@extends('admin.layout')

@push('styles')
    <!-- daterange picker -->
    <link rel="stylesheet" href="/adminLte/plugins/daterangepicker/daterangepicker.css">

    <!-- summernote -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.15/dist/summernote.min.css" rel="stylesheet">

    <!-- Select2 -->
  <link rel="stylesheet" href="/adminLte/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="/adminLte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.css">
@endpush

@section('header')
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Crear/Editar publicación</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin')}}">Dashboard</a></li>
              <li class="breadcrumb-item active">Crear publicación</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
@endsection

@section('content')

<div class="row justify-content-center">
    <!-- left column -->
    <div class="col-md-10">
        @if(session()->has('flash'))
            <div class="alert alert-success">{{session('flash')}}</div>
        @endif
      <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
            <h3 class="card-title">Crear/Editar nueva publicación</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" method="POST" action="{{route('admin.posts.update', $post)}}" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('PUT')}}

                <div class="card-body">
                    <div class="form-group" {{ $errors->has('title')? 'has error': ''}}>
                    <label for="InputTitle">Título de la publicación</label>
                    <input type="text" name="title" class="form-control" id="InputTitle" value="{{old('title', $post->title)}}" placeholder="Título">
                    {!! $errors->first('title', '<span class="help-block" style="color:red; font-weight:bold;">:message</span>')!!}
                    </div>

                    <div class="form-group" {{ $errors->has('excerpt')? 'has error': ''}}>
                        <label>Extracto</label>
                        <textarea name="excerpt" class="form-control" rows="2" placeholder="Extracto...">{{old('excerpt', $post->excerpt)}}</textarea>
                        {!! $errors->first('excerpt', '<span class="help-block" style="color:red; font-weight:bold;">:message</span>')!!}
                    </div>

                    <div class="form-group" {{ $errors->has('body')? 'has error': ''}}>
                        <label>Contenido</label>
                        <textarea name="body" class="form-control" id="editor" rows="5" placeholder="Contenido">{{old('body', $post->body)}}</textarea>
                        {!! $errors->first('body', '<span class="help-block" style="color:red; font-weight:bold;">:message</span>')!!}
                    </div>

                    <div class="form-group">
                        <label>Añadir fotografías</label>
                        <div class="dropzone">
                        </div>
                    </div>

                    <div class="form-group" {{ $errors->has('iframe')? 'has error': ''}}>
                        <label>Añadir audio o vídeo</label>
                        <textarea name="iframe" class="form-control" rows="2" placeholder="Contenido de audio o video(iframe)">{{old('iframe', $post->iframe)}}</textarea>
                        {!! $errors->first('iframe', '<span class="help-block" style="color:red; font-weight:bold;">:message</span>')!!}
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Fecha de publicación:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                        <i class="far fa-calendar-alt"></i>
                                        </span>
                                    </div>
                                    <input type="date" name="published_at" class="form-control" value="{{old('published_at', $post->published_at ? $post->published_at->format('Y-m-d') : null)}}">
                                </div>
                                <!-- /.input group -->
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group" {{ $errors->has('category_id')? 'has error': ''}}>
                                <label>Categoría (Solo una)</label>
                                    <select name="category_id" class="select-single" multiple="multiple" data-placeholder="Categoría..." style="width: 100%;">
                                        {{-- <option value="">Selecciona una categoría...</option> --}}
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}" {{old('category_id', $post->category_id) == $category->id ? 'selected' : ''}}
                                        >{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                {!! $errors->first('category_id', '<span class="help-block" style="color:red; font-weight:bold;">:message</span>')!!}
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group" {{ $errors->has('tags')? 'has error': ''}}>
                                <label>Etiquetas</label>
                                <select name="tags[]" class="select-multiple" multiple="multiple" data-placeholder="Etiquetas..." style="width: 100%;" >
                                    @foreach($tags as $tag)
                                        <option {{collect(old('tags', $post->tags->pluck('id')))->contains($tag->id) ? 'selected': ''}} value="{{$tag->id}}">{{$tag->name}}</option>
                                    @endforeach
                                </select>
                                {!! $errors->first('tags', '<span class="help-block" style="color:red; font-weight:bold;">:message</span>')!!}
                            </div>
                        </div>
                    </div>
                    @if($post->comments->count() > 0)
                        <div class="form-group">
                            <div class="form-group" {{ $errors->has('')? 'has error': ''}}>
                                <label>Comentarios</label>
                                @foreach ($post->comments as $comment)
                                    <p><span style="font-style:bold">{{$comment->author}} | {{$comment->author_email}} | {{$comment->created_at->format('d M Y')}}</span></p>
                                    <textarea name="comment" class="form-control" rows="2" disabled>{{$comment->body}}</textarea>
                                    <br>
                                    @if (auth()->user()->id === $post->user_id)
                                        <textarea name="reply" class="form-control" rows="2" placeholder="Replicar comentario">{{old('iframe')}}</textarea>
                                        {!! $errors->first('iframe', '<span class="help-block" style="color:red; font-weight:bold;">:message</span>')!!}
                                    @endif
                                    <hr>
                                @endforeach   
                            </div>
                        </div>
                    @endif 
                </div>
            <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
      <!-- /.card -->
      {{-- Borrado de fotos --}}
        @if($post->photos->count() > 0)
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Borrar fotos del post</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        @foreach ($post->photos as $photo)
                        <div class="col-md-4">
                            <form action="{{ route('admin.photos.destroy', ['photo' => $photo])}}" method="POST">
                                {{ @method_field('DELETE')}}
                                {{ csrf_field() }}
                                    <button class="btn btn-danger" style="position:absolute; "><i class="far fa-trash-alt xs"></i></button>
                                    <img src="{{ url($photo->url)}}" width="100%" height="auto" alt="">
                            </form>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif
    </div>

</div>

@endsection

@push('scripts')
<!-- date-range-picker -->
    <script src="/adminLte/plugins/daterangepicker/daterangepicker.js"></script>

    <script>
        //Date range picker
        $('#published_at').daterangepicker();
    </script>

<!-- Summernote -->
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.15/dist/summernote.min.js"></script>

<!-- Select2 -->
<script src="/adminLte/plugins/select2/js/select2.full.min.js"></script>

{{-- dropzone --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.js"></script>

    <script>
    $(function () {
        // Summernote
        $('#editor').summernote({
            height: 315
        });

        //Initialize Select2 Category
        $('.select-single').select2({
            tags:true
        });

        //Initialize Select2 Tags
        $('.select-multiple').select2({
            tags:true
        });


        if (Dropzone.instances.length > 0){
            Dropzone.instances.forEach(dz => dz.destroy());
        }

        // Disable auto discover for all elements:
        Dropzone.autoDiscover = false;

        // Dropzone class:
        var myDropzone = new Dropzone(".dropzone",{
            url: "/admin/posts/{{$post->url}}/photos",
            acceptedFiles : 'image/*',
            maxFilesize : 2,//2 Mb
            paramName : 'photo',//nom de l'arxiu després de pujar-lo
            headers : {
                'X-CSRF-TOKEN' : '{{csrf_token()}}'
            },
            dictDefaultMessage : 'Arrastrar para subir las fotografías'
        });

        myDropzone.on('error',function(file,res){
            //console.log(res.errors.photo[0]);
            var msg = res.errors.photo[0];
            $('.dz-error-messsage:last > span').text(msg);
        });

    });
    </script>;

@endpush


