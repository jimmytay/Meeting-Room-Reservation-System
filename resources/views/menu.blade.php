@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
              <div class="card-header">Login as</div>
              <div class="card-body" align="center">
                <a class="btn btn-outline-primary" href="{{ route('admin.login') }}">Admin</a>
                <a class="btn btn-outline-primary" href="{{ route('login') }}">User</a>
                  <div class="text-center">


            </div>
          </div>
        </div>
      </div>
@endsection
