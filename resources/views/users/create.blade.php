@extends('layouts.backend-layout')
@section('pagesTitle', 'Administracion de Usarios')
@section('subTitle', 'Nuevo Usuario')

@section('content')
    <section class="col-lg-7 connectedSortable">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Creación de Usuarios</h3>
            </div>

            {!! Form::open(array('url' => array('/admin/user'), 'method' => 'POST')) !!}
            <div class="box-body">
                @include('users._form')
            </div>
            {!! Form::close() !!}
        </div>
    </section>

@stop