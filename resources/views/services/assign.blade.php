{!! Form::open(['method' => 'POST', 'route' => 'service.general.setPayMethod']) !!}
  <div class="input-group input-group-sm">
      <input type="hidden" name="id" value="{{ $row->id }}">
      <input type="hidden" name="date_credit" value="{{ date('Y-m-d\TH:i') }}">
      <input type="hidden" name="status" value="liquidado">
      <select class="form-control" name="pay_credit">
          <option selected disabled>¿Cómo pagó?</option>
          <option value="Efectivo">Efectivo</option>
          <option value="T. Debito">T. Debito</option>
          <option value="T. Credito">T. Credito</option>
          <option value="Transferencia">Transferencia</option>
          <option value="Cheque">Cheque</option>
      </select>
      <span class="input-group-btn">
        <button type="submit" class="btn btn-success btn-flat btn-xs">
            <i class="fa fa-check"></i>
        </button>
      </span>
  </div>
{!! Form::close() !!}
