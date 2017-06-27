<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;
// use Illuminate\Http\Request;

class ReceiversController extends Controller
{
  public function index() {
    return view('index');
  }


  public function payment()
  {

    // API payment request

    $url = "https://homologation.lydia-app.com/api/request/do.json";
    $postfields = array("vendor_token" => "58385365be57f651843810",
      "recipient" => $_GET['recipient'],
      "amount" => "50",
      "currency" => "EUR",
      "type" => "email"
      );
    $result = $this->api_request($postfields, $url);

    // Get info from API response
    $jsonArray = json_decode($result, true);
    $request_id = $jsonArray["request_id"];
    $error = $jsonArray["error"];
    $message = $jsonArray["message"];

    // Save an instance to the database
    $receiver = \App\Receiver::create(array(
      'firstname' => $_GET['firstname'],
      'lastname' => $_GET['lastname'],
      'email' => $_GET['recipient'],
      'amount' => "50",
      'error' => $error,
      'request_id' => $request_id,
      'message' => $message));

    $receiver->save();

    // Give data to the view
    $data = array(
    'firstname' => $_GET['firstname'],
    'lastname' => $_GET['lastname'],
    'email' => $_GET['recipient'],
    'result' => $result,
    'request_id' => $request_id);
    return view('payments')->with($data);
  }

  public function status() {
    $receivers = \DB::table('receivers')->get();
    $status = array();

    foreach ($receivers as $receiver) {
      $url = "https://homologation.lydia-app.com/api/request/state.json";
      $postfields = array("request_id" => $receiver->request_id);
      $result = $this->api_request($postfields, $url);

      $jsonArray = json_decode($result, true);
      $state = $jsonArray["state"];
      $status[$receiver->request_id] = $state;
    }

    $data = array(
      'receivers' => $receivers,
      'status' => $status);

    return view('status')->with($data);
  }

    public function api_request($postfields, $url) {
      $curl = curl_init();
      curl_setopt_array($curl, array(
      CURLOPT_RETURNTRANSFER => 1,
      CURLOPT_URL => $url,
      CURLOPT_POSTFIELDS => $postfields
      ));
      $result = curl_exec($curl);
      curl_close($curl);
      return $result;
  }
}

?>
