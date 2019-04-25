@extends('admin')

@section('main-content')
	<div class="row">
		<div class="col-md-12">
			<solid-box title="Corte" color="danger">
				<form-wizard
					title=""
					subtitle=""
					color="#dd4b39"
					@on-complete="enableButton"
					@on-change="disableButton"
					back-button-text="Anterior"
					next-button-text="Siguiente">

					<tab-content title="Servicios" icon="fa fa-file-text-o">
						{!! Form::open(['method' => 'POST', 'route' => 'admin.reportServices', 'target' => '_blank']) !!}
							<br><h3 align="center">Formato de servicios e ingresos</h3><br>
							<div class="row">
								<div class="col-md-6  col-md-offset-3">
									{!! Form::submit('Generar', ['class' => 'btn btn-block btn-primary']) !!}
								</div>
							</div>
						{!! Form::close() !!}
						<br><br>
					</tab-content>
					<tab-content title="Extras" icon="fa fa-plus">
						@include('resources.drivers.extras')
					</tab-content>
					<tab-content title="Descuentos/Bonos" icon="fa fa-money">
						@include('resources.drivers.discounts.index')
						<div class="row">
							<div class="col-md-6  col-md-offset-3">
								<a href="{{ route('discount.create') }}" class="btn btn-block btn-danger" target="_blank">
									Agregar
								</a>
							</div>
						</div>
						<br><br>
					</tab-content>
					<tab-content title="Corte" icon="fa fa-cut" :before-change='generateFormat'>
						{!! Form::open(['method' => 'POST', 'route' => 'admin.reportBalance', 'target' => '_blank', 'ref' => 'generateFormat']) !!}
							<br><h3 align="center">Formato de pago</h3><br>
							<div class="row">
								<div class="col-md-6  col-md-offset-3">
									{!! Field::select('salary', ['1' => 'Si', '0' => 'No'], null, ['empty' => '¿Agregar salario?', 'tpl' => 'templates/withicon'], ['icon' => 'user']) !!}
								</div>
							</div>
						{!! Form::close() !!}
						<br><br>
					</tab-content>
					<tab-content title="Finalizar" icon="fa fa-check">
						<br><h3 align="center">Marcar como corte pagado</h3><br>
						<div class="row">
							<div class="col-md-6  col-md-offset-3">
								<a href="{{ route('admin.cut') }}" class="btn btn-block btn-success">
									Confirmar
								</a>
							</div>
						</div>
						<br><br>
					</tab-content>
					<tab-content title="Anteriores" icon="fa fa-backward">
						{{-- <div class="row">
							<div class="col-md-12">
								{!! Field::select('salary', $dates, null, ['empty' => '¿De que fecha?', 'tpl' => 'templates/withicon'], ['icon' => 'user']) !!}
							</div>
						</div> --}}
					</tab-content>
				</form-wizard>
			</solid-box>
		</div>

		{{-- <div class="col-md-4">
			<solid-box title="Servicios" color="primary" >

			</solid-box>
		</div>

		<div class="col-md-4">

		</div> --}}
	</div>
@endsection
