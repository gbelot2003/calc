@extends('layouts.backend-layout')
@section('pagesTitle', 'Administracion de Usarios')
@section('subTitle', $user->name)


@section('content')
    <section class="col-lg-7 connectedSortable">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Edición de Usuarios</h3>
            </div>
            {!! Form::model($user, array('url' => array('/admin/user', $user->id), 'method' => 'PUT')) !!}
            <div class="box-body">
                @include('users._form')
            </div>
            {!! Form::close() !!}

        </div>
    </section>
@stop