@extends('admin.index')
@section('content')
<br><br>
<table class="table table-striped  table-bordered center" id="datatable" >
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">about</th>
        <th scope="col">phone_number</th>
        <th scope="col">email</th>

        <th scope="col" style="text-align: center;">Edit</th>
      </tr>
    </thead>

    <tbody>
      @foreach ($records as $record)
        <tr>
          <th scope="row">{{$loop->iteration}}</th>
          <td>{{ $record->about }}</td>
          <td>{{ $record->phone_number }}</td>
          <td>{{ $record->email }}</td>
            <td  style="text-align: center">
                <a href="{{ route('setting.edit',$record->id) }}" class="btn btn-primary"><i class="fa fa-edit fa-lg"></i></a>
              </td>
        </td>
        </tr>
      @endforeach
    </tbody>
    <tfooter>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">about</th>
            <th scope="col">phone_number</th>
            <th scope="col">email</th>
            <th scope="col" style="text-align: center;">Edit</th>
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

