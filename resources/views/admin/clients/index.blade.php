@extends('admin.index')
@section('content')
<br><br>
<table class="table table-striped  table-bordered center" id="datatable" >
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">DoB</th>
        <th scope="col">Blood Type</th>
        <th scope="col">City</th>
        <th scope="col">Last Date Donation</th>
        <th scope="col">Phone Number</th>
        <th scope="col" style="text-align: center;">Delete & Active </th>
      </tr>
    </thead>

    <tbody>
      @foreach ($records as $record)
        <tr>
          <th scope="row">{{$loop->iteration}}</th>
          <td>{{ $record->name }}</td>
          <td>{{ $record->email }}</td>
          <td>{{ $record->dob }}</td>
          <td>{{ $record->blood_type->name }}</td>
          <td>{{ $record->city->name }}</td>
          <td>{{ $record->last_date_donation }}</td>
          <td>{{ $record->phone_number }}</td>
            <td  style="text-align: center">
                {!! ClientController::delete($record->id, $record->name) !!}

              @if ($record->is_active == false)
                 <a href="{{ aurl('active/'.$record->id) }}" class="btn btn-success"><i class="fa fa-check-square-o"> Active</i></i></a>
              @else
                 <a href="{{ aurl('deactive/'.$record->id) }}" class="btn btn-info"><i class="fa fa-close"> De-Active</i></a>
              @endif

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
          <th scope="col">DoB</th>
          <th scope="col">Blood Type</th>
          <th scope="col">City</th>
          <th scope="col">Last Date Donation</th>
          <th scope="col">Phone Number</th>
          <th scope="col" style="text-align: center;">Delete & Active</th>
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

