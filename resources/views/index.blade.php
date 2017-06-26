@extends('layout')

@section('content')
    <h3>Contact Lydia</h3>
    <form action="/payment" method="GET">
      <p>First name</p> <input type="string" name="firstname" required>
      <p>Last name</p> <input type="string" name="lastname" required>
      <p>Email address</p> <input type="string" name="recipient" required>
      <input type="submit" value="Send">
    </form>
@stop
