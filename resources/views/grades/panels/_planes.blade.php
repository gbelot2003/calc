<div class="box box-primary">

    <div class="box-header with-border">
        <h3 class="box-title">Listado de Planes</h3>
    </div>

    <div class="table-responsive">
        <table class="table table-hover table-striped">
            <thead>
            <th>Titulo</th>
            <th>Cuerpo</th>
            <th>Estado</th>
            </thead>
            <tbody>
            @foreach($planes as $grade)
                <tr class="add-{!! $odd=!$odd !!}">

                    <td>
                        <form class="form" action="/admin/grades/update" method="POST">
                        {{ $grade->name }}</td>
                    <td>

                        <div class="row">
                            <div class="form-group col-md-12">
                                {{  Form::token() }}
                                {!! Form::hidden('id', $grade->id) !!}
                                {!! Form::textarea('body', isset($grade->body)? $grade->body: null, ['class' => 'ckeditor form-control text-right price']) !!}
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn"> Editar</button>
                            </div>
                        </div>

                    </td>
                    <td>
                        Activado
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
<script src="https://cdn.ckeditor.com/4.9.2/standard/ckeditor.js"></script>

<style>
    .add-1 {
        background: rgba(60, 141, 188, 0.17) !important;
    }

    .price {
        padding: 0 36px 0 0;
    }

</style>