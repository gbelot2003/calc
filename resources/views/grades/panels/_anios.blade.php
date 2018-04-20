<div class="box box-information">
    <div class="box-header with-border">
        <h3 class="box-title">Configuraciones</h3>
    </div>

    <div class="table-responsive">
        <table class="table table-hover table-striped">
            <thead>
            <th>Etiquetas</th>
            </thead>
            <tbody>
            <tr>
                <td>Configuración de fecha en curso</td>
                <td>
                    <form cass="form" action="/admin/grades/update-config" method="POST">
                        <div class="row">
                            <div class="form-group col-md-6">
                                {{  Form::token() }}
                                {!! Form::hidden('id', 1) !!}
                            </div>
                            <div class="form-group col-md-4">

                                {!! Form::text('name', isset($config->name)? $config->name : null, ['class' => 'form-control text-right']) !!}
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn"> Editar</button>
                            </div>
                        </div>
                    </form>
                </td>
            </tr>

            </tbody>
        </table>
    </div>
</div>