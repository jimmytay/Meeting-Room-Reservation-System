@extends('layout.app')
@section('style')
<link rel="stylesheet" href="../4/cerulean/bootstrap.css" media="screen">
<link rel="stylesheet" href="../_assets/css/custom.min.css">
<link href="/css/bootstrap.min.css" rel="stylesheet"/>
<link href="css/bootstrap-datetimepicker.css" rel="stylesheet" />
<link href="jquery.datetimepicker.min.css" rel="stylesheet" />
<link href="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/build/css/bootstrap-datetimepicker.css" rel="stylesheet">
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/js/tempusdominus-bootstrap-4.min.js"></script>
@endsection

@section('body')
<div class="container">
  <div class="panel panel-primary">
    <div class="panel-heading">New Reservation
    <a class="btn btn-outline-primary btn-sm btn pull-right text-white" href="/login"  role="button">logout</a></div>
<form action="{{ route('mrs.store') }}" method="post">
  {{ csrf_field() }}
  <div class="panel-body">
  <div class="row">
    <div class="col-3">
      <div class="form-group">
    <label >Event Title:</label>
  <input  type="text" name="event_title" required />
</div></div>

<div class="col-3">
  <div class="form-group">
    <label >Room:</label>
  <select id="room_no" name="room_no" oncahnge="getSelectedRoom" required>
    <option value="M1">M1 </option>
    <option value="M2">M2</option>
    <option value="M3">M3 </option>
    <option value="S1">S1</option>
    <option value="S2">S2 </option>
    <option value="CM1">CM1</option>
    <option value="CM2">CM2 </option>
  </select>
  <script>
  function getSelectedRoom(){
    var selectedRequest = document.getElementById("room_no").value;
    console.log(selectedRequest);
  }
  </script>
</div></div>

<div class="col-3">
<label>Event Time:</label>
<br>
  from:
  <div class="container">
    <div class="row">
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

  to:
  <div class="container">
    <div class="row">
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
</div></div>

<div class="col-3">
<div class="form-group has-success">
  <label class="form-control-label" for="inputSuccess1">Task description:</label>
  <textarea name="description" required></textarea>
</div></div>

<div class="col-sm-4">
<div class="form-group has-success">
    <label class="form-control-label" for="inputSuccess1">Number of participants:</label>
  <input type="text" name="participant_no" required/>
</div></div>


  <br />
  <div class="col-sm-4">
<label >Object Needed:</label>
    <input type="checkbox" value="No need"  id="object" name="object[]"> No need
    <input type="checkbox" value="Laptop & Projector"  id="object" name="object[]"> Laptop & Projector
    <input type="checkbox" value="Pointer"  id="object" name="object[]"> Pointer
  </div>

<div class="col-sm-4">
<label class="form-control-label" for="inputSuccess1">Remark:</label>
  <input type="text" name="remark" required/>
</div>
  <br /><br />
  <div class="col-md-12">
  <input class="btn btn-outline-primary" type="submit" value="Save" /></div>


  <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
          <div class="panel-heading text-white bg-dark">Meeting Room Revervation System
          <a class="btn btn-outline-secondary btn-sm btn pull-right text-white" href="/mrs/show"  role="button">View</a></div>
  <div class="panel-body">
              {!! $calendar->calendar() !!}
              <script>
              $(document).ready(function(){
                var calendar = $('calendar').fullCalendar({
                  editable:true,
                  defaultView: 'agendaWeek',
                  header:{
                    left:'prev,next today',
                    center:'title',
                    right:'month,agendaWeek,agendaDay'
                  }

                });
              });
              </script>
          </div>
      </div>
  </div>
<br />
</div></div>
</form></div></div>





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
<script src="jquery.js"></script>
<script src="jquery.datetimepicker.full.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
{!! $calendar->script() !!}
@endsection
