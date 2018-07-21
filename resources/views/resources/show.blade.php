@extends('admin')

@section('main-content')

    <data-table col="col-md-12" title="Unidades" example="example1" color="default" button>
        <template slot="header">
            <tr>
                <th>Número</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Editar</th>
            </tr>
        </template>

        <template slot="body">
            @foreach($units as $row)
              <tr>
                  <td>{{ $row->number }}</td>
                  <td>{{ $row->name }}</td>
                  <td>{{ $row->description }}</td>
                  <td>
                      <a href="{{ route('resources.unit.edit', ['id' => $row->id]) }}">
                          <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                      </a>
                  </td>
              </tr>
            @endforeach
        </template>
    </data-table>

    <data-table col="col-md-12" title="Empleados" example="example2" color="default" button>
        <template slot="header">
            <tr>
                <th>Nombre</th>
                <th>Horario</th>
                <th>Salario</th>
                <th>Puesto</th>
                <th>Editar</th>
            </tr>
        </template>

        <template slot="body">
            @foreach($drivers as $row)
              <tr>
                  <td>{{ $row->name }}</td>
                  <td>{{ $row->getHour('start_hour') }} - {{ $row->getHour('end_hour') }}</td>
                  <td>{{ fnumber($row->base_salary) }}</td>
                  <td>{{ $row->type }}</td>
                  <td>
                      <a href="{{ route('resources.driver.edit', ['id' => $row->id]) }}">
                          <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                      </a>
                  </td>
              </tr>
            @endforeach
        </template>
    </data-table>

    <div class="row">
        <div class="col-md-6">
            <br><a href="{{ route('resources.unit.create')}}" class="btn btn-success btn-block">Agregar Unidad
                <i class="fa fa-cart-plus" aria-hidden="true"></i>
            </a>
        </div>
        <div class="col-md-6">
            <br><a href="{{ route('resources.driver.create')}}" class="btn btn-success btn-block">Agregar Empleado
                <i class="fa fa-user-plus" aria-hidden="true"></i>
            </a>
        </div>
    </div>

@endsection
