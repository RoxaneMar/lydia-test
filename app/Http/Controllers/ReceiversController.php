<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;
// use Illuminate\Http\Request;

class ReceiversController extends Controller
{
  public function index() {

    // $receivers = Receiver::all();
    return view('index');

    // , compact('receivers')
  }

  public function show($id)
  {

    $receiver = Receiver::find($id);

    return view('receivers.show', compact('receiver'));
  }

  public function payment()
  {
    $data = array(
    'firstname' => $_GET['firstname'],
    'lastname' => $_GET['lastname'],
    'email' => $_GET['recipient']);
    return view('payments')->with($data);


    // "https://homologation.lydia-app.com/api/request/do.json"
    // <input type="hidden" name="vendor_token" value="58385365be57f651843810">
    //   <input type="hidden" name="amount" value="50">
    //   <input type="hidden" name="currency" value="EUR">
    //   <input type="hidden" name="type" value="email">
    //   <input type="hidden" name="confirm_url" value="http://localhost:8000/payment">
  }

}

?>
