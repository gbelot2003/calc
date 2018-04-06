<table class="table table-hover table-bordered">
    <thead>
    <th>Id</th>
    <th>Nombre Padre</th>
    <th>Apellido Padre</th>
    <th>Grado Cotizado</th>
    <th>Nombre Alumno</th>
    <th>Apellido Alumno</th>
    <th>¿Hijos en la escuela?</th>
    <th>email</th>
    <th>Teléfono</th>
    <th>Teléfono Adicional</th>
    <th>Fecha</th>
    <th>Acciónes</th>
    </thead>
    <tbody>
    @foreach($data as $reg)
        <tr>
            <td>{{ $reg->id }}</td>
            <td>{{ $reg->name }}</td>
            <td>{{ $reg->last }}</td>
            <td>{{ $reg->grade->name }}</td>
            <td>{{ $reg->parent_name }}</td>
            <td>{{ $reg->parent_last }}</td>
            <td>
                @if($reg->bros == true)
                    Sí - {{ $reg->bros }} hijos
                @else
                    No
                @endif
            </td>
            <td>{{ $reg->email }}</td>
            <td>{{ $reg->phone }}</td>
            <td>{{ $reg->phone_aditional }}</td>
            <td>{{ $reg->created_at->formatLocalized('%d %B %Y')  }}</td>
            <td><a class="btn btn-xs btn-danger" href="/admin/dashboard/delete/{{ $reg->id }}"><i
                            class="fa fa-delete"></i> Eliminar</a></td>
        </tr>
    @endforeach
    </tbody>
</table>