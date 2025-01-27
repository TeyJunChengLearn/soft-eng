<?php

use App\Http\Middleware\Admin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SelectRoleController;
use App\Http\Controllers\InterfaceUseController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\MedicalStaffSaveIDController;
use App\Http\Controllers\MedicalStaffJoinGroupController;
use App\Http\Controllers\CaretakerCatActivityAddController;
use App\Http\Controllers\MedicalStaffTreatmentAddController;
use App\Http\Controllers\MedicalStaffTreatmentListController;
use App\Http\Controllers\MedicalStaffAppointmentAddController;
use App\Http\Controllers\MedicalStaffMedicalCareAddController;
use App\Http\Controllers\CaretakerCatActivityCatListController;
use App\Http\Controllers\MedicalStaffAppointmentListController;
use App\Http\Controllers\MedicalStaffHealthRecordAddController;
use App\Http\Controllers\MedicalStaffMedicalCareListController;
use App\Http\Controllers\MedicalStaffTreatmentCatListController;
use App\Http\Controllers\MedicalStaffAppointmentRemoveController;
use App\Http\Controllers\MedicalStaffAppointmentCatListController;
use App\Http\Controllers\MedicalStaffMedicalCareCatListController;
use App\Http\Controllers\CaretakerCatActivitySummaryListController;
use App\Http\Controllers\MedicalStaffHealthRecordCatListController;
use App\Http\Controllers\MedicalStaffTreatmentSummaryListController;
use App\Http\Controllers\CaretakerCatActivitySanctuaryListController;
use App\Http\Controllers\MedicalStaffMedicalCareSummaryListController;
use App\Http\Controllers\MedicalStaffTreatmentSanctuaryListController;
use App\Http\Controllers\MedicalStaffHealthRecordSummaryListController;
use App\Http\Controllers\MedicalStaffAppointmentSanctuaryListController;
use App\Http\Controllers\MedicalStaffMedicalCareSanctuaryListController;
use App\Http\Controllers\MedicalStaffHealthRecordSanctuaryListController;

Route::get('/design', [InterfaceUseController::class,'index']);

Route::get('/', [LoginController::class,'index'])->name('landing.index');
Route::post('/login', [LoginController::class,'login'])->name('login.post');

Route::get('/logout', [LogoutController::class,'logout'])->name('logout.get');

Route::get('/register',[RegisterController::class,'index'])->name('register.index');
Route::post('/register',[RegisterController::class,'register'])->name('register.post');

// Route::middleware(['guest'])->group(function () {
//     Route::get('/', [LoginController::class,'index'])->name('landing.index');
//     Route::post('/login', [LoginController::class,'login'])->name('login.post');
//     Route::get('/register',[RegisterController::class,'index'])->name('register.index');
//     Route::post('/register',[RegisterController::class,'register'])->name('register.post');

// });


Route::get('/selectRole',[SelectRoleController::class,'index'])->name('selectRole.index');
Route::get('/selectRole/manager',[SelectRoleController::class,'manager'])->name('selectRole.manager');
Route::get('/selectRole/medicalStaff',[SelectRoleController::class,'medicalStaff'])->name('selectRole.medicalStaff');
Route::get('/selectRole/caretaker',[SelectRoleController::class,'caretaker'])->name('selectRole.caretaker');

Route::get('/selectRole/medicalStaff/setVetID',[MedicalStaffSaveIDController::class,'index'])->name('medicalStaff.saveID.index');
Route::post('/selectRole/medicalStaff/setVetID',[MedicalStaffSaveIDController::class,'saveID'])->name('medicalStaff.saveID.post');


// Route::middleware(['auth'])->group(function () {
//     Route::get('/selectRole',[SelectRoleController::class,'index'])->name('selectRole.index');
//     Route::get('/selectRole/manager',[SelectRoleController::class,'manager'])->name('selectRole.manager');
//     Route::get('/selectRole/medicalStaff',[SelectRoleController::class,'medicalStaff'])->name('selectRole.medicalStaff');
//     Route::get('/selectRole/caretaker',[SelectRoleController::class,'caretaker'])->name('selectRole.caretaker');
// });


//forgot password and reset password
Route::get("/forgotPassword",[ResetPasswordController::class,"forgotPasswordIndex"])->name('forgotPassword.index');
Route::get("/password/reset/{token}",[ResetPasswordController::class,"resetPasswordIndex"])->name('resetPassword.index');
Route::post("password/reset",[ResetPasswordController::class,"resetPassword"])->name('resetPassword.post');
Route::post("/forgotPassword",[ResetPasswordController::class,"sendResetLinkEmail"])->name("forgotPassword.post");


