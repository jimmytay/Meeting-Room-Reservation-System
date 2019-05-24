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
<br>
<div class="container">
<table class="table table-striped table-bordered table hover">
  <thead class="thead">
    <tr class="warning">
      <th>Id</th>
      <th>Event Title</th>
      <th>Room</th>
      <th>From</th>
      <th>To</th>
      <th>Description</th>
      <th>Number of person</th>
      <th>Object</th>
      <th>Remark</th>
    </tr>
  </thead>
  @foreach($events as $event)
  <tbody>
    <tr>
      <td>{{ $event->id}}</td>
      <td>{{ $event->event_title}}</td>
      <td>{{ $event->room_no}}</td>
      <td>{{ $event->start_time}}</td>
      <td>{{ $event->end_time}}</td>
      <td>{{ $event->description}}</td>
      <td>{{ $event->participant_no}}</td>
      <td>{{ $event->object}}</td>
      <td>{{ $event->remark}}</td>

      <th><a class="btn btn-outline-dark" href="{{ URL::route('mrs.edit',$event['id'])}}" >Edit</a>
<div class="panel-body"</th>
  <th><form method="POST" action ="{{action('mrsController@destroy',$event['id'])}}" >
    {{ csrf_field() }}
    <input type="hidden" name="_method" value="DELETE"/>
    <button type="submit" class="btn btn-danger">Delete</button></form></th>
    <div class="panel-body"</th>
    </tr>
  </body>
  @endforeach
</table>
<a class="btn btn-outline-primary" href="{{ url()->previous() }}">Back</a>
</div>


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
