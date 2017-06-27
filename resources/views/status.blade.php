@extends('layout')

@section('content')
<h3>Payments status</h3>
<ul>
  @foreach ($receivers as $receiver)
  <li>{{ $receiver->firstname }} {{ $receiver->lastname }} {{ $receiver->email }} {{ $status[$receiver->request_id]}}</li>
  @endforeach
</ul>
@stop
