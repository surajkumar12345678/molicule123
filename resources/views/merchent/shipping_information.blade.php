@extends('layouts.merchent')

@section('style')
<style type="text/css">
.switch {
    position: relative;
    }
    .switch label {
    position: absolute;
    background-color: #1F85EC;
    border-radius: 50px;
    width: 95%;
    height: 20px;
    top: -45px;
    left: 20px;
    }
    .switch label:after {
    content: '';
    width: 70%;
    height: 14px;
    border-radius: 50px;
    position: absolute;
    background-color: white;
    transition: all 0.2s;
    top: 3px;
    left: 8px;
    }
    .switch input[type="checkbox"] {
    visibility: hidden;
    }
    .switch input[type="checkbox"]:checked + label {
    background-color: #1F85EC;
    }
    .switch input[type="checkbox"]:checked + label:after {
    /*left: 33px;*/
    }
    /*table {
    width: 100%;
    border: 1px solid #ccc;
    }
    table td input {
    // display: block;
    width: 100%;
    }*/
</style>
@endsection

@section('content')

       <!-- ***** Welcome Area Start ***** -->
       <section id="home" class="section welcome-area bg-overlay overflow-hidden d-flex align-items-center">
                <div class="container">
                  <form action="/MerchantShipping_Information/store" method="post">
                  @csrf  
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            
                            <div class="formarea">
                                <div class="switch">
                                    <input type="checkbox" id="checkbox1">
                                    <label for="checkbox1"></label>
                                    <h4 class="">Shipping Information</h4>
                                </div>
                                <h2 class="pb-2 hedeadrcolor"><!-- Shipping Information --></h2>
                                <div class="col-md-8">
                                    <table id="myTable">
                                        <th>Country</th>
                                        <th>State</th>
                                        <th>Location</th>
                                        <th>Rate</th>
                                        <th>Maximum Weight</th>
                                        <th></th>
                                        <tr>
                                            <td><input type="text" id="country" name="country" /></td>
                                            <td><input type="text" id="state" name="state" /></td>
                                            <td><input type="text" id="location" name="location" /></td>
                                            <td><input type="text" id="rate" name="rate" /></td>
                                            <td><input type="text" id="max_weight" name="max_weight" /></td>
                                            <td><input type="button" id="btnAdd" class="button-add" onClick="insertRow()" value="add"></input></td>
                                        </tr>
                                    </table>
                                </div>
                                <br><br>
                                <div class="row">
                                    <div class="col-md-6">
                                            <div class="form-group row">
                                                <div class="col-sm-5"><b> Offer Free Shipping?</b></div>
                                                <div class="col-sm-7">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="is_freeshipping" name="is_freeshipping">
                                                        <input type="number" name="index" id="index" hidden>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlInput1"><b>(*Free for all or For Order Over Enter Value)</b></label>
                                                <input type="text" class="form-control" placeholder="Enter Your Weight" name="weight">
                                            </div>
                                            <div class="form-group">
                                                <button type="button" class="btn btn-primary">Add Later</button>
                                                
                                            </div>
                                            <div class="form-group mt-5">
                                                <a href="/selectlayout"  class="btn btn-primary">Previous</a>
                                                <button type="submit" class="btn btn-primary">Next</button>
                                            </div>
                                            
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                  </form>  
                </div>
                <!-- Shape Bottom -->
                <div class="welcome-shape">
                    <img src="assets/img/hero_shape.png" alt="">
                </div>
            </section>
            <!-- ***** Welcome Area End ***** -->
@endsection

@section('script')
<script type="text/javascript">
    var index = 1;
        function insertRow(){
        var table=document.getElementById("myTable");
        var row=table.insertRow(table.rows.length);
        var cell1=row.insertCell(0);
        var t1=document.createElement("input");
        t1.id = "country"+index;
        t1.name = "country"+index;
        cell1.appendChild(t1);
        var cell2=row.insertCell(1);
        var t2=document.createElement("input");
        t2.id = "state"+index;
        t2.name = "state"+index;
        cell2.appendChild(t2);
        var cell3=row.insertCell(2);
        var t3=document.createElement("input");
        t3.id = "location"+index;
        t3.name = "location"+index;
        cell3.appendChild(t3);
        var cell4=row.insertCell(3);
        var t4=document.createElement("input");
        t4.id = "rate"+index;
        t4.name = "rate"+index;
        cell4.appendChild(t4);
        var cell5=row.insertCell(4);
        var t5=document.createElement("input");
        t5.id = "max_weight"+index;
        t5.name = "max_weight"+index;
        cell5.appendChild(t5);
        index++;
        document.getElementById('index').value = index;
    }

</script>
@endsection