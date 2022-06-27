<?php

use App\Http\Controllers\panel\site_settings\AboutController;
use App\Http\Controllers\panel\site_settings\ContactController;
use App\Http\Controllers\panel\site_settings\MenuController;
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
    return view('welcome');
});



Route::group(['prefix' => 'hakkimizda'], function (){
    Route::get('/', [AboutController::class, 'list'])->name('about.list');
    Route::get('/olustur', [AboutController::class, 'create'])->name('about.create');
    Route::get('/guncelle', [AboutController::class,'edit'])->name('about.edit');
    Route::post('/olusturHakkimizda', [AboutController::class, 'createAbout'])->name('about.createAbout');
    Route::get('/fetchModalAbout', [AboutController::class, 'fetchModalAbout'])->name('about.fetchModalAbout');
    Route::post('/guncelleAbout', [AboutController::class, 'updateAbout'])->name('about.updateAbout');
});

Route::group(['prefix' => 'iletisim'], function (){
    Route::get('/', [ContactController::class, 'list'])->name('contact.list');
    Route::get('/olustur', [ContactController::class, 'create'])->name('contact.create');
    Route::get('/guncelle', [ContactController::class, 'edit'])->name('contact.edit');
    Route::post('/guncelleIletisim' , [ContactController::class, 'updateContact'])->name('contact.updateContact');

});

Route::group(['prefix' => 'menu'], function (){
   Route::get('/' , [MenuController::class, 'list'])->name('menu.list');
   Route::get('/olustur' , [MenuController::class, 'create'])->name('menu.create');
   Route::get('/guncelle' , [MenuController::class, 'edit'])->name('menu.edit');
   Route::post('/menuOlustur' , [MenuController::class, 'createMenu'])->name('menu.createMenu');
   //Route::get('/fetchModalMenu' , [MenuController::class , 'fetchModalMenu'])->name('menu.fetchModalMenu');
   //Route::post('/menuGuncelle' , [MenuController::class, 'updateMenu'])->name('menu.updateMenu');
   //Route::post('/menuSil' , [MenuController::class, 'remove'])->name('menu.remove');

});
