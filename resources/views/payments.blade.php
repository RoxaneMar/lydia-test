@extends('layout')

@section('content')
<br>
<br>
    <p>Your payment request has been submitted successfully, the request has been sent to {{ $email }} </p>
    <br>
    <br>
    <a class="secondary-button" href="http://localhost:8000/status">See all payment requests status</a>
@stop

