<?php

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
    return redirect('login');
});

//Gestion des Département
Route::get('/Departement', [App\Http\Controllers\AdminController::class, 'Departement'])->name('Departement');
Route::post('/Add_Departement', [App\Http\Controllers\AdminController::class, 'Add_Departement'])->name('Add_Departement');
Route::get('/delete_departement/{id}', [App\Http\Controllers\AdminController::class, 'delete_departement'])->name('delete_departement');
Route::post('/Update_Departement/{id}', [App\Http\Controllers\AdminController::class, 'Update_Departement'])->name('Update_Departement');

//Gestion des Poste
Route::get('/Poste', [App\Http\Controllers\AdminController::class, 'Poste'])->name('Poste');
Route::post('/Add_Poste', [App\Http\Controllers\AdminController::class, 'Add_Poste'])->name('Add_Poste');
Route::get('/delete_poste/{id}', [App\Http\Controllers\AdminController::class, 'delete_poste'])->name('delete_poste');
Route::post('/Update_Poste/{id}', [App\Http\Controllers\AdminController::class, 'Update_Poste'])->name('Update_Poste');

//Gestion des Utilisateurs
Route::get('/Utilisateurs', [App\Http\Controllers\AdminController::class, 'Utilisateurs'])->name('Utilisateurs');
Route::post('/Add_User', [App\Http\Controllers\AdminController::class, 'Add_User'])->name('Add_User');
Route::get('/delete_user/{id}', [App\Http\Controllers\AdminController::class, 'delete_user'])->name('delete_user');
Route::post('/Update_User/{id}', [App\Http\Controllers\AdminController::class, 'Update_User'])->name('Update_User');


//Types de courriers
Route::get('/TypeCourrier', [App\Http\Controllers\CourrierController::class, 'TypeCourrier'])->name('TypeCourrier');
Route::post('/Add_Courrier', [App\Http\Controllers\CourrierController::class, 'Add_Courrier'])->name('Add_Courrier');
Route::get('/delete_typecourrier/{id}', [App\Http\Controllers\CourrierController::class, 'delete_typecourrier'])->name('delete_typecourrier');
Route::post('/Update_Courrier/{id}', [App\Http\Controllers\CourrierController::class, 'Update_Courrier'])->name('Update_Courrier');

//Voies de transmission
Route::get('/VoieTransmission', [App\Http\Controllers\CourrierController::class, 'VoieTransmission'])->name('VoieTransmission');
Route::post('/Add_VoieTransmission', [App\Http\Controllers\CourrierController::class, 'Add_VoieTransmission'])->name('Add_VoieTransmission');
Route::post('/Update_VoieTransmission/{id}', [App\Http\Controllers\CourrierController::class, 'Update_VoieTransmission'])->name('Update_VoieTransmission');
Route::get('/delete_voiet/{id}', [App\Http\Controllers\CourrierController::class, 'delete_voiet'])->name('delete_voiet');

//gestion des courriers entrants
Route::get('/Courriers_Groupes', [App\Http\Controllers\CourrierController::class, 'Courriers_Groupes'])->name('Courriers_Groupes');
Route::get('/Courriers_Entrants', [App\Http\Controllers\CourrierController::class, 'Courriers_Entrants'])->name('Courriers_Entrants');
Route::post('/Add_Courrier', [App\Http\Controllers\CourrierController::class, 'AddCourrier'])->name('Add_Courrier');
Route::get('/Bordereau_Entrants', [App\Http\Controllers\CourrierController::class, 'Bordereau_Entrants'])->name('Bordereau_Entrants');
Route::post('/Add_Bordereau', [App\Http\Controllers\CourrierController::class, 'Add_Bordereau'])->name('Add_Bordereau');
Route::get('/delete_courrier/{id}', [App\Http\Controllers\CourrierController::class, 'delete_courrier'])->name('delete_courrier');
Route::get('/details_courrier/{id}', [App\Http\Controllers\CourrierController::class, 'details_courrier'])->name('details_courrier');
Route::get('/Validation_Transmission/{id}', [App\Http\Controllers\CourrierController::class, 'Validation_Transmission'])->name('Validation_Transmission');
Route::get('/MesCourriers', [App\Http\Controllers\CourrierController::class, 'MesCourriers'])->name('MesCourriers');

Route::get('/MailBox', [App\Http\Controllers\CourrierController::class, 'MailBox'])->name('MailBox');
Route::post('/SendMail', [App\Http\Controllers\CourrierController::class, 'SendMail'])->name('SendMail');
Route::get('/SendBox', [App\Http\Controllers\CourrierController::class, 'SendBox'])->name('SendBox');
Route::get('/SendCourrier', [App\Http\Controllers\CourrierController::class, 'SendCourrier'])->name('SendCourrier');


Auth::routes();
Route::post('/Modification_User', [App\Http\Controllers\AdminController::class, 'Modification_User'])->name('Modification_User');
Route::post('/PasswordUpdate', [App\Http\Controllers\AdminController::class, 'PasswordUpdate'])->name('PasswordUpdate');
Route::get('/MonProfil', [App\Http\Controllers\AdminController::class, 'MonProfil'])->name('MonProfil');
Route::get('/TableauBord', [App\Http\Controllers\HomeController::class, 'TableauBord'])->name('TableauBord');
Route::get('/Deconnexion', [App\Http\Controllers\HomeController::class, 'Deconnexion'])->name('Deconnexion');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/TableauBord', [App\Http\Controllers\AdminController::class, 'TableauBord'])->name('TableauBord');

