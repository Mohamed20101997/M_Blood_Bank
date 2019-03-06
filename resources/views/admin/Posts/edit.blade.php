@extends('admin.index')
@section('content')
{!! Form::model($post,['method'=>'PATCH','route'=>['post.update', $post->id],'files'=>'true'])  !!}
    <div class="form-group">
    <div class="row">
        <div class="col-xs-12">
                @if (!empty($post->image))
                <image class="image-responsive" src="{{ url('uploads/'.$post->image) }}" alt="Photo Profile" style="width:50%;height:240px">
                @endif
        </div>
    </div>
        <div class="row">
            <div class="col-md-6">
                <i class="fa fa-user"></i>
                {!! Form::label('title', 'Title') !!}
                {!! Form::text('title',$post->title,['class'=>'form-control','placeholder'=>'Post Title', 'required'=>'required' ]) !!}   
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
        {!! Form::textarea('content',$post->content,[ 'class'=>'form-control','placeholder'=>'Post Content', 'required'=>'required','cols'=>'50','rows'=>'5' ]) !!}       
    </div>
    <div class="modal-footer" style="background: #3c8dbc;color:#FFF">
      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      {!! Form::submit('Insert', ['class'=>'btn btn-info']) !!}
    </div>
{!! Form::close() !!}

@endsection
