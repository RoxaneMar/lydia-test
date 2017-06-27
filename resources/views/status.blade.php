@extends('layout')

@section('content')
<h3>Payments status</h3>
<ul>
  @foreach ($receivers as $receiver)
  <li>{{ $receiver->firstname }} {{ $receiver->lastname }} {{ $receiver->email }} {{ $status[$receiver->request_id]}}</li>
  @endforeach
</ul>
<table>
  <thead>
    <tr>
      <th>Prénom</th>
      <th>Nom</th>
      <th>Email</th>
      <th>Montant (€)</th>
      <th>Status</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td></td>
    </tr>
  </tbody>
</table>

@stop
