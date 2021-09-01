@extends('layouts.admin')
@section('content')
@section('content')

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
@section('style')
<style>
  .sb-example-1 .search {
  width: 100%;
  position: relative;
  display: flex;
}
.sb-example-1 .searchTerm {
    width: 100%;
    border: none;
    padding: 10px;
    margin-left: 70px;
  }
.sb-example-1 .searchTerm:focus{
  color: #00B4CC;
}
.sb-example-1 .searchButton {
    width: 40px;

    /* height: 50px; */
    border: 1px solid #ffffff;
    background: #ffffff;
    text-align: center;
    color: #10000045;
    /* border-radius: 0 5px 5px 0; */
    cursor: pointer;
    font-size: 20px;
}
.wrapper{
    margin: 40px 20px;
}
</style>
@endsection
@section('content')

    @if ($confirm = Session::get('confirm'))
    <div class="padding">
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $confirm }}</strong>
        </div>
    </div>
    @endif
    <div class="wrapper" >
        <h1 class="text-3xl">Subscription Management</h1>
        <div class="content mt-2">
            @if ($msg=Session::get('msg'))
            <div id="error" class="bg-green-500 w-1/4 px-4 py-2 rounded-xl text-white text-sm mb-4">
                    <p>{{ $msg }}</p>
                </div>
                @endif
            <div class="flex flex-row">
                <a href="{{ route('add-subscriptions') }}">
                    <div class="bg-blue-500 px-3 py-2 rounded-lg shadow-md text-gray-200 mx-2">
                        <button class="text-md">
                            Add Subscription
                        </button>
                    </div>
                </a>
            </div>
            <!-- Button trigger modal -->
            <div class="mt-4 px-4">
                <table class="table table-bordered table-responsive w-100 d-block d-md-table ">
                    <thead>
                        <tr>
                            <th class="">Plan Name</th>
                            <th class="">No of Products</th>
                            <th class="">Valid Until</th>
                            <th class="">Price</th>
                            <th class="">Active</th>
                            <th colspan="2">Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-striped" >
                        @foreach ($subscriptions as $subscription)
                        <tr>
                            <td class="">{{ $subscription->plan_name }}</td>
                            <td class="">{{ $subscription->number_of_product_allowed }}</td>
                            <td class="">{{ $subscription->start_date }} - {{ $subscription->end_date }}</td>
                            <td class="">{{ $subscription->price }}</td>
                            <td class="">{{ $subscription->is_active }}</td>
                            <td class="">
                                <a href="{{ url('edit-subcriptions'.'/'.$subscription->id) }}">Edit</a>
                            </td>
                            <td class="">
                                <a href="{{ url('delete-subcriptions'.'/'.$subscription->id) }}">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $subscriptions->links()}}
            </div>
        </div>

    </div>


    @endsection
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
@endsection

@endsection
