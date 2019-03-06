
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete-model{{ $id }}">
  <i class="fa fa-trash"></i>
</button>

@php
    $name= empty($name) ? 'field' :$name;
@endphp

<!-- Modal -->
<div class="modal fade " id="delete-model{{ $id }}" tabindex="-1" role="dialog">
  <div class="modal-dialog" >
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title center" id="exampleModalLabel">Delete.. {{ $name }}</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>  
      </div>
      <div class="modal-body model-danger" style="background:#992a2a" >
        <p style="color:#e1e1e1;font-weight:bold"> Are You Shure Delete .. {{ $name }} </p>
      </div>
      <div class="modal-footer">
          <form action="{{ url()->current().'/'.$id }}" id="delete-form{{ $id }}" method="POST" class="hidden">
            <input type="hidden"  name="_method" value="DELETE">
            <input type="hidden"  name="_token" value="{{ csrf_token() }}">
          </form>
          <input type="submit" form="delete-form{{ $id }}" id="submit{{ $id }}" value="Delete" class="btn btn-danger">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>   
    </div>
  </div>
</div>
