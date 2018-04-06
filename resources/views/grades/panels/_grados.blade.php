<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Listado de Descuentos</h3>
    </div>

    <div class="table-responsive">
        <table class="table table-hover table-striped">
            <thead>
                <th>Nombre</th>
                <th>Precio</th>
            </thead>
            <tbody>
            @foreach($grades as $grade)
                <tr class="add-{!! $odd=!$odd !!}">
                    <td>{{ $grade->name }}</td>
                    <td>
                        <form class="form" action="/admin/grades/update" method="POST">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    {{  Form::token() }}
                                    {!! Form::hidden('id', $grade->id) !!}
                                    {!! Form::text('price', isset($grade->price)? $grade->price: null, ['class' => 'form-control text-right price']) !!}
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
</div>
<style>
    .add-1  {
        background: rgba(60, 141, 188, 0.17) !important;
    }

    .price {
        padding: 0 36px 0 0;
    }

</style>