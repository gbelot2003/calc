<div class="box box-warning">
    <div class="box-header with-border">
        <h3 class="box-title">Listado de Descuentos</h3>
    </div>

    <table class="table table-hover table-striped">
        <thead>
        <th>Configuración del Descuento</th>
        </thead>
        <tbody>
        @foreach($totals as $grade)
            <tr class="add-{!! $odd=!$odd !!}">
                <td>
                    <form class="form" action="/admin/grades/update-totals" method="POST">
                        <div class="row">
                            <div class="form-group col-md-6">
                                {{  Form::token() }}
                                {!! Form::hidden('id', $grade->id) !!}
                                {!! Form::text('name', isset($grade->name)? $grade->name : null, ['class' => 'form-control text-right']) !!}
                            </div>
                            <div class="form-group col-md-4">
                                {!! Form::text('subtitle', isset($grade->subtitle)? $grade->subtitle : null, ['class' => 'form-control text-right price']) !!}
                            </div>
                            <div class="form-group col-md-2">
                                {!! Form::text('porcent', isset($grade->porcent)? $grade->porcent : null, ['class' => 'form-control text-right price']) !!}
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn"> Editar</button>
                            </div>
                        </div>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
