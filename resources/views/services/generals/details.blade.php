@extends('admin')

@section('main-content')

    <div class="row">
        <div class="col-md-8">
            <solid-box title="{{ $service->clientr->name }}" color="box-default" collapsed=''>
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
                                <dd>{{ $service->formatted_date }}</dd>
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
                                <B>Marca:</B> <dd>{{ $service->brand }}</dd>
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

                        </tr>
                    </tbody>
                </table>

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

                <div class="box-header with-border">
                    <h3 class="box-title">Unidad
                        <i class="fa fa-truck" aria-hidden="true"></i>
                    </h3>
                </div>
                @include('templates.headTable')
                        <tr>
                            <td>
                                <B>Operador:</B><dd>{{ $service->driverr->name }}</dd>
                            </td>
                            <td>
                                <B>Unidad:</B><dd>{{ $service->unitr->description or '' }}</dd>
                            </td>
                            <td>
                                <B>Regreso:</B><dd>{{ $service->formatted_date_return }}</dd>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <h2 align="right">Total: ${{ $service->amount }}</h2>
            </solid-box>
        </div>
    </div>
@endsection
