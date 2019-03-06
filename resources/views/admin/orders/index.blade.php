@extends('admin.index')
@section('content')

{{--  Start Show category data  --}}
<br><br>
<table class="table table-striped  table-bordered center" id="datatable" >
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Name</th>
        <th scope="col">Age</th>
        <th scope="col">Phone_Number</th>
        <th scope="col">Number_Of_Bags</th>
        <th scope="col">Hospital_Name</th>
        <th scope="col">Blood_Type</th>
        <th scope="col">City</th>
        <th scope="col">Client</th>
        <th scope="col" style="text-align: center;">Show & Delete </th>
      </tr>
    </thead>

    <tbody>
      @foreach ($records as $record)
        <tr>
          <th scope="row">{{$loop->iteration}}</th>
          <td>{{ $record->name }}</td>
          <td>{{ $record->age }}</td>
          <td>{{ $record->phone_number }}</td>
          <td>{{ $record->number_of_bags }}</td>
          <td>{{ $record->hospital_name }}</td>
          <td>{{ $record->blood_type->name }}</td>
          <td>{{ $record->city->name }}</td>
          <td>{{ $record->client->name }}</td>
            <td  style="text-align: center;">
              <a href="{{ route('order.show',$record->id) }}" class="btn btn-primary"><i class="fa fa-eye fa-lg"></i></a>
              {!! OrderController::delete($record->id) !!}
            </td>
        </td>
        </tr>
      @endforeach
    </tbody>
    <tfooter>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Name</th>
          <th scope="col">Age</th>
          <th scope="col">Phone_Number</th>
          <th scope="col">Number_Of_Bags</th>
          <th scope="col">Hospital_Name</th>
          <th scope="col">Blood_Type</th>
          <th scope="col">City</th>
          <th scope="col">Client</th>
          <th scope="col" style="text-align: center;">Show & Delete </th>
        </tr>
      </tfooter>
  </table>
{{--  End Show post data  --}}
<div class="row">
    <div class="col-md-12">
       {{ $records->links() }}
    </div>
</div>

@endsection

