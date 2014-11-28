@extends('_base_welcome')

@section('head')

@stop

@section('title')
Welcome to Degree Tracker PET
@stop

@section('top')
@stop

@section('middle')
<div class="new">
<h2>Need to create a new account?</h2>
<a href="/signup">Click here to Sign Up</a>
</div>
<br><br>

<div class="old">
<h2>If you already have an account,</h2>
<a href="/login">Click here to Log In</a>
</div>
</div>
@stop

@section('bottom')

@stop
