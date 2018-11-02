@extends('admin')

@section('main-content')
	<div class="row">
		<div class="col-md-6">
			<solid-box title="Servicios" color="primary" button>
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

		<div class="col-md-6">
			<div class="row">
				<div class="col-sm-12">
					<a href="{{ route('admin.cut') }}" class="btn btn-success" style="{{ date('N') == 4 ? '': 'pointer-events: none;
   cursor: default;' }}" {{ date('N') == 4 ? '': 'disabled' }}>
						<i class="fa fa-check"></i> &nbsp;Marcar c/pagado
					</a>
				</div>
				<hr>
				<div class="col-sm-12">
					<a href="{{ route('admin.reportBalance') }}" class="btn btn-info" target="_blank">
						<i class="fa fa-print"></i> &nbsp;Corte
					</a>
				</div>
			</div>
		</div>
	</div>
@endsection
