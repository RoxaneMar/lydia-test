@extends('layout')

@section('content')
    <h3>Your payments has been submitted {{ $firstname }} {{ $lastname }}, the request has been sent to {{ $email }} </h3>
    <p> {{ $result }}</p>
    <p> Request_id = {{ $request_id }}</p>
@stop
