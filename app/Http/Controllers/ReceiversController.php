<?php

namespace App\Http\Controllers;

use App\Receiver;

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


}

?>
