{!! Form::open(['method' => 'POST', 'route' => 'service.general.change']) !!}
  <div class="input-group input-group-sm">
      <input type="hidden" name="id" value="{{ $row->id }}">
      <input type="hidden" name="status" value="{{ $row->status }}">
      <input type="text" name="bill" required>
      <span class="input-group-btn">
        <button type="submit" class="btn btn-success btn-flat btn-xs">
            <i class="fa fa-check"></i>
        </button>
      </span>
  </div>
{!! Form::close() !!}
