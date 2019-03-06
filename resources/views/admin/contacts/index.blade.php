@extends('admin.index')
@section('content')
<br><br>
<table class="table table-striped  table-bordered center" id="datatable" >
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Phone Number</th>
        <th scope="col">Title Message</th>
        <th scope="col">Message</th>
        <th scope="col" style="text-align: center;">Delete</th>
      </tr>
    </thead>

    <tbody>
      @foreach ($records as $record)
        <tr>
          <th scope="row">{{$loop->iteration}}</th>
          <td>{{ $record->name }}</td>
          <td>{{ $record->email }}</td>
          <td>{{ $record->phone_number	 }}</td>
          <td>{{ $record->titile_message}}</td>
          <td>{{ $record->message }}</td>
            <td  style="text-align: center">
                {!! ContactController::delete($record->id, $record->name) !!}
            </td>
        </td>
        </tr>
      @endforeach
    </tbody>
    <tfooter>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Name</th>
          <th scope="col">Email</th>
          <th scope="col">Phone Number</th>
          <th scope="col">Title Message</th>
          <th scope="col">Message</th>
          <th scope="col" style="text-align: center;">Delete</th>
        </tr>
      </tfooter>
  </table>
{{--  End Show Client data  --}}

<div class="row">
    <div class="col-md-12">
       {{ $records->links() }}
    </div>
</div>

@endsection

