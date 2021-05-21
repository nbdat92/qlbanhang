<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Photocontroller;
use App\Http\Controllers\TinTuccontroller;
use App\Http\Controllers\SanPhamcontroller;
use App\Http\Controllers\Teachmang;
use App\Http\Controllers\Techmangcontroller;

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

route::resource('photos', Photocontroller::class); // phương thức này chỉ phù hợp cho CRUD
// tin tức
route::prefix('techmang') -> group(function() {
    route::get('/', [Techmangcontroller::class,'index']);  
   
});

route::prefix('tin-tuc') -> group(function() {
    route::get('/', [TinTuccontroller::class,'index']);  
    route::get('/{id}', [TinTuccontroller::class,'show']) -> where('id', '[0-9]+');
    route::get('edit/{id}', [TinTuccontroller::class,'edit'])-> where('id', '[0-9]+'); // hiển thị chỉnh sửa
});

// sản phẩm
route::prefix('san-pham') -> group(function() {
    route::get('/', [SanPhamcontroller::class,'index']);  
    route::get('chi-tiet={id}', [SanPhamcontroller::class,'show']);  
    route::get('chi-tiet/{id}/edit', [SanPhamcontroller::class,'edit']);  
    route::get('them', [SanPhamcontroller::class,'create']);  
    route::get('them', [SanPhamcontroller::class, 'store']);
    route::delete('xoa',[SanPhamcontroller::class],'destroy');
});
