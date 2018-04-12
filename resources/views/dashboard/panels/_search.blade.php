{!! Form::open(array('id' => 'mainform', 'class' => 'form-inline','method' => 'GET')) !!}
<div class="form-group">
    <label for="buscar">Busqueda:</label>
    {{ Form::text('buscar', isset($buscar) ? $buscar : null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
    <label for="desde">Desde :</label>
    {{ Form::date('desde', isset($desde) ? $desde : null, ['class' => 'form-control']) }}
</div>
<div class="form-group">
    <label for="hasta">Hasta :</label>
    {{ Form::date('hasta', isset($hasta) ? $hasta : null, ['class' => 'form-control']) }}
</div>
<button type="submit" class="btn btn-default">Enviar</button>
@if(isset($buscar) || isset($desde) && isset($hasta))
    <a href="/admin/dashboard/export/excel{{ isset($buscar) ? '/'.$buscar : '/null' }}{{ isset($desde) ? '/'.$desde : '/null' }}{{ isset($hasta) ? '/'.$hasta : '/null' }}" class="btn btn-warning"><i class="fa fa-file-excel-o" aria-hidden="true"></i> Exportar Excel</a>
@endif
<div style="text-align: right">
    <a class="btn btn-danger" href="/admin/dashboard/deleteit/all" onclick="return confirm('Are you sure you want to search Google?')">Eliminar Todo</a>
</div>


{!! Form::close() !!}