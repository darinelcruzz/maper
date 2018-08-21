<div class="modal fade" id="client">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Agragar cliente</h4>
            </div>
            <div class="modal-body">
                {!! Form::open(['method' => 'POST', 'route' => 'client.store', 'class' => 'form-horizontal']) !!}
                    <div class="box-body">
                        {!! Field::text('name', ['tpl' => 'templates/oneline']) !!}
                        {!! Field::text('phone', ['tpl' => 'templates/oneline']) !!}
                    </div>

                    <div class="box-footer">
                        {!! Form::submit('Agregar', ['class' => 'btn btn-danger btn-block']) !!}
                    </div>

                {!! Form::close() !!}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
