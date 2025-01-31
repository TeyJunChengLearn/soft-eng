<?php

use App\Http\Middleware\Admin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SelectRoleController;
use App\Http\Controllers\InterfaceUseController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminViewFeedbackController;
use App\Http\Controllers\AdminSystemSettingController;
use App\Http\Controllers\MedicalStaffSaveIDController;
use App\Http\Controllers\AdminManageUserEditController;
use App\Http\Controllers\AdminManageUserListController;
use App\Http\Controllers\AdminManageUserViewController;
use App\Http\Controllers\ManagerCatRecordAddController;
use App\Http\Controllers\CaretakerJoinManagerController;
use App\Http\Controllers\ManagerCatRecordEditController;
use App\Http\Controllers\ManagerCatRecordListController;
use App\Http\Controllers\ManagerCatRecordViewController;
use App\Http\Controllers\ManagerSupplyRequestController;
use App\Http\Controllers\ManagerViewAnalyticsController;
use App\Http\Controllers\MedicalStaffJoinGroupController;
use App\Http\Controllers\ManagerCatRecordDeleteController;
use App\Http\Controllers\CaretakerCatActivityAddController;
use App\Http\Controllers\ManagerVerificationListController;
use App\Http\Controllers\AdminActivityHistoryListController;
use App\Http\Controllers\AdminActivityHistoryViewController;
use App\Http\Controllers\CaretakerAdoptionsDeleteController;
use App\Http\Controllers\MedicalStaffTreatmentAddController;
use App\Http\Controllers\CaretakerAdoptionsCatListController;
use App\Http\Controllers\ManagerCatActivityCatListController;
use App\Http\Controllers\ManagerManageSanctuaryAddController;
use App\Http\Controllers\MedicalStaffTreatmentListController;
use App\Http\Controllers\CaretakerSanctuaryTaskListController;
use App\Http\Controllers\CaretakerSanctuaryTaskViewController;
use App\Http\Controllers\ManagerCaretakerRecordListController;
use App\Http\Controllers\ManagerCaretakerRecordViewController;
use App\Http\Controllers\ManagerManageSanctuaryEditController;
use App\Http\Controllers\ManagerManageSanctuaryListController;
use App\Http\Controllers\MedicalStaffAppointmentAddController;
use App\Http\Controllers\MedicalStaffMedicalCareAddController;
use App\Http\Controllers\CaretakerCatActivityCatListController;
use App\Http\Controllers\CaretakerRequestSuppliesAddController;
use App\Http\Controllers\ManagerVerificationApprovalController;
use App\Http\Controllers\MedicalStaffAppointmentListController;
use App\Http\Controllers\MedicalStaffHealthRecordAddController;
use App\Http\Controllers\MedicalStaffMedicalCareListController;
use App\Http\Controllers\CaretakerAdoptionsAddCatListController;
use App\Http\Controllers\CaretakerRequestSuppliesListController;
use App\Http\Controllers\ManagerCaretakerRecordRemoveController;
use App\Http\Controllers\ManagerManageSanctuaryRemoveController;
use App\Http\Controllers\MedicalStaffTreatmentCatListController;
use App\Http\Controllers\ManagerCatActivitySummaryListController;
use App\Http\Controllers\ManagerCatRecordSanctuaryListController;
use App\Http\Controllers\MedicalStaffAppointmentRemoveController;
use App\Http\Controllers\MedicalStaffAppointmentCatListController;
use App\Http\Controllers\MedicalStaffMedicalCareCatListController;
use App\Http\Controllers\CaretakerAdoptionsSanctuaryListController;
use App\Http\Controllers\CaretakerCatActivitySummaryListController;
use App\Http\Controllers\ManagerCatActivitySanctuaryListController;
use App\Http\Controllers\MedicalStaffHealthRecordCatListController;
use App\Http\Controllers\ManagerCatRecordAddSanctuaryListController;
use App\Http\Controllers\MedicalStaffTreatmentSummaryListController;
use App\Http\Controllers\CaretakerCatActivitySanctuaryListController;
use App\Http\Controllers\CaretakerAdoptionsAddSanctuaryListController;
use App\Http\Controllers\CaretakerSanctuaryTaskSanctuaryAddController;
use App\Http\Controllers\MedicalStaffMedicalCareSummaryListController;
use App\Http\Controllers\MedicalStaffTreatmentSanctuaryListController;
use App\Http\Controllers\CaretakerSanctuaryTaskSanctuaryListController;
use App\Http\Controllers\MedicalStaffHealthRecordSummaryListController;
use App\Http\Controllers\MedicalStaffAppointmentSanctuaryListController;
use App\Http\Controllers\MedicalStaffMedicalCareSanctuaryListController;
use App\Http\Controllers\CaretakerRequestSuppliesSanctuaryListController;
use App\Http\Controllers\MedicalStaffHealthRecordSanctuaryListController;

