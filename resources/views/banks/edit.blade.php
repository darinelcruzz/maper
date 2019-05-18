@extends('admin')

@section('main-content')

    <div class="row">
        <div class="col-md-4">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">Editar gastos en banco</h3>
                </div>
                <!-- form start -->
                {!! Form::open(['method' => 'POST', 'route' => ['bank.change', $expense]]) !!}

                <div class="box-body">

                    <div class="row">
                        <div class="col-md-6">
                            {!! Field::text('description', isset($expense) ? $expense->description: null) !!}
                        </div>
                        <div class="col-md-6">
                            {!! Field::number('amount', isset($expense) ? $expense->amount: null, ['min' => '0', 'step' => '.01']) !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            {!! Field::text('folio', isset($expense) ? $expense->folio: null) !!}
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <input type="hidden" name="date" value="{{ date('Y-m-d\TH:i') }}">
                    <input type="hidden" name="method" value="b">
                    <input type="hidden" name="id" value="{{ $expense->id }}">
                    {!! Form::submit('Editar', ['class' => 'btn btn-black btn-block']) !!}
                </div>
                <!-- /.box-footer -->
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
