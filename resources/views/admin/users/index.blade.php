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
                        <h1 class="m-0 text-dark">Todos los Usuarios</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Todos los Usuarios</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
                @can('create', $users->first())
                    <div class="row mb-2">
                        <a href="{{route('admin.users.create')}}" class="btn btn-primary pull-right"><i class="fa fa-plus mr-1"></i>Crear Usuario</a>
                    </div>
                @endcan
                
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
@endsection

@section('content')

        @if(session()->has('flash'))
            <div class="alert alert-success">{{session('flash')}}</div>
        @endif
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Listado de Usuarios</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="users-table" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Roles</th>
                    <th>Acción</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user )
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                {{-- Arxiu Spatie\Permission\Traits\HasRoles --}}
                                <td>{{$user->getRoleNames()->implode(', ')}}</td>
                                <td>
                                @can('view', $user)
                                    <a href="{{ route('admin.users.show', $user)}}" class="btn btn-xs btn-light"><i class="fa fa-eye"></i></a>
                                @endcan
                                @can('update', Model::class)
                                    <a href="{{ route('admin.users.edit', $user)}}" class="btn btn-xs btn-info"><i class="fa fa-pencil-alt"></i></a>
                                @endcan
                                @can('delete', $user)
                                    <form action="{{ route('admin.users.destroy', $user)}}" method="POST" style="display:inline">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE')}}
                                        <button href="#" class="btn btn-xs btn-danger" onclick="return confirm('¿Estás seguro?')"
                                        ><i class="fa fa-times"></i></button>
                                    </form>
                                @endcan  
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
            $("#users-table").DataTable({
                "columns": [
                    { "width": "5%" },
                    { "width": "30%" },
                    { "width": "25%" },
                    { "width": "25%" },
                    { "width": "15%" }
                ],
                "language": {
                        "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
                    }
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
        <form role="form" method="POST" action="{{route('admin.users.store', '#create')}}">
            {{ csrf_field() }}
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agrega el nombre del nuevo usuario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group" {{ $errors->has('name')? 'has error': ''}}>
                            {{-- <label for="InputTitle">Título de la publicación</label> --}}
                          <input type="text" name="name" class="form-control" id="InputTitle" value="{{old('name')}}" placeholder="Nombre" autofocus>
                            {!! $errors->first('name', '<span class="help-block">:message</span>')!!}
                        </div>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrrar</button>
                    <button class="btn btn-primary">Crear Usuario</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endpush



