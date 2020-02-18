@extends('admin.layout')


@section('content')

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- /.col -->
                <div class="col-md-6">
                    <div class="card card-primary mt-3">
                        <div class="card-header">
                            {{-- <ul class="nav nav-pills">
                            <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Activity</a></li>
                            <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Timeline</a></li>
                            <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>
                            </ul> --}}
                            <h3 class="card-title">Datos personales</h3>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                           <form action="{{route('admin.users.update', $user)}}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('PUT')}}

                            <div class="form-group" {{ $errors->has('name')? 'has error': ''}}>
                                <label for="InputName">Nombre</label>
                                <input type="text" name="name" class="form-control" id="InputName" value="{{old('name', $user->name)}}">
                                {!! $errors->first('name', '<span class="help-block" style="color:red; font-weight:bold;">:message</span>')!!}
                            </div>

                            <div class="form-group" {{ $errors->has('name')? 'has error': ''}}>
                                <label for="InputEmail">Nombre</label>
                                <input type="text" name="email" class="form-control" id="InputEmail" value="{{old('email', $user->email)}}">
                                {!! $errors->first('email', '<span class="help-block" style="color:red; font-weight:bold;">:message</span>')!!}
                            </div>

                            <button type="submit" class="btn btn-block btn-primary">Actualizar perfil</button>

                            </form>
                        </div>
                    </div>
                    <!-- /.nav-tabs-custom -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->


@endsection
