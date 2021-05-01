@extends('admin')

@section('main-content')

    <div class="row">
        <div class="col-md-8">
            <solid-box title="{{ 'Id ' . $service->id . ' - ' . $service->service }}" color="default">
                @include('templates.headTable')
                        <tr>
                            <td>
                                <B>Servicio:</B>
                                <dd>{{ $service->service }}</dd>
                            </td>
                            <td>
                                <B>Descripción:</B>
                                <dd>{{ $service->description }}</dd>
                            </td>
                            <td>
                                <B>Fecha y hora:</B>
                                <dd>{{ fdate($service->date_service, 'l, j F Y h:i a') }}</dd>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <B>Inventario:</B>
                                <dd>{{ $service->inventory }}</dd>
                            </td>
                        </tr>
                    </tbody>
                </table>
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
                                <B>Categoría:</B><dd>{{ $service->category }}</dd>
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
                            <td>
                                <B>Modelo:</B><dd>{{ $service->model }}</dd>
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
                                <B>Origen:</B><dd>{{ $service->origin }}</dd>
                            </td>
                            <td>
                                <B>Destino:</B><dd>{{ $service->destination }}</dd>
                            </td>
                            <td>
                                <B>Km:</B><dd>{{ $service->km }}</dd>
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
                                <B>Operador:</B><dd>{{ $service->driver->name }}</dd>
                            </td>
                            <td>
                                <B>Unidad:</B><dd>{{ $service->unit->description }}</dd>
                            </td>
                            <td>
                                <B>Regreso:</B>
                                <dd>{{ fdate($service->date_return, 'l, j F Y h:i a') }}</dd>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <B>Apoyo:</B><dd>{{ $service->helperr->name or 'N/A' }}</dd>
                            </td>
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
                                <B>Fecha de liberación:</B>
                                <dd>{{fdate($service->date_out, 'l, j F Y h:i a') }}</dd>
                            </td>
                            <td>
                                <B>Importe:</B>
                                <dd>${{ $service->amount + $service->maneuver + $service->pension - $service->discount }}</dd>
                            </td>
                        </tr>
                    </tbody>
                </table>

                @endif

            </solid-box>
        </div>
    </div>
@endsection
