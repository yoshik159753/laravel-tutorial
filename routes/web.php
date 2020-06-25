<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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

Route::get('/', function () {
    $links = \App\Link::all();

    return view('welcome', ['links' => $links]);
    // 別な書き方
    // with()
    // return view('welcome')->with('links', $links);
    // dynamic method to name the variable
    // return view('welcome')->withLinks($links);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/submit', function () {
    return view('submit');
});

Route::post('/submit', function (Request $request) {
    $data = $request->validate([
        'title' => 'required|max:255',
        'url' => 'required|url|max:255',
        'description' => 'required|max:255',
    ]);

    // tap ヘルパーを使うとモデルインスタンスが返るため save を呼ぶことができる
    $link = tap(new App\Link($data))->save();
    // tap ヘルパーを使わないケースは下記。
    // $link = new \App\Link($data);
    // $link->save();

    return redirect('/');
});
