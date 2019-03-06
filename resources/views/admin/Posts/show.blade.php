@extends('admin.index')
@section('content')


<div class="box box-primary">
    <div class="box-body box-profile">
        <div class="row">
            <div class="col-md-6">
                <img class="img-responsive" src="{{ url('uploads/'.$post->image) }}" alt="Image For Post" style="height:300px;width: 100%">
            </div>
            <div class="col-md-6">
                <h2 class="text-center">{{ $post->title }}</h2>
                <span class="pull-right" style="direction:rtl;font-size:20px"><i class="fa fa-database"></i>  قسم : {{ $post->category->name }} :- </span>
                <br>
                <br>
            </div>
            <p class="lead" style="padding:20px;mardin:5px;direction:rtl"> {{ $post->content }}</p>
        </div>
    </div>
    <!-- /.box-body -->
  </div>
@endsection
