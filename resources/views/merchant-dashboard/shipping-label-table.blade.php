
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

    <title>Slip</title>

  </head>
  <body>
    <div class="container">
  <button onclick="fun();" id="btn" style="float:right">click</button>
      <div class="row print-container">
        <div class="col-md-12" style="margin-top:60px">
          <table class="table">
  <thead>
    <tr>

      <th scope="col">  <img src="{{asset('uploads/logo/'.$data['logo'])}}" alt="image" width="70px" height="70px">

      </th>
      <th scope="col">BOX 1 OF 1 - 1lb</th>

    </tr>
  </thead>
  <tbody>
    <tr>

      <td>SHIP FROM:<br>
      {{$data['label_name']}}<br>
      {{$data['address']}}<br>
      {{$data['phoneno']}},
       {{$data['email']}}

      </td>
      <td>SHIP TO:<br>
          James Bond
          333 Boren Ave N
          Seattle,WA 98109
          United States
      </td>

    </tr>
<tr >
<td colspan="2"  class="table-active">
  <?php
 $d=date('d/m/y,');
 echo $d;
  ?>
FBA(10/30/19 10:55 AM).1
</td>
</tr>
  </tbody>
</table>
        </div>
      </div>
    </div>

    <script type="text/javascript">
      function fun(){
       var d=document.getElementById("btn").style.display='none';
       window.print();
      }
    </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>


  </body>
</html>
