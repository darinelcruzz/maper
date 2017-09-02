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
                  <td>${{ $row->moto }}</td>
                  <td>${{ $row->car }}</td>
                  <td>${{ $row->ton3 }}</td>
                  <td>${{ $row->ton5 }}</td>
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

    <data-table col="col-md-12" title="Local" example="example2" color="box-primary" collapsed="collapsed-box">
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
            @foreach($local as $row)
              <tr>
                  <td>{{ $row->km }}</td>
                  <td>{{ $row->name }}</td>
                  <td>{{ $row->moto }}</td>
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

    <data-table col="col-md-12" title="Ruta 1" example="example3" color="box-primary" collapsed="collapsed-box">
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
            @foreach($route1 as $row)
              <tr>
                  <td>{{ $row->km }}</td>
                  <td>{{ $row->name }}</td>
                  <td>${{ $row->moto }}</td>
                  <td>${{ $row->car }}</td>
                  <td>${{ $row->ton3 }}</td>
                  <td>${{ $row->ton5 }}</td>
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
    <data-table col="col-md-12" title="Ruta 2" example="example4" color="box-primary" collapsed="collapsed-box">
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
            @foreach($route2 as $row)
              <tr>
                  <td>{{ $row->km }}</td>
                  <td>{{ $row->name }}</td>
                  <td>{{ $row->moto }}</td>
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

    <data-table col="col-md-12" title="Ruta 3" example="example5" color="box-primary" collapsed="collapsed-box">
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
            @foreach($route3 as $row)
              <tr>
                  <td>{{ $row->km }}</td>
                  <td>{{ $row->name }}</td>
                  <td>{{ $row->moto }}</td>
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

    <data-table col="col-md-12" title="Ruta 4" example="example6" color="box-primary" collapsed="collapsed-box">
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
            @foreach($route4 as $row)
              <tr>
                  <td>{{ $row->km }}</td>
                  <td>{{ $row->name }}</td>
                  <td>{{ $row->moto }}</td>
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

    <data-table col="col-md-12" title="Ruta 5" example="example7" color="box-primary" collapsed="collapsed-box">
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
            @foreach($route5 as $row)
              <tr>
                  <td>{{ $row->km }}</td>
                  <td>{{ $row->name }}</td>
                  <td>{{ $row->moto }}</td>
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
