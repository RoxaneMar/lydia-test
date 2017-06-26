@extends('layout')

@section('content')
    <h3>Contact Lydia</h3>
    <form action="form.php" method="POST">
      <p>First name</p> <input type="text" name="firstname" required>
      <p>Last name</p> <input type="text" name="lastname" required>
      <p>Email address</p> <input type="text" name="email" required>
      <input type="submit" value="Send">
    </form>
@stop
