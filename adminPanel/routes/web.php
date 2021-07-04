<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\adminAuthController;
use \App\Http\Controllers\AdminTournamentController;
use \App\Http\Controllers\AdminUsersController;
use \App\Http\Controllers\Controller;
use \App\Http\Controllers\AdminParticipationController;

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


Route::get('/',[adminAuthController::class,'login'])->name('/')->middleware('AlredyLoggedIn');
Route::post('check',[adminAuthController::class,'check'])->name('auth.check');
Route::get('profile',[adminAuthController::class,'profile'])->name('profile');
Route::get('logout',[adminAuthController::class,'logout'])->name('logout')->middleware('isLogged');
Route::get('tournaments',[AdminTournamentController::class,'tournamantlist'])->name('tournaments')->middleware('isLogged');
Route::post('newTournament/store' , [AdminTournamentController::class,'store'])->name('create.store');
Route::get('newTournament' , [AdminTournamentController::class,'create'])->name('create');
Route::get('updateTournament/{id}' , [AdminTournamentController::class,'update'])->name('update');
Route::post('updateTournament/store/{id}' , [AdminTournamentController::class,'updateStore'])->name('update.store');
Route::get('delete/{id}' , [AdminTournamentController::class,'destroy'])->name('destroy');
Route::get('users' , [AdminUsersController::class,'userList'])->name('users');
Route::get('participation' , [AdminParticipationController::class,'participationList'])->name('participation');
Route::get('destroyUser/{id}' , [AdminUsersController::class,'destroyUser'])->name('destroyUser');
Route::get('destroyParticipation/{id}' , [AdminParticipationController::class,'destroyParticipation'])->name('destroyParticipation');
//flutter api
Route::get('selectTour/{id}' , [Controller::class,'SelectAllTournaments']);
Route::get('updateprofile/{id}/{nom}/{prenom}/{newpassword}/{oldpassword}' , [Controller::class,'updateprofile']);
Route::get('selectParticipations/{id}' , [Controller::class,'SelectParticipation']);
Route::get('addParticipations/{utilisateur_id}/{tournoi_id}' , [Controller::class,'addparticipation']);
Route::get('userLogin/{email}/{password}' , [Controller::class,'usersLogin']);
Route::get('userSign/{name}/{lastname}/{email}/{password}' , [Controller::class,'usersSign']);
Route::get('deleteParticipation/{id}' , [AdminTournamentController::class,'destroyT']);

