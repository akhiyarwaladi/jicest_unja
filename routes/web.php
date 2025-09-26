<?php

use App\Mail\SendMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\ParticipantController;
use App\Http\Controllers\UploadAbstractController;
use App\Http\Controllers\UploadFulltextController;

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
    $pricing = \App\Models\Fee::getAllPricingTiers();
    return view('homepage.index', [
        'title' => 'Home',
        'pricing' => $pricing
    ]);
});


Route::get('/rundown-jicest2023', function () {
    return view('homepage.rundown', [
        'title' => 'Rundown Jicest 2023'
    ]);
});

Route::get('/registration-fee', function () {
    $pricing = \App\Models\Fee::getAllPricingTiers();
    return view('homepage.registration-fee', [
        'title' => 'Registration Fee',
        'pricing' => $pricing
    ]);
});

Route::get('/scientific-committe', function () {
    return view('homepage.scientific-committe', [
        'title' => 'Scientific Committee'
    ]);
});

Route::get('/steering-committe', function () {
    return view('homepage.steering-committe', [
        'title' => 'Steering Committee'
    ]);
});

Route::get('/organizing-committe', function () {
    return view('homepage.organizing-committe', [
        'title' => 'Organizing Committee'
    ]);
});

Route::get('/contact', function () {
    return view('homepage.contact', [
        'title' => 'Contact'
    ]);
});

Route::get('/field-trip', function () {
    return view('homepage.field-trip', [
        'title' => 'Field Trip'
    ]);
});

Route::get('/fgd-mbkm', function () {
    return view('homepage.fgd-mbkm', [
        'title' => 'FGD MBKM'
    ]);
});


Route::get('/fgd-akreditasi-internasional', function () {
    return view('homepage.fgd-akreditasi', [
        'title' => 'FGD Akreditasi Internasional'
    ]);
});

Route::get('/kongres-hki', function () {
    return view('homepage.kongres-hki', [
        'title' => 'Kongres HKI'
    ]);
});

Route::get('/forum-ketua-jurusan-kimia', function () {
    return view('homepage.forum-ketua', [
        'title' => 'Forum Ketua Jurusan Kimia'
    ]);
});

Route::get('/fgd-akreditasi-internasional', function () {
    return view('homepage.fgd-akreditasi', [
        'title' => 'FGD Akreditasi Internasional'
    ]);
});


Route::get('/international-scientific-poster', function () {
    return view('homepage.poster', [
        'title' => 'International Scientific Poster Competition'
    ]);
});

Route::get('/about-conference', function () {
    return view('homepage.about', [
        'title' => 'About'
    ]);
});

Route::get('/download-template-article', [DownloadController::class, 'downloadTemplate']);
Route::get('/download-abstract-template', [DownloadController::class,'downloadAbstract']);
Route::get('/download-paper-template', [DownloadController::class, 'downloadPaper']);
Route::get('/download-schedule-template', [DownloadController::class, 'downloadSchedule']);
Route::get('/download-guidelines-template', [DownloadController::class, 'downloadGuidelines']);


Route::get('/dashboard', function () {
    if (Auth::user()->role === 'administrator') {
        return view('administrator.dashboard', [
            'title' => 'Dashboard'
        ]);
    } else {
        return view('participant.dashboard', [
            'title' => 'Dashboard'
        ]);
    }
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    //PROFILE
    Route::get('/profile', function () {
        if (Auth::user()->role == 'administrator') {
            return abort(403);
        }
        return view('participant.profile', [
            'title' => 'My Profile'
        ]);
    });
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware(['auth', 'verified'])->group(function () {

    //ADMINISTRATOR
    Route::get('/registered-participant', [ParticipantController::class, 'index']);
    Route::get('/validation-hki-member', [ParticipantController::class, 'validateMember']);
    Route::get('/review-abstract', [UploadAbstractController::class, 'review']);
    Route::get('/payment-validation', [PaymentController::class, 'validation']);
    Route::get('/participant-have-paid', [PaymentController::class, 'participantPaid']);
    Route::get('/presenter-have-paid', [PaymentController::class, 'presenterPaid']);
    Route::get('/uploaded-paper', [UploadFulltextController::class, 'uploadedPaper']);

    //PARTICIPANT   
    Route::get('/payment', [PaymentController::class, 'payment']);
    Route::get('/abstrak', [ParticipantController::class, 'abstract']);
    Route::get('/upload-fulltext', [UploadFulltextController::class, 'upload']);
    Route::get('/change-password', function () {
        if (auth::user()->role == 'administrator') {
            return view('administrator.change-password', [
                'title' => 'Change Password'
            ]);
        } else {
            return view('participant.change-password', [
                'title' => 'Change Password'
            ]);
        }
    });
});

Route::get('/test', function () {
    return view('test', [
        'title' => 'Test'
    ]);
});

Route::get('/repair-12345', [UploadAbstractController::class, 'repair']);

require __DIR__ . '/auth.php';