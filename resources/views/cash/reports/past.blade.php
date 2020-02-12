@extends('admin')

@section('main-content')
	<div class="row">
		<div class="col-md-6">
			<solid-box title="Servicios anteriores" color="danger">
				{!! Form::open(['method' => 'POST', 'route' => 'report.reportPastServices', 'target' => '_blank', 'ref' => 'generateFormat']) !!}
					<div class="row">
						<div class="col-md-6 col-md-offset-3">
							<div id="field_start" class="form-group">
								<label for="start" class="control-label">De</label>
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
									<select class="form-control" id="start" name="start">
										<option value="" selected="selected">¿De que fecha?</option>
										@foreach ($cut_dates as $key => $value)
											<option value="{{ $key }}">{{ $key }}</option>
										@endforeach
									</select>
								</div>
							</div>
						</div>
						<div class="col-md-4  col-md-offset-4">
							{{ Form::submit('Buscar', ['class' => 'btn btn-danger btn-block']) }}
						</div>
					</div>
				{!! Form::close() !!}
			</solid-box>
		</div>
		<div class="col-md-6">
			<solid-box title="Cortes anteriores" color="danger">
				{!! Form::open(['method' => 'POST', 'route' => 'report.reportPastBalance', 'target' => '_blank', 'ref' => 'generateFormat']) !!}
					<div class="row">
						<div class="col-md-6 col-md-offset-3">
							<div id="field_start" class="form-group">
								<label for="start" class="control-label">De</label>
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
									<select class="form-control" id="start" name="start">
										<option value="" selected="selected">¿De que fecha?</option>
										@foreach ($cut_dates as $key => $value)
											<option value="{{ $key }}">{{ $key }}</option>
										@endforeach
									</select>
								</div>
							</div>
						</div>
						<div class="col-md-4  col-md-offset-4">
							{{ Form::submit('Buscar', ['class' => 'btn btn-danger btn-block']) }}
						</div>
					</div>
				{!! Form::close() !!}
			</solid-box>
		</div>
	</div>
@endsection
