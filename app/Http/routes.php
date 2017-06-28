<?php

Route::get('/', 'ReceiversController@index');
Route::get('/payment', 'ReceiversController@payment');
Route::get('/status', 'ReceiversController@status');

?>
