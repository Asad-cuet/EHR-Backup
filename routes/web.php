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

Auth::routes([
    'register' => true, // Registration Routes...
  ]);
//Auth::routes();


// all auth can access
Route::middleware(['auth'])->group(function () {
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});


//only administration can access
Route::middleware(['auth','isAdministration'])->group(function () {
Route::get('/patients', [App\Http\Controllers\PatientController::class, 'patients'])->name('patients');
Route::get('/patient-form', [App\Http\Controllers\PatientController::class, 'patient_form'])->name('patient_form');
Route::post('/add-patient', [App\Http\Controllers\PatientController::class, 'add_patient'])->name('add_patient');
Route::get('/patient-view/{id}', [App\Http\Controllers\PatientController::class, 'patient_view'])->name('patient_view');
Route::get('/patient-status/{history_id}', [App\Http\Controllers\PatientController::class, 'patient_status'])->name('patient_status');
Route::post('/update-patient/{id}', [App\Http\Controllers\PatientController::class, 'patient_update'])->name('patient_update');
Route::get('/consultant/{id}', [App\Http\Controllers\PatientController::class, 'consultant'])->name('consultant');
Route::post('/consultant-to/{patient_id}', [App\Http\Controllers\PatientController::class, 'consultant_to'])->name('consultant_to');



Route::get('/doctors', [App\Http\Controllers\DoctorController::class, 'doctors'])->name('doctors');
Route::get('/doctor-form', [App\Http\Controllers\DoctorController::class, 'doctor_form'])->name('doctor_form');
Route::post('/add-doctor', [App\Http\Controllers\DoctorController::class, 'add_doctor'])->name('add_doctor');
Route::get('/doctor-view/{id}', [App\Http\Controllers\DoctorController::class, 'doctor_view'])->name('doctor_view');
Route::post('/update-doctor/{id}', [App\Http\Controllers\DoctorController::class, 'doctor_update'])->name('doctor_update');


Route::get('/departments', [App\Http\Controllers\DepartmentController::class, 'departments'])->name('departments');
Route::get('/department-form', [App\Http\Controllers\DepartmentController::class, 'department_form'])->name('department_form');
Route::post('/add-department', [App\Http\Controllers\DepartmentController::class, 'add_department'])->name('add_department');


Route::get('/tests', [App\Http\Controllers\TestController::class, 'tests'])->name('tests');
Route::get('/test-form', [App\Http\Controllers\TestController::class, 'test_form'])->name('test_form');
Route::post('/add-test', [App\Http\Controllers\TestController::class, 'add_test'])->name('add_test');

});

//only doctor can access
Route::middleware(['auth','isDoctor'])->group(function () {
Route::get('/consultations', [App\Http\Controllers\ConsultationController::class, 'consultations'])->name('consultations');
Route::get('/consultation-status/{id}', [App\Http\Controllers\ConsultationController::class, 'consultation_status'])->name('consultation_status');
Route::get('/problem/{consultation_id}', [App\Http\Controllers\ConsultationController::class, 'problem'])->name('problem');
Route::post('/submit-problem/{consultation_id}', [App\Http\Controllers\ConsultationController::class, 'submit_problem'])->name('submit_problem');
Route::get('/prescribe/{consultation_id}', [App\Http\Controllers\ConsultationController::class, 'prescribe'])->name('prescribe');
Route::post('/submit-prescribe/{consultation_id}', [App\Http\Controllers\ConsultationController::class, 'submit_prescribe'])->name('submit_prescribe');


Route::get('/exam/{consultation_id}', [App\Http\Controllers\ConsultationController::class, 'exam'])->name('exam');
Route::post('/submit-exam/{consultation_id}', [App\Http\Controllers\ConsultationController::class, 'submit_exam'])->name('submit_exam');


Route::get('/lab-resend/{exam_id?}/{consultaion_id?}', [App\Http\Controllers\ConsultationController::class,'lab_resend'])->name('lab_resend');


Route::get('/consultations-others', [App\Http\Controllers\OthersConsultationController::class, 'consultations_others'])->name('consultations_others');
Route::post('/doctor-comment/{exam_id?}/{consultation_id?}', [App\Http\Controllers\CommentController::class, 'doctor_comment'])->name('doctor_comment');
Route::get('/commented-doctor-view/{doctor_id?}', [App\Http\Controllers\CommentController::class, 'doctor_view'])->name('doctor_view');

});

//only lab tecknician can access
Route::middleware(['auth','isLab_tecknician'])->group(function () {
Route::get('/lab', [App\Http\Controllers\LabController::class, 'lab'])->name('lab');
Route::get('/lab-view/{consultation_id}', [App\Http\Controllers\LabController::class,'lab_view'])->name('lab_view');
Route::get('/lab-clear/{consultation_id}', [App\Http\Controllers\LabController::class,'lab_clear'])->name('lab_clear');
Route::post('/lab-comment/{exam_id}', [App\Http\Controllers\LabController::class,'lab_comment'])->name('lab_comment');
Route::post('/lab-update/{exam_id?}', [App\Http\Controllers\LabController::class, 'lab_update'])->name('lab_update');
Route::get('/lab-delete/{exam_id?}/{consultation_id}/{test_id}', [App\Http\Controllers\LabController::class, 'lab_delete'])->name('lab_delete');
Route::post('/submit-report/{consultation_id}', [App\Http\Controllers\LabController::class, 'submit_report'])->name('submit_report');

});