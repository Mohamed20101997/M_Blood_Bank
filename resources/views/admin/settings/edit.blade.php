@extends('admin.index')
@section('content')

{!! Form::model($setting,['method'=>'PATCH','route'=>['setting.update', $setting->id],'id'=>'editForm']) !!}
  <div class="form-group">
      <div class="row">
          <div class="col-md-6">
            <i class="fa fa-user"></i>
            {!! Form::label('about', 'about') !!}
            {!! Form::text('about', $setting->about,['class'=>'form-control','placeholder'=>'about',
            'required'=>'required' ]) !!}
          </div>
          <div class="col-md-6">
            <i class="fa fa-user"></i>
            {!! Form::label('phone_number', 'phone_number') !!}
            {!! Form::text('phone_number', $setting->phone_number,['class'=>'form-control','placeholder'=>'phone_number',
            'required'=>'required' ]) !!}
          </div>
      </div>
  </div>
  <div class="form-group">
      <div class="row">
          <div class="col-md-6">
            <i class="fa fa-user"></i>
            {!! Form::label('email', 'email') !!}
            {!! Form::email('email', $setting->email,['class'=>'form-control','placeholder'=>'email',
            'required'=>'required' ]) !!}
          </div>
          <div class="col-md-6">
            <i class="fa fa-user"></i>
            {!! Form::label('android_app_ur', 'android_app_url') !!}
            {!! Form::url('android_app_ur', $setting->android_app_ur,['class'=>'form-control','placeholder'=>'android_app_ur',
            'required'=>'required' ]) !!}
          </div>
      </div>
  </div>
  <div class="form-group">
      <div class="row">
          <div class="col-md-6">
            <i class="fa fa-user"></i>
            {!! Form::label('ios_app_url', 'ios_app_url') !!}
            {!! Form::url('ios_app_url', $setting->ios_app_url,['class'=>'form-control','placeholder'=>'ios_app_url',
            'required'=>'required' ]) !!}
          </div>
          <div class="col-md-6">
            <i class="fa fa-user"></i>
            {!! Form::label('facebook_url', 'facebook_urll') !!}
            {!! Form::url('facebook_url', $setting->facebook_url,['class'=>'form-control','placeholder'=>'facebook_url',
            'required'=>'required' ]) !!}
          </div>
      </div>
  </div>
  
  <div class="form-group">
      <div class="row">
          <div class="col-md-6">
            <i class="fa fa-user"></i>
            {!! Form::label('twitter_url', 'twitter_url') !!}
            {!! Form::url('twitter_url', $setting->twitter_url,['class'=>'form-control','placeholder'=>'twitter_url',
            'required'=>'required' ]) !!}
          </div>
          <div class="col-md-6">
            <i class="fa fa-user"></i>
            {!! Form::label('youtube_url', 'youtube_urll') !!}
            {!! Form::url('youtube_url', $setting->youtube_url,['class'=>'form-control','placeholder'=>'youtube_url',
            'required'=>'required' ]) !!}
          </div>
      </div>
  </div>
  
  <div class="form-group">
      <div class="row">
          <div class="col-md-6">
            <i class="fa fa-user"></i>
            {!! Form::label('instgram_url', 'instgram_url') !!}
            {!! Form::url('instgram_url', $setting->instgram_url,['class'=>'form-control','placeholder'=>'instgram_url',
            'required'=>'required' ]) !!}
          </div>
          <div class="col-md-6">
            <i class="fa fa-user"></i>
            {!! Form::label('whatsapp_url', 'whatsapp_urll') !!}
            {!! Form::url('whatsapp_url', $setting->whatsapp_url,['class'=>'form-control','placeholder'=>'whatsapp_url',
            'required'=>'required' ]) !!}
          </div>
      </div>
  </div>
  <div class="modal-footer" style="background: #3c8dbc;color:#FFF">
      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      {!! Form::submit('Update', ['class'=>'btn btn-info']) !!}
  </div>
{!! Form::close() !!}


@endsection
