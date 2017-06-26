<?php


namespace App;

use Illuminate\Database\Eloquent\Model;

  class Receiver extends Model {
      public $firstname;
      public $lastname;
      public $email;
      public $vendor_token = "58385365be57f651843810";
      public $amount;
      public $currency = "EUR";
      public $error;
      public $request_id;
      public $message;

      public function __construct($firstname, $lastname, $email, $amount, $error, $request_id, $message) {
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->email = $email;
        $this->amount = $amount;
        $this->error = $error;
        $this->request_id = $request_id;
        $this->message = $message;
      }
    }
?>
