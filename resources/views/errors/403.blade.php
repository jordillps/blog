@extends('admin.layout')


@section('content')

    <div style="text-align:center; padding: 200px 0;">
        
        <h1>No dispone de autorización</h1>
        <h4><span style="color:red">{{ $exception->getMessage()}}</span></h4>
    <p><a href="{{url()->previous()}}">Regresar</a></p>
    </div>

@endsection
