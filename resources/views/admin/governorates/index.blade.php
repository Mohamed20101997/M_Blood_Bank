@extends('admin.index')
@section('content')

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
  <i class="fa fa-plus"></i> Add New governorate
</button>
{{--  Start Show Governorate data  --}}
<br><br>
<table class="table table-striped  table-bordered center" id="datatable" >
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Name</th>
        <th scope="col" style="text-align: center;">Edit & Delete</th>
      </tr>
    </thead>

    <tbody>
      @foreach ($records as $record)
        <tr>
          <th scope="row">{{$loop->iteration}}</th>
          <td>{{ $record->name }}</td>
            <td  style="text-align: center;">
              <a href="{{ route('governorate.edit',$record->id) }}" class="btn btn-primary"><i class="fa fa-edit fa-lg"></i></a>
              {!! GovernorateController::delete($record->id, $record->name) !!}
            </td>
        </td>
        </tr>
      @endforeach
    </tbody>
    <tfooter>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Name</th>
          <th scope="col" style="text-align: center;">Edit & Delete</th>
        </tr>
      </tfooter>
  </table>
{{--  End Show Governorate data  --}}

{{--  Strat Cteate Governorate  --}}

<!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background: #3c8dbc;color:#FFF">
        <h5 class="modal-title" style="text-align:center;font-size:30px" id="exampleModalLongTitle"><i class="fa fa-plus"></i> Add New Course</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        {!! Form::open(['route'=>'governorate.store', 'method'=>'POST']) !!}
          <div class="form-group">
                <i class="fa fa-user"></i>
                {!! Form::label('name', 'Name') !!}
                {!! Form::text('name',old('name'),['class'=>'form-control','placeholder'=>'Governorate Name', 'required'=>'required' ]) !!}   
          </div>
          <div class="modal-footer" style="background: #3c8dbc;color:#FFF">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            {!! Form::submit('Insert', ['class'=>'btn btn-info']) !!}
          </div>
        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>
{{--  End Cteate Governorate  --}}


<div class="row">
    <div class="col-md-12">
       {{ $records->links() }}
    </div>
</div>

@endsection

