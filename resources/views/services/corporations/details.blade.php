@extends('admin')

@section('main-content')

    <div class="row">
        <div class="col-md-8">
            <solid-box title="Inventario {{ $service->inventory }}" color="box-default" collapsed=''>
                @include('templates.headTable')
                        <tr>
                            <td>
                                <B>Servicio:</B><dd>{{ $service->service }}</dd>
                            </td>
                            <td>
                                <B>Descripción:</B><dd>{{ $service->description }}</dd>
                            </td>
                            <td>
                                <B>Fecha y hora:</B><dd>{{ $service->formatted_date }}</dd>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <br>
                <h3 class="box-title">Vehículo
                    <i class="fa fa-car" aria-hidden="true"></i>
                </h3>
                @include('templates.headTable')
                        <tr>
                            <td>
                                <B>Marca:</B><dd>{{ $service->brand }}</dd>
                            </td>
                            <td>
                                <B>Tipo:</B><dd>{{ $service->type }}</dd>
                            </td>
                            <td>
                                <B>Categoría:</B><dd>{{ $service->pricer->name }}</dd>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <B>Carga:</B><dd>{{ $service->load }}</dd>
                            </td>
                            <td>
                                <B>Placas:</B><dd>{{ $service->plate }}</dd>
                            </td>
                            <td>
                                <B>Color:</B><dd>{{ $service->color }}</dd>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <B>Llave:</B><dd>{{ $service->key }}</dd>
                            </td>

                        </tr>
                    </tbody>
                </table>
                <br>
                <div class="box-header with-border">
                    <h3 class="box-title">Ubicación
                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                    </h3>
                </div>
                @include('templates.headTable')
                        <tr>
                            <td>
                                <B>Usuario:</B><dd>{{ $service->username }}</dd>
                            </td>
                            <td>
                                <B>Origen:</B><dd>{{ $service->origin }}</dd>
                            </td>
                            <td>
                                <B>Destino:</B><dd>{{ $service->destination }}</dd>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <br>
                <div class="box-header with-border">
                    <h3 class="box-title">Unidad
                        <i class="fa fa-truck" aria-hidden="true"></i>
                    </h3>
                </div>
                @include('templates.headTable')
                        <tr>
                            <td>
                                <B>Operador:</B><dd>{{ $service->driver }}</dd>
                            </td>
                            <td>
                                <B>Unidad:</B><dd>{{ $service->unitr->description or '' }}</dd>
                            </td>
                            <td>
                                <B>Regreso:</B><dd>{{ $service->formatted_date_return }}</dd>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <B>Corralón:</B><dd>{{ $service->lot }}</dd>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <br>
                @if ($service->status == 'liberado')

                <div class="box-header with-border">
                    <h3 class="box-title">Liberación
                        <i class="fa fa-unlock" aria-hidden="true"></i>
                    </h3>
                </div>
                @include('templates.headTable')
                        <tr>
                            <td>
                                <B>Liberador:</B><dd>{{ $service->releaser }}</dd>
                            </td>
                            <td>
                                <B>Fecha:</B><dd>{{ $service->formatted_date_out }}</dd>
                            </td>
                            <td>
                                <B>Importe:</B><dd>${{ $service->amount + $service->maneuver + $service->pension - $service->discount }}</dd>
                            </td>
                        </tr>
                    </tbody>
                </table>

                @endif

            </solid-box>
        </div>
    </div>
@endsection
