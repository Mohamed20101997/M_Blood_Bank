@extends('admin.index')
@section('content')

<div class="panel panel-default">
    <div class="panel-heading"><h3><strong>Order By</strong>: {{  $order->client->name}} </h3></div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-6">
                    <p><h4><strong>Name</strong>: {{  $order->name}} </h4></p>
            </div>
            <div class="col-md-6">
                    <p><h4><strong>Age</strong>: {{  $order->age}} </h4></p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                    <p><h4><strong>Number Of Bags</strong>: {{  $order->number_of_bags}} </h4></p>
            </div>
            <div class="col-md-6">
                    <p><h4><strong>Hospital Name</strong>: {{  $order->hospital_name}} </h4></p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                    <p><h4><strong>Blood Type</strong>: {{  $order->blood_type->name}} </h4></p>
            </div>
            <div class="col-md-6">
                    <p><h4><strong>City</strong>: {{  $order->city->name}} </h4></p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                    <p><h4><strong>Phone Number</strong>: {{  $order->phone_number}} </h4></p>
            </div>
            <div class="col-md-6">
                    <p><h4><strong>Details</strong>: {{  $order->details}} </h4></p>
            </div>
        </div>




    </div>

</div>
@endsection
