@extends('admin')

@section('htmlheader_title')
    Detalles Aseg
@endsection

@section('main-content')

    <div class="row">
        <div class="col-md-8">
            <solid-box title="{{ 'Id ' . $insurerService->id . ' - ' . $insurerService->insurer->name }}" color="default">
                @include('templates.headTable')
                        <tr>
                            <td>
                                <B>Descripción:</B><dd>{{ $insurerService->description }}</dd>
                            </td>
                            <td>
                                <B>Fecha y hora de Asignación:</B>
                                <dd>{{ fdate($insurerService->assignment, 'l, j F Y h:i a') }}</dd>
                            </td>
                            <td>
                                <B>Inventario:</B><dd>{{ $insurerService->inventory }}</dd>
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
                                <B>Marca:</B> <dd>{{ $insurerService->brand }}</dd>
                            </td>
                            <td>
                                <B>Tipo:</B><dd>{{ $insurerService->type }}</dd>
                            </td>
                            <td>
                                <B>Categoría:</B><dd>{{ $insurerService->category }}</dd>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <B>Carga:</B><dd>{{ $insurerService->load }}</dd>
                            </td>
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
                                <B>Origen:</B><dd>{{ $insurerService->origin }}</dd>
                            </td>
                            <td>
                                <B>Destino:</B><dd>{{ $insurerService->destination }}</dd>
                            </td>
                            <td>
                                <B>Usuario:</B><dd>{{ $insurerService->user }}</dd>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <B>Fecha y hora de Contacto:</B>
                                <dd>{{ fdate($insurerService->date_contact, 'l, j F Y h:i a') }}</dd>
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
                                <B>Unidad:</B><dd>{{ $insurerService->unit->description or '' }}</dd>
                            </td>
                            <td>
                                <B>Regreso:</B><dd>{{ fdate($insurerService->date_return, 'l, j F Y h:i a') }}</dd>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <B>Apoyo:</B><dd>{{ $insurerService->helperr->name or 'N/A' }}</dd>
                            </td>
                            <td>
                                <B>Termino:</B><dd>{{ fdate($insurerService->date_end, 'l, j F Y h:i a') }}</dd>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <h2 align="right">Total: ${{ $insurerService->amount }}</h2>
                <h2 align="right">{{ $insurerService->bill ? 'Fac. ' . $insurerService->bill : '' }}</h2>
            </solid-box>
        </div>
    </div>
@endsection
