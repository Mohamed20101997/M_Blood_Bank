@extends('admin.index')
@section('content')
{!! Form::model($category,['method'=>'PATCH','route'=>['category.update', $category->id],'id'=>'editForm']) !!}
  <div class="form-group">
      <i class="fa fa-user"></i>
      {!! Form::label('name', 'Name') !!}
      {!! Form::text('name', $category->name,['class'=>'form-control','placeholder'=>'category Name',
      'required'=>'required' ]) !!}
  </div>
  <div class="modal-footer" style="background: #3c8dbc;color:#FFF">
      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      {!! Form::submit('Insert', ['class'=>'btn btn-info']) !!}
  </div>
{!! Form::close() !!}


@endsection
