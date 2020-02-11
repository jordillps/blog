@extends('admin.layout')

@push('styles')
    <!-- DataTables -->
  <link rel="stylesheet" href="/adminLte/plugins/datatables-bs4/css/dataTables.bootstrap4.css">

@endpush

@section('header')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Todas las publicaciones</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Todas las publicaciones</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
                <div class="row mb-2">
                    <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus mr-1"></i>Crear Publicación</button>
                </div>
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
@endsection

@section('content')

        <h1>Dashboard</h1>

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Listado de publicaciones</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="posts-table" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Extracto</th>
                    <th>Acción</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post )
                            <tr>
                                <td>{{$post->id}}</td>
                                <td>{{$post->title}}</td>
                                <td>{{$post->excerpt}}</td>
                                <td>
                                <a href="{{ route('posts.show', $post)}}" class="btn btn-xs btn-light" target="_blank"><i class="fa fa-eye"></i></a>
                                    <a href="{{ route('admin.posts.edit', $post)}}" class="btn btn-xs btn-info"><i class="fa fa-pencil-alt"></i></a>
                                <form action="{{ route('admin.posts.destroy', $post)}}" method="POST" style="display:inline">
                                       {{ csrf_field() }}
                                       {{ method_field('DELETE')}}
                                       <button href="#" class="btn btn-xs btn-danger" onclick="return confirm('¿Estás seguro?')"
                                       ><i class="fa fa-times"></i></button>

                                    </form>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>

@endsection

@push('scripts')
<!-- DataTables -->
    <script src="/adminLte/plugins/datatables/jquery.dataTables.js"></script>
    <script src="/adminLte/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
    <script>
        $(function () {
            $("#posts-table").DataTable({
                "columns": [
                    { "width": "5%" },
                    { "width": "20%" },
                    { "width": "65%" },
                    { "width": "10%" }
                ]
            });
            // $('#example2').DataTable({
            //     "paging": true,
            //     "lengthChange": false,
            //     "searching": false,
            //     "ordering": true,
            //     "info": true,
            //     "autoWidth": true,
            // });
        });
    </script>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <form role="form" method="POST" action="{{route('admin.posts.store', '#create')}}">
            {{ csrf_field() }}
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agrega el título a tu nueva publicación</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group" {{ $errors->has('title')? 'has error': ''}}>
                            {{-- <label for="InputTitle">Título de la publicación</label> --}}
                          <input type="text" name="title" class="form-control" id="InputTitle" value="{{old('title')}}" placeholder="Título" autofocus>
                            {!! $errors->first('title', '<span class="help-block">:message</span>')!!}
                        </div>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button class="btn btn-primary">Crear publicación</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endpush



