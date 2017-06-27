@extends('layout')

@section('content')
<h3>Payments status</h3>
<ul>
  @foreach ($receivers as $receiver)
  <li>{{ $receiver->firstname }}</li>
  @endforeach
</ul>
@stop
