@extends('admin')

@section('main-content')
	<div class="row">
		<div class="col-md-6">
			<solid-box title="Corte" color="primary" button collapsed>
				{!! Form::open(['method' => 'POST', 'route' => 'admin.reportBalance', 'target' => '_blank']) !!}
					<div class="row">
						<div class="col-md-12">
							{!! Field::date('start', $date, ['tpl' => 'templates/withicon'],
							['icon' => 'calendar-check-o']) !!}
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							{!! Field::date('end', $date, ['tpl' => 'templates/withicon'],
							['icon' => 'calendar-check-o']) !!}
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							{!! Form::submit('Buscar', ['class' => 'btn btn-primary pull-right']) !!}
							<a href="{{ route('admin.cut') }}" class="btn btn-success pull-left">Hacer corte</a>
						</div>
					</div>
				{!! Form::close() !!}
			</solid-box>
		</div>
		<div class="col-md-6">
			<solid-box title="Servicios" color="primary" button collapsed>
				{!! Form::open(['method' => 'POST', 'route' => 'admin.reportServices', 'target' => '_blank']) !!}
					<div class="row">
						<div class="col-md-12">
							{!! Field::date('start', $date, ['tpl' => 'templates/withicon'],
							['icon' => 'calendar-check-o']) !!}
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							{!! Field::date('end', $date, ['tpl' => 'templates/withicon'],
							['icon' => 'calendar-check-o']) !!}
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							{!! Form::submit('Buscar', ['class' => 'btn btn-primary pull-right']) !!}
						</div>
					</div>
				{!! Form::close() !!}
			</solid-box>
		</div>
	</div>
@endsection
