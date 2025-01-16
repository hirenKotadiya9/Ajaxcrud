<?php
use App\Http\Controllers\CountryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;

 // Route::get('/', function () {
   // return view('welcome');
 //})->name('home');
Route::get('/',[RegisterController::class, 'index'])->name('home');
Route::get('/about',[RegisterController::class, 'about'])->name('about');
Route::get('/login', [RegisterController::class, 'showLoginForm'])->name('login');
Route::post('/login', [RegisterController::class, 'login']);
Route::post('/logout', [RegisterController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.store');

Route::get('/users', [RegisterController::class, 'fetchUsers'])->name('users');
Route::get('/users/edit/{id}', [RegisterController::class, 'edit'])->name('users.edit');
Route::post('/users/update/{id}', [RegisterController::class, 'update'])->name('users.update');
Route::delete('/users/{id}', [RegisterController::class, 'destroy'])->name('users.destroy');


Route::get('countries', [CountryController::class, 'index'])->name('countries.index');
Route::post('countries', [CountryController::class, 'store'])->name('countries.store');
//Route::get('states', [StateController::class, 'index'])->name('states.index');
//Route::post('states', [StateController::class, 'store'])->name('states.store');

Route::get('city',[CountryController::class,'index'])->name('city');


/*
Route::get('/', function () {
    return view('template/home',array("pg"=>1));
  });

  Route::get('/about', function () {
     return view('template/about',array("pg"=>2));
  });

  Route::get('/contact', function () {
    return view('template/contact',array("pg"=>3));
  });

  Route::get('/service', function () {
    return view('template/service',array("pg"=>3));
  });

  Route::get('/blog', function () {
    return view('template/blog',array("pg"=>4));
  });
*/
/*
Route::get('/', function () {
    return view('form/index',array("pg"=>1));
  });

  Route::get('/404', function () {
     return view('form/404',array("pg"=>2));
  });

  Route::get('/login', function () {
    return view('form/login',array("pg"=>3));
  });

  Route::get('/tables', function () {
    return view('form/tables',array("pg"=>3));
  });

  Route::get('/register', function () {
    return view('form/register',array("pg"=>4));
  });

  Route::get('/utilities-border', function () {
    return view('form/utilities-border',array("pg"=>5));
 });

 Route::get('/utilities-color', function () {
   return view('form/utilities-color',array("pg"=>6));
 });

 Route::get('/utilities-other', function () {
   return view('form/utilities-other',array("pg"=>7));
 });

 Route::get('/utilities-animation', function () {
   return view('form/utilities-animation',array("pg"=>8));
 });

 Route::get('/blank', function () {
    return view('form/blank',array("pg"=>9));
  });

  Route::get('/buttons', function () {
    return view('form/buttons',array("pg"=>10));
  });

  Route::get('/cards', function () {
    return view('form/cards',array("pg"=>11));
 });

 Route::get('/charts', function () {
   return view('form/charts',array("pg"=>12));
 });

 Route::get('/forgot-password', function () {
   return view('form/forgot-password',array("pg"=>13));
 });

 Route::get('/utilities', function () {
    return view('form/utilities',array("pg"=>14));
  });
*/
