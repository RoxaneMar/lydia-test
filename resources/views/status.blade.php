@extends('layout')

@section('content')
<h3>Payments status:</h3>
<table>
  <thead>
    <tr>
      <th>Firstname</th>
      <th>Lastname</th>
      <th>Email</th>
      <th>Amount (€)</th>
      <th>Status</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($receivers as $receiver)
    <tr>
      <td>{{ $receiver->firstname }}</td>
      <td>{{ $receiver->lastname }}</td>
      <td>{{ $receiver->email }}</td>
      <td>{{ $receiver->amount }}</td>
      <td>@if ($status[$receiver->request_id] === "0")
            Waiting to be accepted
          @elseif ($status[$receiver->request_id] === "1")
            Request accepted
          @elseif ($status[$receiver->request_id] === "5")
            Refused by the payer
          @elseif ($status[$receiver->request_id] === "6")
            Cancelled by the owner
          @else
            Invalid request
          @endif </td>
    </tr>
    @endforeach
  </tbody>
</table>

@stop
