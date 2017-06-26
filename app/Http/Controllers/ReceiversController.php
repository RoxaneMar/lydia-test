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
    $email = $_GET['recipient'];
    $curl = curl_init();
    curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => "https://homologation.lydia-app.com/api/request/do.json",
    CURLOPT_POSTFIELDS => array("vendor_token" => "58385365be57f651843810",
      "recipient" => $email,
      "amount" => "50",
      "currency" => "EUR",
      "type" => "email"
      )
));

    $result = curl_exec($curl);
    curl_close($curl);

    $jsonArray = json_decode($result, true);
    $request_id = $jsonArray["request_id"];

    $data = array(
    'firstname' => $_GET['firstname'],
    'lastname' => $_GET['lastname'],
    'email' => $_GET['recipient'],
    'result' => $result,
    'request_id' => $request_id);
    return view('payments')->with($data);
  }
}

?>
