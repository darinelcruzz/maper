@extends('admin')

@section('main-content')
	<div class="row">
		<div class="col-md-5">
			<solid-box title="Buscar" color="primary">
				{!! Form::open(['method' => 'POST', 'route' => 'admin.report']) !!}
					<div class="row">
						<div class="col-md-6">
							{!! Field::date('start', $date, ['tpl' => 'templates/withicon'],
							['icon' => 'calendar-check-o']) !!}
						</div>
						<div class="col-md-6">
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