Route::get('/design', [InterfaceUseController::class,'index']);

Route::middleware('nonuser')->group(function () {
    Route::get('/', [LoginController::class,'index'])->name('landing.index');
    Route::post('/login', [LoginController::class,'login'])->name('login.post');



    Route::get('/register',[RegisterController::class,'index'])->name('register.index');
    Route::post('/register',[RegisterController::class,'register'])->name('register.post');
    //forgot password and reset password
    Route::get("/forgotPassword",[ResetPasswordController::class,"forgotPasswordIndex"])->name('forgotPassword.index');
    Route::get("/password/reset/{token}",[ResetPasswordController::class,"resetPasswordIndex"])->name('resetPassword.index');
    Route::post("password/reset",[ResetPasswordController::class,"resetPassword"])->name('resetPassword.post');
    Route::post("/forgotPassword",[ResetPasswordController::class,"sendResetLinkEmail"])->name("forgotPassword.post");
});

Route::middleware('user')->group(function () {


    //logout
    Route::get('/logout', [LogoutController::class,'logout'])->name('logout.get');
    // add feedback
    Route::post("/feedback/add",[FeedbackController::class,'add'])->name('feedback.add');

    Route::middleware('noRole')->group(function () {
        Route::get('/selectRole',[SelectRoleController::class,'index'])->name('selectRole.index');
        Route::get('/selectRole/manager',[SelectRoleController::class,'manager'])->name('selectRole.manager');
        Route::get('/selectRole/medicalStaff',[SelectRoleController::class,'medicalStaff'])->name('selectRole.medicalStaff');
        Route::get('/selectRole/caretaker',[SelectRoleController::class,'caretaker'])->name('selectRole.caretaker');
    });
    Route::middleware('medicalStaffOnly')->group(function () {
        //enter vet id
        Route::get('/selectRole/medicalStaff/setVetID',[MedicalStaffSaveIDController::class,'index'])->name('medicalStaff.saveID.index');
        Route::post('/selectRole/medicalStaff/setVetID',[MedicalStaffSaveIDController::class,'saveID'])->name('medicalStaff.saveID.post');
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
        Route::get("/medicalStaff/feedback",[FeedbackController::class,'medicalStaffIndex'])->name('medicalStaff.feedback');
    });

    Route::middleware('caretakerOnly')->group(function () {
        //caretaker
        // cat activity
        Route::get('/caretaker/catActivity/sanctuaryList',[CaretakerCatActivitySanctuaryListController::class,'index'])->name('caretaker.catActivity.sanctuaryList');
        Route::get('/caretaker/catActivity/catList/{sanctuaryID}',[CaretakerCatActivityCatListController::class,'index'])->name('caretaker.catActivity.catList');
        Route::get('/caretaker/catActivity/summaryList/{catID}',[CaretakerCatActivitySummaryListController::class,'index'])->name('caretaker.catActivity.summaryList');
        Route::get('/caretaker/catActivity/add/{catID}',[CaretakerCatActivityAddController::class,'index'])->name('caretaker.catActivity.add.index');
        Route::post('/caretaker/catActivity/add/{catID}',[CaretakerCatActivityAddController::class,'add'])->name('caretaker.catActivity.add.post');
        //sanctuary task
        Route::get('/caretaker/sanctuaryTask/sanctuaryList',[CaretakerSanctuaryTaskSanctuaryListController::class,'index'])->name('caretaker.sanctuaryTask.sanctuaryList');
        Route::get('/caretaker/sanctuaryTask/list/{sanctuaryID}',[CaretakerSanctuaryTaskListController::class,'index'])->name('caretaker.sanctuaryTask.list');
        Route::get('/caretaker/sanctuaryTask/{sanctuaryID}/add',[CaretakerSanctuaryTaskSanctuaryAddController::class,'index'])->name('caretaker.sanctuaryTask.add.index');
        Route::post('/caretaker/sanctuaryTask/{sanctuaryID}/add',[CaretakerSanctuaryTaskSanctuaryAddController::class,'add'])->name('caretaker.sanctuaryTask.add.post');
        Route::get('/caretaker/sanctuaryTask/{sanctuaryID}/view/{sanctuaryTaskID}',[CaretakerSanctuaryTaskViewController::class,'index'])->name('caretaker.sanctuaryTask.view');

        //adoptions
        Route::get('/caretaker/adoptions/sanctuaryList',[CaretakerAdoptionsSanctuaryListController::class,'index'])->name('caretaker.adoptions.sanctuaryList');
        Route::get('/caretaker/adoptions/catList/{sanctuaryID}',[CaretakerAdoptionsCatListController::class,'index'])->name('caretaker.adoptions.catList');
        Route::get('/caretaker/adoptions/catList/remove/{sanctuaryID}/{catID}',[CaretakerAdoptionsDeleteController::class,'delete'])->name('caretaker.adoptions.remove');
        Route::get('/caretaker/adoptions/SanctuaryList/add/sanctuaryList',[CaretakerAdoptionsAddSanctuaryListController::class,'index'])->name('caretaker.adoptions.add.sanctuaryList');
        Route::get('/caretaker/adoptions/SanctuaryList/add/catList/{sanctuaryID}',[CaretakerAdoptionsAddCatListController::class,'index'])->name('caretaker.adoptions.add.catList');
        Route::get('/caretaker/adoptions/catList/add/{sanctuaryID}/{catID}',[CaretakerAdoptionsAddCatListController::class,'add'])->name('caretaker.adoptions.add');
        // request supplies
        Route::get('/caretaker/requestSupply/list',[CaretakerRequestSuppliesListController::class,'index'])->name('caretaker.requestSupply.list');
        Route::get("/caretaker/requestSupply/sanctuaryList",[CaretakerRequestSuppliesSanctuaryListController::class,"index"])->name("caretaker.requestSupply.sanctuaryList");
        Route::get("/caretaker/requestSupply/add/{sanctuaryID}",[CaretakerRequestSuppliesAddController::class,"index"])->name("caretaker.requestSupply.add.index");
        Route::post("/caretaker/requestSupply/add/{sanctuaryID}",[CaretakerRequestSuppliesAddController::class,"add"])->name("caretaker.requestSupply.add.post");
        // join manager
        Route::get('/caretaker/joinManager/',[CaretakerJoinManagerController::class,'index'])->name('caretaker.joinManager.index');
        Route::post('/caretaker/joinManager/',[CaretakerJoinManagerController::class,'join'])->name('caretaker.joinManager.post');

        Route::get("/caretaker/feedback",[FeedbackController::class,'caretakerIndex'])->name("caretaker.feedback");
    });
    Route::middleware('managerOnly')->group(function () {
        //manager
        // cat record
        Route::get("/manager/catRecord/sanctuaryList",[ManagerCatRecordSanctuaryListController::class,"index"])->name("manager.catRecord.sanctuaryList");
        Route::get("/manager/catRecord/List/{sanctuaryID}",[ManagerCatRecordListController::class,"index"])->name("manager.catRecord.List");
        Route::get("/manager/catRecord/add/sanctuaryList",[ManagerCatRecordAddSanctuaryListController::class,"index"])->name("manager.catRecord.sanctuaryList.add");
        Route::get("/manager/catRecord/add/{sanctuaryID}",[ManagerCatRecordAddController::class,"index"])->name("manager.catRecord.add.index");
        Route::post("/manager/catRecord/add/{sanctuaryID}",[ManagerCatRecordAddController::class,"add"])->name("manager.catRecord.add.post");
        Route::get("/manager/catRecord/view/{catID}/{sanctuaryID}",[ManagerCatRecordViewController::class,"index"])->name("manager.catRecord.view");
        Route::get("/manager/catRecord/edit/{catID}/{sanctuaryID}",[ManagerCatRecordEditController::class,"index"])->name("manager.catRecord.edit.index");
        Route::post("/manager/catRecord/edit/{catID}/{sanctuaryID}",[ManagerCatRecordEditController::class,"edit"])->name("manager.catRecord.edit.post");
        Route::get("/manager/catRecord/delete/{catID}",[ManagerCatRecordDeleteController::class,"delete"])->name("manager.catRecord.delete");

        //caretaker record
        Route::get('/manager/caretaker/List',[ManagerCaretakerRecordListController::class,'index'])->name("manager.caretaker.list");
        Route::get('/manager/caretaker/view/{caretakerID}',[ManagerCaretakerRecordViewController::class,'index'])->name('manager.caretaker.view');
        Route::get('/manager/caretaker/remove/{caretakerID}',[ManagerCaretakerRecordRemoveController::class,'remove'])->name('manager.caretaker.remove');

        //verification
        Route::get('/manager/verification/list',[ManagerVerificationListController::class,'index'])->name('manager.verification.list');
        Route::get('/manager/verification/approve/{verificationID}',[ManagerVerificationApprovalController::class,'approve'])->name('manager.verification.approve');
        Route::get('/manager/verification/decline/{verificationID}',[ManagerVerificationApprovalController::class,'decline'])->name('manager.verification.decline');

        // manage sanctuary

        Route::get('/manager/manageSanctuary/list',[ManagerManageSanctuaryListController::class,'index'])->name('manager.manageSanctuary.list');
        Route::get('/manager/manageSanctuary/edit/{sanctuaryID}',[ManagerManageSanctuaryEditController::class,'index'])->name('manager.manageSanctuary.edit.index');
        Route::post('/manager/manageSanctuary/edit/{sanctuaryID}',[ManagerManageSanctuaryEditController::class,'edit'])->name('manager.manageSanctuary.edit.post');
        Route::get('/manager/manageSanctuary/add',[ManagerManageSanctuaryAddController::class,'index'])->name('manager.manageSanctuary.add.index');
        Route::post('/manager/manageSanctuary/add',[ManagerManageSanctuaryAddController::class,'add'])->name('manager.manageSanctuary.add.post');


        //cat activity
        Route::get('/manager/catActivity/sanctuaryList',[ManagerCatActivitySanctuaryListController::class,'index'])->name('manager.catActivity.sanctuaryList');
        Route::get('/manager/catActivity/catList/{sanctuaryID}',[ManagerCatActivityCatListController::class,'index'])->name('manager.catActivity.catList');
        Route::get('/manager/catActivity/summaryList/{catID}',[ManagerCatActivitySummaryListController::class,'index'])->name('manager.catActivity.summaryList');


        // supplies request

        Route::get("/manager/supplyRequest/list",[ManagerSupplyRequestController::class,"index"])->name("manager.supplyRequest.list");

        //view analytics

        Route::get("/manager/analytics",[ManagerViewAnalyticsController::class,"index"])->name("manager.viewAnalytics");

        Route::get("/manager/feedback",[FeedbackController::class,'managerIndex'])->name("manager.feedback");
    });
    Route::middleware('adminOnly')->group(function () {
        // Admin
        //dashboard
        Route::get("/admin/dashboard",[AdminDashboardController::class,"index"])->name("admin.dashboard");
        // manage users
        Route::get("/admin/manageUsers/list",[AdminManageUserListController::class,"index"])->name("admin.manageUser.list");
        Route::get('/admin/manageUsers/view/{userID}',[AdminManageUserViewController::class,'index'])->name("admin.manageUser.view");
        Route::get("/admin/manageUsers/edit/{userID}",[AdminManageUserEditController::class,"index"])->name("admin.manageUser.edit.index");
        Route::post("/admin/manageUsers/edit/{userID}",[AdminManageUserEditController::class,"edit"])->name("admin.manageUser.edit.post");
        //view feedback
        Route::get("/admin/viewFeedback",[AdminViewFeedbackController::class,'index'])->name("admin.viewFeedback");

        //admin activity history
        Route::get("/admin/activityHistory/list",[AdminActivityHistoryListController::class,'index'])->name("admin.activityHistory.list");
        Route::get("/admin/activityHistory/view/{adminActivityHistoryID}",[AdminActivityHistoryViewController::class,'index'])->name('admin.activityHistory.view');

        //system settings

        Route::get("/admin/settings",[AdminSystemSettingController::class,'index'])->name("admin.settings.index");
        Route::post("/admin/settings",[AdminSystemSettingController::class,'update'])->name("admin.settings.post");
        Route::get("/admin/feedback",[FeedbackController::class,'adminIndex'])->name("admin.feedback");
    });



});







