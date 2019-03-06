@extends('admin.index')
@section('content')

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
  <i class="fa fa-plus"></i> Add New Post
</button>
{{--  Start Show category data  --}}
<br><br>
<table class="table table-striped  table-bordered center" id="datatable" >
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Title</th>
        <th scope="col">Image</th>
        <th scope="col">Category</th>
        <th scope="col" style="text-align: center;">Show & Edit & Delete </th>
      </tr>
    </thead>

    <tbody>
      @foreach ($records as $record)
        <tr>
          <th scope="row">{{$loop->iteration}}</th>
          <td>{{ $record->title }}</td>
          <td><image class="image-responsive" src="{{ url('uploads/'.$record->image) }}" alt="Photo Profile" style="width:60px;height:60px"></td>
          <td>{{ $record->category->name }}</td>
            <td  style="text-align: center;">
              <a href="{{ route('post.show',$record->id) }}" class="btn btn-primary"><i class="fa fa-eye fa-lg"></i></a>
              <a href="{{ route('post.edit',$record->id) }}" class="btn btn-primary"><i class="fa fa-edit fa-lg"></i></a>
              {!! PostController::delete($record->id, $record->title) !!}
            </td>
        </td>
        </tr>
      @endforeach
    </tbody>
    <tfooter>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Title</th>
          <th scope="col">Image</th>
          <th scope="col">Category</th>
          <th scope="col" style="text-align: center;">Show & Edit & Delete</th>
        </tr>
      </tfooter>
  </table>
{{--  End Show post data  --}}

{{--  Strat post category  --}}

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
        {!! Form::open(['route'=>'post.store', 'method'=>'POST','files'=>'true']) !!}
          <div class="form-group">
              <div class="row">
                  <div class="col-md-6">
                      <i class="fa fa-user"></i>
                      {!! Form::label('title', 'Title') !!}
                      {!! Form::text('title',old('title'),['class'=>'form-control','placeholder'=>'Post Title', 'required'=>'required' ]) !!}   
                  </div>
                  <div class="col-md-6">
                      <i class="fa fa-image"></i>
                      {!! Form::label('image', 'Image') !!}
                      {!! Form::file('image', [ 'class'=>'form-control']) !!}       
                  </div>
              </div>
          </div>
          <div class="form-group">
              <i class="fa fa-user"></i>
              {!! Form::label('category_id', 'Category') !!}
              {!! Form::select('category_id', $category, null ,['class' => 'form-control']) !!}
          </div>
          <div class="form-group">
              {!! Form::label('content', 'Content') !!}                
              {!! Form::textarea('content',old('content'),[ 'class'=>'form-control','placeholder'=>'Post Content', 'required'=>'required','cols'=>'50','rows'=>'5' ]) !!}       
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
{{--  End post category  --}}
<div class="row">
    <div class="col-md-12">
       {{ $records->links() }}
    </div>
</div>

@endsection

