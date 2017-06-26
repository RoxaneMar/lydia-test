@extends('layout')

@section('content')
    <h3>Contact Lydia</h3>
    <form action="https://homologation.lydia-app.com/api/request/do.json" method="POST">
      <p>First name</p> <input type="string" name="firstname" required>
      <p>Last name</p> <input type="string" name="lastname" required>
      <p>Email address</p> <input type="string" name="recipient" required>
      <input type="hidden" name="vendor_token" value="58385365be57f651843810">
      <input type="hidden" name="amount" value="50">
      <input type="hidden" name="currency" value="EUR">
      <input type="hidden" name="type" value="email">
      <input type="submit" value="Send">
    </form>
@stop
