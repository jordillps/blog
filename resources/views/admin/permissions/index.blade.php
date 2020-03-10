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
                        <h1 class="m-0 text-dark">Todos los Permisos</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Todos los Permisos</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
                
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
                <h3 class="card-title">Listado de Permisos</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="permissions-table" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                    <th>ID</th>
                    <th>Identificador</th>
                    <th>Nombre</th>
                    <th>Acción</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($permissions as $permission )
                            <tr>
                                <td>{{$permission->id}}</td>
                                <td>{{$permission->name}}</td>
                                <td>{{$permission->display_name}}</td>
                                <td>
                                    <a href="{{ route('admin.permissions.edit', $permission)}}" class="btn btn-xs btn-info"><i class="fa fa-pencil-alt"></i></a>
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
            $("#permissions-table").DataTable({
                "columns": [
                    { "width": "10%" },
                    { "width": "30%" },
                    { "width": "40%" },
                    { "width": "20%" }
                ],
                "language": {
                        "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
                    }
            });

        });
    </script>

    
@endpush



