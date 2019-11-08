<?php
Route::resource('items', 'ItemController');

Route::post('/select-items','ItemController@selectItems');

Route::put('/update-cart-items','ItemController@updateCartItems');

Route::delete('/remove-cart-items','ItemController@removeCartItems');
