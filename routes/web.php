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


// Route::resource('/kr/one3/pattern', 'One3PatternController');


DB::listen(function ($query){
    var_dump($query->sql);
});

Route::get('auth/login', function(){
    $credential = [
        'email' => 'john@example.com',
        'password' => 'password'
    ];

    if(!auth()->attempt($credential)){
        return '로그인 실패';
    }

    return redirect('protected');
});

Route::get('protected', ['middleware' => 'auth', function(){
    dump(session()->all());

    // if(!auth()->check()){
    //     return '누구세요?';
    // }

    return '어서오세요 ' . auth()->user()->name;
}]);

Route::get('auth/logout', function(){
    auth()->logout();
    return '로그아웃~~';
});

Route::resource('/articles', 'ArticlesController');

Route::get('/control', 'WelcomeController@index');

Route::get('/databind', function(){
        return view('welcome', [
            'name' => 'Foo',
            'greeting' => '안녕']);
});

Route::get('/err503', function(){
        return view('errors.503');
});

Route::get('/beforehome',[
    'as' => 'home',
    function(){
        return '이건 home 이다';
    }
]);

Route::get('/afterhome', function(){
    return redirect(route('home'));
});

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

Route::get('/home', 'HomeController@index');
