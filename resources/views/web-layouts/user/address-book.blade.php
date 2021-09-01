@extends('layouts.web_layout')

@section('content')
<style>
.shopping-cart .cart-total_block {
    margin-top: 0px;
}
</style>
<!-- ***** Welcome Area Start ***** -->
<br><br>
<div class="container padding-bottom-3x mb-2">
    <a style="font-size: 25px;" href="{{('user-profile')}}"><i class="fa fa-chevron-circle-left"
            aria-hidden="true"></i>&nbsp;&nbsp;Back to Profile</a><br><br>
    <div class="row">

        <div class="col-lg-12">
            <div class="padding-top-2x mt-2 hidden-lg-up"></div>
            <!-- Wishlist Table-->
            <div style="background-color: whitesmoke;
                padding: 10px 10px 10px 10px;" class="table-responsive wishlist-table margin-bottom-none">
                <h3>Address Book</h3>
            </div>

        </div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Address</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($address as $add)
                <tr>
                    <td>{{ucfirst($add->fname)}} {{ucfirst($add->lname)}}</td>
                    <td>{{ucfirst($add->address)}}, {{ucfirst($add->city)}} {{$add->zipcode}}</td>
                    <td>{{$add->mobile}}</td>
                    <td><a href="" data-toggle="modal" data-target="#view{{$add->id}}"><i class="fa fa-edit"
                                style="font-size:15px"></i></a>
                        <a href="{{url('/user/address/delete')}}/{{$add->id}}" style="color: red;"><i class="far fa-trash-alt"></i> </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4">Data not available</td>

                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>


<!-- Modal -->
@foreach($address as $add)
<div class="modal fade " id="view{{$add->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3><i class="fa fa-bars m-r-5"></i> Update billing details</h3>

            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12 col-lg-12">
                        <form action="{{route('billing.address')}}" method="post">
                            @csrf
                            <div class="form-row">
                            <input value="{{$add->id}}" class="no-round-input-bg" name="id" type="hidden">

                                <div class="form-group col-md-6">
                                    <label for="inputFirstName">First Name*</label>
                                    <input value="{{$add->fname}}" class="form-control" id="inputFirstName" name="fname" type="text"
                                        required="" autocomplete="off" onkeypress="return /[A-Za-z ]/i.test(event.key)">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputLastName">Last Name*</label>
                                    <input  value="{{$add->lname}}" class="form-control" id="inputLastName" name="lname" type="text"
                                        required="" autocomplete="off" onkeypress="return /[A-Za-z ]/i.test(event.key)">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputCompanyName">Mobile Number</label>
                                <input value="{{$add->mobile}}" type="tel" class="form-control" name="mobile" id="inputCompanyName"
                                    onkeypress="return /[0-9 ]/i.test(event.key)">
                            </div>

                            <div class="form-group">
                                <label for="inputStreet">Address*</label>
                                <input value="{{$add->address}}" class="form-control" id="inputStreet" name="address" type="text"
                                    required="">
                            </div>
                            <div class="form-group">
                                <label for="inputZip">Pincode</label>
                                <input value="{{$add->zipcode}}" class="form-control" id="inputZip" name="zipcode" type="tel"
                                    onkeypress="return /[0-9 ]/i.test(event.key)">
                            </div>
                            <div class="form-group">
                                <label for="inputCity">Town / City*</label>
                                <input value="{{$add->city}}" class="form-control" id="inputCity" name="city" type="text" required="">
                            </div>
                            <div style="text-align:center">
                                <button class="normal-btn submit-btn">Save Address</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

@endforeach

@endsection

@push('custom_js')
<script>

</script>
@endpush