<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;

class ReceiversController extends Controller
{
  public function index() {
    return view('index');
  }

  public function payment()
  {

    // API payment request
    $url = "https://homologation.lydia-app.com/api/request/do.json";
    $postfields = ["vendor_token" => "58385365be57f651843810",
      "recipient" => $_GET['recipient'],
      "amount" => "20",
      "currency" => "EUR",
      "type" => "email",
      "confirm_url" => "http://localhost:8000/payment"
    ];
    $result = $this->api_request($postfields, $url);

    // Get info from API response
    $jsonArray = json_decode($result, true);
    $request_id = $jsonArray["request_id"];
    $error = $jsonArray["error"];
    $message = $jsonArray["message"];

    // Save an instance to the database
    $receiver = \App\Receiver::create([
      'firstname' => $_GET['firstname'],
      'lastname' => $_GET['lastname'],
      'email' => $_GET['recipient'],
      'amount' => "20",
      'error' => $error,
      'request_id' => $request_id,
      'message' => $message]);

    $receiver->save();

    // Give data to the view
    $data = [
      'firstname' => $_GET['firstname'],
      'lastname' => $_GET['lastname'],
      'email' => $_GET['recipient'],
      'result' => $result,
      'request_id' => $request_id
    ];
    return view('payments')->with($data);
  }

  public function status() {

    // Retrieve receivers instances from DB
    $receivers = \DB::table('receivers')->orderBy('created_at', 'desc')->get();
    $status = array();

    // API request for each instance
    foreach ($receivers as $receiver) {
      $url = "https://homologation.lydia-app.com/api/request/state.json";
      $postfields = ["request_id" => $receiver->request_id];
      $result = $this->api_request($postfields, $url);

      $jsonArray = json_decode($result, true);
      $state = $jsonArray["state"];
      // Create an array of key = request_id, value = status number
      $status[$receiver->request_id] = $state;
    }

    // Give data to the view
    $data = [
      'receivers' => $receivers,
      'status' => $status];

    return view('status')->with($data);
  }

    public function api_request($postfields, $url) {
      $curl = curl_init();
      curl_setopt_array($curl, [
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_URL => $url,
        CURLOPT_POSTFIELDS => $postfields
      ]);
      $result = curl_exec($curl);
      curl_close($curl);
      return $result;
  }
}

?>
