<?php

use App\Http\Controllers\AddressController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;

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
    return view('site.home');
})->name('site.home');

Route::get('/formLogin', function() {
    return view('admin.formLogin');
})->name('formLogin');

Route::get('/politicaPrivacidade', function() {
    return view('pages.politicaPrivacidade');
})->name('politcs');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/perfil', 'AuthController@dashboard')->name('perfil');



Route::get('/perfil/login', 'AuthController@showLoginForm')->name('perfil.login');
Route::get('/perfil/logout', 'AuthController@logout')->name('perfil.logout');
Route::post('/admin/login/do', 'AuthController@login')->name('admin.login.do');
Route::get('/atualizar', 'AuthController@atualizar')->name('atualizarPerfil');
Route::post('/atualizar-perfil', 'AuthController@profileUpdate')->name('profile.update')->middleware('auth');

Route::post('/adicionar-endereco', 'AddressController@attAddress')->name('attAddress')->middleware('auth');
Route::put('/atualizar-endereco', 'AddressController@update')->name('updateAddress')->middleware('auth');

Route::post('/atualizar-curso', 'CoursesController@addCourse')->name('addCourse')->middleware('auth');

Route::post('/attSenha', 'AuthController@attSenha')->name('attSenha')->middleware('auth');

Route::post('/adicionar-experiencia', 'ExpController@addExp')->name('addExp')->middleware('auth');

Route::post('/adicionar-tecnologia', 'TecnologyController@addTecnology')->name('addTecnology')->middleware('auth');
Route::post('/updateTecnology', 'DadosController@update')->name('updateTecnology')->middleware('auth');

Route::post('/attContato', 'ContactController@attContato')->name('attContato')->middleware('auth');

Route::post('/idiomas', 'IdiomaController@addIdioma')->name('addIdiomas')->middleware('auth');

/*Route::get('login/facebook', 'SocialiteController@redirectToProvider')->name('registerFacebook');
Route::get('login/facebook/callback', 'SocialiteController@handleProviderCallback');*/

Route::get('login/{provider}', 'SocialiteController@redirect');
Route::get('login/{provider}/callback','SocialiteController@Callback');

Route::get('list', 'Freelas@list')->name('list');

Route::get('address', function () {
    return view('dashboard');
});

Auth::routes();
Auth::routes(['verify' => true]);

Route::get('/delete/tecnology/{id}', 'TecnologyController@delete')->name('deleteTecnology');
Route::get('/delete/experiencia/{id}', 'ExpController@delete')->name('deleteExp');
Route::get('/delete/course/{id}', 'CoursesController@delete')->name('deleteCourse');
Route::get('/delete/idioma/{id}', 'IdiomaController@delete')->name('deleteIdioma');
Route::get('/delete/contact/{id}', 'ContactController@delete')->name('deleteContact');
Route::get('/delete/address/{id}', 'AddressController@delete')->name('deleteAddress');

Route::get('/edit/address/{id}', 'AddressController@edit')->name('addressEdit');