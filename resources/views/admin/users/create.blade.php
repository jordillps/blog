@extends('admin.layout')


@section('content')

<!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-primary mt-3">
                        <div class="card-header">
                            <h3 class="card-title">Crear usuario</h3>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                           <form action="{{route('admin.users.store')}}" method="POST">
                                {{ csrf_field() }}

                                <div class="form-group" {{ $errors->has('name')? 'has error': ''}}>
                                    <label for="InputName">Nombre</label>
                                    <input type="text" name="name" class="form-control" id="InputName" value="{{old('name')}}">
                                    {!! $errors->first('name', '<span class="help-block" style="color:red; font-weight:bold;">:message</span>')!!}
                                </div>

                                <div class="form-group" {{ $errors->has('email')? 'has error': ''}}>
                                    <label for="InputEmail">Correo electrónico</label>
                                    <input type="text" name="email" class="form-control" id="InputEmail" value="{{old('email')}}">
                                    {!! $errors->first('email', '<span class="help-block" style="color:red; font-weight:bold;">:message</span>')!!}
                                </div>
                                <hr>
                                <label >Roles</label>

                                @include('admin.roles.checkboxes')
                                <hr>
                                <label >Permissions</label>
                                @include('admin.permissions.checkboxes',['model' => $user])
                                <hr>
                                <p><small>La contraseña se generará automáticamente y se enviará por email</small></p>
                                <button type="submit" class="btn btn-block btn-primary">Crear</button>
                            </form>
                        </div>
                    </div>
                    <!-- /.nav-tabs-custom -->

                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection
