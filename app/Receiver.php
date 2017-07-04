<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

  class Receiver extends Model {
    protected $fillable = array('firstname', 'lastname', 'email', 'amount', 'error', 'request_id', 'message');

    public $firstname;
    public $lastname;
    public $email;
    public $vendor_token = "58385365be57f651843810";
    public $amount;
    public $currency = "EUR";
    public $error;
    public $request_id;
    public $message;
    }
?>
