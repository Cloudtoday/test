<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\DemoController;
// Route::get("/view",[DemoController::class,'display']);

Route::get("/form",[DemoController::class,'form']);
Route::post("/submit",[DemoController::class,'data_submit']);
Route::get("/alldata",[DemoController::class,'all_data']);
Route::get("/delete{del}",[DemoController::class,'data_delete']);
Route::get("/edit{ep}",[DemoController::class,'data_edit']);
Route::post("/update",[DemoController::class,'data_update']);
Route::get("/signin",[DemoController::class,'signin']);
Route::post("/login_user",[DemoController::class,'login_data']);
Route::get("/logout",[DemoController::class,'logout']);