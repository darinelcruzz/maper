<div class="modal fade" id="client">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background: #dd4b39; color: white">
                <h4 class="modal-title">Agragar cliente</h4>
            </div>
            <div class="modal-body">
                {!! Form::open(['method' => 'POST', 'route' => 'client.store', 'class' => 'form-horizontal']) !!}
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-6 col-md-offset-3">
                                {!! Field::text('name', ['tpl' => 'templates/twolines']) !!}
                                {!! Field::text('phone', ['tpl' => 'templates/twolines']) !!}
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 col-md-offset-3">
                               {!! Form::submit('Agregar', ['class' => 'btn btn-danger btn-block']) !!}
                            </div>
                        </div>
                    </div>

                   {{--  <div class="box-footer">
                        
                    </div> --}}
                {!! Form::close() !!}

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
