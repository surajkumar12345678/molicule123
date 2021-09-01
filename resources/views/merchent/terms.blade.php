@extends('layouts.merchent')

@section('style')

@endsection

@section('content')
<!-- ***** Welcome Area Start ***** -->

<section id="home" class="section welcome-area bg-overlay overflow-hidden d-flex">

    <div class="container">
        <div style="text-align:center">
            <h3 class="whitetext">Terms and Conditions </h3><br><br>
            <p class=" whitetext">{!!$term->desc!!}</p>
        </div>

    </div>
    <!-- Shape Bottom -->
    <div class="welcome-shape">
        
    </div>
</section>
<section style="background-color: #137FEB;">
    <div class="container">
        <div class="row">
            <div style="" class="col-md-12">

                

            </div>
        </div>

    </div>
</section>

@endsection