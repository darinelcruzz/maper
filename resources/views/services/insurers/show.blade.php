@extends('admin')

@section('main-content')

    <div class="row">
        <div class="col-md-8">
            <solid-box title="{{ $insurerService->insurer->name }}" color="box-default" collapsed=''>
                @include('templates.headTable')
                        <tr>
                            <td>
                                <B>Servicio:</B>
                                <dd>Aseguradora</dd>
                            </td>
                            <td>
                                <B>Fecha y hora:</B>
                                <dd>{{ $insurerService->date }}</dd>
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
                                <B>Modelo:</B> <dd>{{ $insurerService->model }}</dd>
                            </td>
                            <td>
                                <B>Tipo:</B><dd>{{ $insurerService->type }}</dd>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <B>Placas:</B><dd>{{ $insurerService->plate }}</dd>
                            </td>
                            <td>
                                <B>Color:</B><dd>{{ $insurerService->color }}</dd>
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
                                <B>Cliente:</B><dd>{{ $insurerService->client }}</dd>
                            </td>
                            <td>
                                <B>Origen:</B><dd>{{ $insurerService->location }}</dd>
                            </td>
                            <td>
                                <B>Destino:</B><dd>{{ $insurerService->destination }}</dd>
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
                                <B>Operador:</B><dd>{{ $insurerService->driver->name }}</dd>
                            </td>
                            <td>
                                <B>Unidad:</B><dd>{{ $insurerService->vehicule }}</dd>
                            </td>
                            <td>
                                <B>Regreso:</B><dd>{{ $insurerService->date }}</dd>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <h2 align="right">Total: ${{ $insurerService->amount }}</h2>
            </solid-box>
        </div>
    </div>
@endsection
