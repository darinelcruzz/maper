@extends('admin')

@section('main-content')
	<div class="row">
		<div class="col-md-4">
			<solid-box title="Corte" color="primary">
				{!! Form::open(['method' => 'POST', 'route' => 'admin.reportBalance', 'target' => '_blank']) !!}
				<div class="row">
					<div class="col-md-12">
						{!! Field::select('salary', ['1' => 'Si', '0' => 'No'], null, ['empty' => '¿Agregar salario?', 'tpl' => 'templates/withicon'], ['icon' => 'user']) !!}
					</div>
				</div>
					{!! Form::submit('Generar', ['class' => 'btn btn-block btn-primary']) !!}
				{!! Form::close() !!}
			</solid-box>
		</div>

		<div class="col-md-4">
			<solid-box title="Servicios" color="primary" >
				{!! Form::open(['method' => 'POST', 'route' => 'admin.reportServices', 'target' => '_blank']) !!}
					<div class="row">
						<div class="col-md-12">
							{!! Form::submit('Buscar', ['class' => 'btn btn-block btn-primary']) !!}
						</div>
					</div>
				{!! Form::close() !!}
			</solid-box>
		</div>

		<div class="col-md-4">
			<div class="row">
				<div class="col-sm-12">
					<a href="{{ route('admin.cut') }}" class="btn btn-success">
						<i class="fa fa-check"></i> &nbsp;Marcar como pagado
					</a>
				</div>
			</div>
		</div>
	</div>
@endsection
