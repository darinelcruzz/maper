@extends('admin')

@section('main-content')

    @foreach ($types as $type)
        <data-table col="col-md-12" title="{{ ucfirst($type) }}"
            example="example{{ $loop->index + 1 }}" color="primary" collapsed button>

            <template slot="header">
                <tr>
                    @foreach ($header as $th)
                        <th>{{ $th == 'Km' && $type == 'otros' ? 'ID': $th }}</th>
                    @endforeach
                </tr>
            </template>

            <template slot="body">
                @foreach($prices as $price)
                  @if ($price->type == $type)
                      <tr>
                          @foreach ($body as $td)
                              @if ($td == 'km')
                                  <td>{{ $type == 'otros' ? $price->id: $price->km }}</td>
                              @elseif ($td == 'name')
                                  <td>
                                      {{ $price->name }}
                                      &nbsp;&nbsp;&nbsp;
                                      <a href="{{ route('price.edit', ['id' => $price->id]) }}" title="EDITAR">
                                          <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                      </a>
                                  </td>
                              @else
                                  <td>{{ '$ ' . number_format($price->$td, 2) }}</td>
                              @endif
                          @endforeach
                      </tr>
                  @endif
                @endforeach
            </template>
        </data-table>
    @endforeach

@endsection
