@extends('layouts.backend-layout')
@section('pagesTitle', 'Administracion de Usarios')
@section('breadcrumb')

@stop
@section('content')
    <section class="col-lg-10 connectedSortable">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Listado de Usuarios</h3>
            </div>
            <div class="box-footer">
                <a href="{{ route('user.create') }}" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Nuevo</a>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                        @if($user->state == 1)
                                <span class="label label-success">Activo</span>
                        @else
                                <span class="label label-danger">Inactivo</span>
                            @endif
                            </td>
                            <td><a href="/admin/user/{{ $user->id }}/edit"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar </a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