// medical staff
//health record
Route::get('/medicalStaff/healthRecord/sanctuaryList',[MedicalStaffHealthRecordSanctuaryListController::class,'index'])->name('medicalStaff.healthRecord.sanctuaryList');
Route::get('/medicalStaff/healthRecord/catList/{sanctuaryID}',[MedicalStaffHealthRecordCatListController::class,'index'])->name('medicalStaff.healthRecord.catList');
Route::get('/medicalStaff/healthRecord/summaryList/{catID}',[MedicalStaffHealthRecordSummaryListController::class,'index'])->name('medicalStaff.healthRecord.summaryList');
Route::get('/medicalStaff/healthRecord/summaryList/{catID}/add',[MedicalStaffHealthRecordAddController::class,'index'])->name('medicalStaff.healthRecord.add.index');
Route::post('/medicalStaff/healthRecord/summaryList/{catID}/add',[MedicalStaffHealthRecordAddController::class,'add'])->name('medicalStaff.healthRecord.add.post');
// treatment record
Route::get('/medicalStaff/treatment/sanctuaryList',[MedicalStaffTreatmentSanctuaryListController::class,'index'])->name('medicalStaff.treatment.sanctuaryList');
Route::get('/medicalStaff/Treatment/catList/{sanctuaryID}',[MedicalStaffTreatmentCatListController::class,'index'])->name('medicalStaff.treatment.catList');
Route::get('/medicalStaff/treatment/summaryList/{catID}',[MedicalStaffTreatmentSummaryListController::class,'index'])->name('medicalStaff.treatment.summaryList');
Route::get('/medicalStaff/treatment/list/{healthRecordID}',[MedicalStaffTreatmentListController::class,'index'])->name('medicalStaff.treatment.List');
Route::get('/medicalStaff/treatment/list/{healthRecordID}/add',[MedicalStaffTreatmentAddController::class,'index'])->name('medicalStaff.treatment.add.index');
Route::post('/medicalStaff/treatment/list/{healthRecordID}/add',[MedicalStaffTreatmentAddController::class,'add'])->name('medicalStaff.treatment.add.post');
//medicalCare record
Route::get('/medicalStaff/medicalCare/sanctuaryList',[MedicalStaffMedicalCareSanctuaryListController::class,'index'])->name('medicalStaff.medicalCare.sanctuaryList');
Route::get('/medicalStaff/medicalCare/catList/{sanctuaryID}',[MedicalStaffMedicalCareCatListController::class,'index'])->name('medicalStaff.medicalCare.catList');
Route::get('medicalStaff/medicalCare/summaryList/{catID}',[MedicalStaffMedicalCareSummaryListController::class,'index'])->name('medicalStaff.medicalCare.summaryList');
Route::get('/medicalStaff/medicalCare/list/{healthRecordID}',[MedicalStaffMedicalCareListController::class,'index'])->name('medicalStaff.medicalCare.List');
Route::get('/medicalStaff/medicalCare/list/{healthRecordID}/add',[MedicalStaffMedicalCareAddController::class,'index'])->name('medicalStaff.medicalCare.add.index');
Route::post('/medicalStaff/medicalCare/list/{healthRecordID}/add',[MedicalStaffMedicalCareAddController::class,'add'])->name('medicalStaff.medicalCare.add.post');
//appointment
Route::get('/medicalStaff/appointment',[MedicalStaffAppointmentListController::class,'index'])->name('medicalStaff.appointment.list');
Route::get('/medicalStaff/appointment/add/sanctuaryList',[MedicalStaffAppointmentSanctuaryListController::class,'index'])->name('medicalStaff.appointment.add.sanctuaryList');
Route::get('/medicalStaff/appointment/add/catList/{sanctuaryID}',[MedicalStaffAppointmentCatListController::class,'index'])->name('medicalStaff.appointment.add.catList');
Route::get('/medicalStaff/appointment/add/catList/{sanctuaryID}',[MedicalStaffAppointmentCatListController::class,'index'])->name('medicalStaff.appointment.add.catList');
Route::get('/medicalStaff/appointment/add/withCat/{catID}',[MedicalStaffAppointmentAddController::class,'index'])->name('medicalStaff.appointment.add.index');
Route::post('/medicalStaff/appointment/add/withCat/{catID}',[MedicalStaffAppointmentAddController::class,'add'])->name('medicalStaff.appointment.add.post');
Route::get('/medicalStaff/appointment/remove/{appointmentID}',[MedicalStaffAppointmentRemoveController::class,'remove'])->name('medicalStaff.appointment.remove');
// request join group
Route::get('/medicalStaff/join/group',[MedicalStaffJoinGroupController::class,'index'])->name('medicalstaff.joinGroup.index');
Route::post('/medicalStaff/join/group',[MedicalStaffJoinGroupController::class,'add'])->name('medicalstaff.joinGroup.post');

//caretaker
// cat activity
Route::get('/caretaker/catActivity/sanctuaryList',[CaretakerCatActivitySanctuaryListController::class,'index'])->name('caretaker.catActivity.sanctuaryList');
Route::get('/caretaker/catActivity/catList/{sanctuaryID}',[CaretakerCatActivityCatListController::class,'index'])->name('caretaker.catActivity.catList');
Route::get('/caretaker/catActivity/summaryList/{catID}',[CaretakerCatActivitySummaryListController::class,'index'])->name('caretaker.catActivity.summaryList');
Route::get('/caretaker/catActivity/add/{catID}',[CaretakerCatActivityAddController::class,'index'])->name('caretaker.catActivity.add.index');
Route::post('/caretaker/catActivity/add/{catID}',[CaretakerCatActivityAddController::class,'add'])->name('caretaker.catActivity.add.post');






