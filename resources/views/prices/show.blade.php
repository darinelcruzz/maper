@extends('admin')

@section('main-content')

    <data-table col="col-md-12" title="Otros" example="example1" color="box-primary" collapsed="collapsed-box">
        <template slot="header">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Moto</th>
                <th>Coche</th>
                <th>3 Ton</th>
                <th>5 Ton</th>
                <th>10 Ton</th>
            </tr>
        </template>

        <template slot="body">
            @foreach($others as $row)
              <tr>
                  <td>{{ $row->id }}</td>
                  <td>{{ $row->name }}</td>
                  <td>{{ $row->motocycle }}</td>
                  <td>{{ $row->car }}</td>
                  <td>{{ $row->ton3 }}</td>
                  <td>{{ $row->ton5 }}</td>
                  <td>${{ $row->ton10 }}</td>
                  <td>
                      <a href="{{ route('price.edit', ['id' => $row->id]) }}"  class="btn btn-info">
                          <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                      </a>
                  </td>
              </tr>
            @endforeach
        </template>
    </data-table>

    <data-table col="col-md-12" title="Ruta 1" example="example2" color="box-primary" collapsed="collapsed-box">
        <template slot="header">
            <tr>
                <th>Km</th>
                <th>Nombre</th>
                <th>Moto</th>
                <th>Coche</th>
                <th>3 Ton</th>
                <th>5 Ton</th>
                <th>10 Ton</th>
            </tr>
        </template>

        <template slot="body">
            @foreach($others as $row)
              <tr>
                  <td>{{ $row->km }}</td>
                  <td>{{ $row->name }}</td>
                  <td>{{ $row->motocycle }}</td>
                  <td>{{ $row->car }}</td>
                  <td>{{ $row->ton3 }}</td>
                  <td>{{ $row->ton5 }}</td>
                  <td>${{ $row->ton10 }}</td>
                  <td>
                      <a href="{{ route('price.edit', ['id' => $row->id]) }}"  class="btn btn-info">
                          <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                      </a>
                  </td>
              </tr>
            @endforeach
        </template>
    </data-table>
    <data-table col="col-md-12" title="Otros" example="example1" color="box-primary" collapsed="collapsed-box">
        <template slot="header">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Moto</th>
                <th>Coche</th>
                <th>3 Ton</th>
                <th>5 Ton</th>
                <th>10 Ton</th>
            </tr>
        </template>

        <template slot="body">
            @foreach($others as $row)
              <tr>
                  <td>{{ $row->id }}</td>
                  <td>{{ $row->name }}</td>
                  <td>{{ $row->motocycle }}</td>
                  <td>{{ $row->car }}</td>
                  <td>{{ $row->ton3 }}</td>
                  <td>{{ $row->ton5 }}</td>
                  <td>${{ $row->ton10 }}</td>
                  <td>
                      <a href="{{ route('price.edit', ['id' => $row->id]) }}"  class="btn btn-info">
                          <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                      </a>
                  </td>
              </tr>
            @endforeach
        </template>
    </data-table>
@endsection
