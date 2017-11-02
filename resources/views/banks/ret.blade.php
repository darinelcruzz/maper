{!! Form::open(['method' => 'POST', 'route' => 'bank.update']) !!}
    <div class="input-group input-group-sm">
        <input type="hidden" name="id" value="{{ $row->id }}">
        <input type="number" name="ret" step="0.01">
        <span class="input-group-btn">
            <button type="submit" class="btn btn-success btn-flat btn-xs">
                <i class="fa fa-check"></i>
            </button>
        </span>
    </div>
{!! Form::close() !!}
