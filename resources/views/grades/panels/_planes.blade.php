<div class="box box-primary">

    <div class="box-header with-border">
        <h3 class="box-title">Listado de Planes</h3>
    </div>


        <table class="table table-hover table-striped">
            <thead>

            <th>Cuerpo</th>
            </thead>
            <tbody>
            @foreach($planes as $grade)
                <tr class="add-{!! $odd=!$odd !!}">
                    <td>
                        <form class="form" action="/admin/grades/update-planes" method="POST">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    {{  Form::token() }}
                                    {!! Form::hidden('id', $grade->id) !!}

                                    <label>Titulo *</label>
                                    {!! Form::text('title', isset($grade->title)? $grade->title: null, ['class' => 'lesspadding form-control text-right price']) !!}

                                </div>
                                </div>
                                <div class="form-group col-md-6">
                                    {{ Form::checkbox('show', true, $grade->show) }} Habilitar/Desabilitar
                                </div>
                            </div>


                            <div class="col-md-12">
                                <button type="submit" class="btn"> Editar</button>
                            </div>

                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

</div>
<style>
    .add-1 {
        background: rgba(60, 141, 188, 0.17) !important;
    }

    .price {
        padding: 0 36px 0 0;
    }

</style>