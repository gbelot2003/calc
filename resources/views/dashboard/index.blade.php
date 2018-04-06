@extends('layouts.backend-layout')

@section('content')
    <section class="col-lg-12">
        @include('dashboard.panels._search')
        <br />
    </section>

    <section class="col-lg-12 connectedSortable">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Listado de Consultas</h3>
            </div>
            <!-- /.box-header -->
            <div class="table-responsive">
                @include('dashboard.panels._table')
            </div>
            {{ $data->links('vendor.pagination.default') }}
        </div>
    </section>
@endsection
