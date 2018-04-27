@extends('layouts.backend-layout')
@section('pagesTitle', 'Administracion de Precios')
@section('subTitle', 'Grados')

@section('content')
    <div class="row">
        <section class="col-lg-4 connectedSortable">
            @include('grades.panels._grados')
        </section>
        <section class="col-lg-6 connectedSortable">
            @include('grades.panels._descuentos')
        </section>
        <section class="col-lg-6 connectedSortable">
            @include('grades.panels._anios')
        </section>
        <section class="col-lg-6 connectedSortable">
            @include('grades.panels._planes')
        </section>

    </div>
    <style>
        .lesspadding {
            padding: 0 2rem 0 0 !important;
            width: 60%;
        }
    </style>
@endsection
