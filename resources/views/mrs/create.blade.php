@extends('layout.app')
@section('style')
   <link rel="stylesheet" href="../4/cerulean/bootstrap.css" media="screen">
   <link rel="stylesheet" href="../_assets/css/custom.min.css">
   <link href="/css/bootstrap.min.css" rel="stylesheet"/>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
   <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
   <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/js/tempusdominus-bootstrap-4.min.js"></script>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/css/tempusdominus-bootstrap-4.min.css" />


@endsection
@section('body')
<div class="container">
  <h2>Add New Reservation</h2>
<form action="{{ route('mrs.store') }}" method="post">
  {{ csrf_field() }}

  <br />
  <fieldset>
  <div class="form-group has-success">
    <label class="form-control-label" for="inputSuccess1">Event Title:</label>
  <input class="form-group is-valid" type="text" name="event_title" required />
</div>
</fieldset>

  <div class="form-group">
    <label class="form-group-label">Room:</label>
  <select id="room_no" name="room_no" oncahnge="getSelectedRoom" required>
    <option value="M1">M1 </option>
    <option value="M2">M2</option>
    <option value="M3">M3 </option>
    <option value="S1">S1</option>
    <option value="S2">S2 </option>
    <option value="CM1">Cm1</option>
    <option value="CM2">CM2 </option>
  </select>
  <script>
  function getSelectedRoom(){
    var selectedRequest = document.getElementById("room_no").value;
    console.log(selectedRequest);
  }
  </script>
</div>

<label class="form-control-label" for="inputSuccess1">Event Time:</label>
<br>
  from:
  <div class="container">
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <div class="input-group date" id="datetimepicker1" data-target-input="nearest">
                    <input type="text" name="start_time" class="form-control datetimepicker-input" data-target="#datetimepicker1" required/>
                    <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            $(function () {
                $('#datetimepicker1').datetimepicker().value = date('Y-m-d H:i:s');
            });
        </script>
    </div>
</div>

  to:
  <div class="container">
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <div class="input-group date" id="datetimepicker2" data-target-input="nearest">
                    <input type="text" name="end_time" class="form-control datetimepicker-input" data-target="#datetimepicker2" required/>
                    <div class="input-group-append" data-target="#datetimepicker2" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            $(function () {
                $('#datetimepicker2').datetimepicker().value = date('Y-m-d H:i:s');
            });
        </script>
    </div>
</div>

<div class="form-group has-success">
  <label class="form-control-label" for="inputSuccess1">Task description:</label>
  <textarea name="description" required></textarea>
</div>

<div class="form-group has-success">
    <label class="form-control-label" for="inputSuccess1">Number of participants:</label>
  <input type="text" name="participant_no" required/>
</div>


  <br />
<label >Object Needed:</label>
    <input type="checkbox" value="No need"  id="object" name="object[]"> No need
    <input type="checkbox" value="Laptop & Projector"  id="object" name="object[]"> Laptop & Porjector
    <input type="checkbox" value="Pointer"  id="object" name="object[]"> Pointer
  <br>

<label class="form-control-label" for="inputSuccess1">Remark:</label>
  <input type="text" name="remark" required/>
  <br /><br />



  <input type="submit" value="Save" />

<br />

</form></div>

<a class="btn btn-outline-dark" href="{{ url()->previous() }}">Back</a>

@endsection
@section('script')
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="../_vendor/jquery/dist/jquery.min.js"></script>
<script src="../_vendor/popper.js/dist/umd/popper.min.js"></script>
<script src="../_vendor/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="../_assets/js/custom.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>


@endsection
