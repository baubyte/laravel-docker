<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


Route::get('/', function () {
    return view('welcome');
});
Route::get('/email', function(Request $request) {
    $email = App\Email::updateOrCreate($request->all());

    \Mail::raw('Te has suscrito', function ($message) {
        $message->to(request('email'))
            ->sender('admin@laraveldocker.com', 'Laravel-Docker')
            ->subject('Suscripto');
    });

    return sprintf('Gracias por enviar tu email, %s <a href="/">Inicio</a>', $email->email);
});
