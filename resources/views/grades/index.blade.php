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
    </div>
@endsection
