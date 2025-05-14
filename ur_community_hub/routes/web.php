<?php

use App\Http\Controllers\Community\CommunityController;
use App\Http\Controllers\Community\EventController;
use App\Http\Controllers\Community_Leader\CommunityLeaderDashboard;
use App\Http\Controllers\Community_Leader\TermsAndConditionController;
use App\Http\Controllers\Community_staff\CommunityRequestController;
use App\Http\Controllers\Community_Staff\CommunityStaffDashboard;
use App\Http\Controllers\dashboard\DashboardController;
use App\Http\Controllers\User\Community_Leader\MemberRequestControlller;
use App\Http\Controllers\User\GuestUserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::get('/', function () {
    return view('welcome');
})->name('home');
Route::get('/events', [EventController::class, 'list'])->name('event-list');
Route::get('/events/{id}', [EventController::class, 'show'])->name('events.show');
Route::get('/Community/{id}', [CommunityController::class, 'show'])->name('community.show');
Route::get('/TermAndCondition', [TermsAndConditionController::class, 'TermAndCondition'])->name('TermAndCondition');

Route::post('/MemberRequest', [MemberRequestControlller::class, 'store'])->name('member-request');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::prefix('Community_Leader')->group(function () {
        Route::get('/dashboard', [CommunityLeaderDashboard::class, 'index'])->name('community-leader.dashboard');
        Route::get('/Community-Profile', [CommunityController::class, 'index'])->name('community-profile');
        Route::get('/Event-Profile', [EventController::class, 'index'])->name('event-profile');
        Route::get('/MemberRequest/index', [MemberRequestControlller::class, 'index'])->name('member-request-index');
        Route::delete('/community-leader/member-requests/{id}', [MemberRequestControlller::class, 'destroy'])->name('member-requests.destroy');
        Route::get('/member-requests/{id}', [MemberRequestControlller::class, 'show'])->name('member-requests.show');

        Route::post('/member-requests/{id}/approve', [MemberRequestControlller::class, 'approve'])->name('member-requests.approve');
        Route::post('/member-requests/{id}/reject', [MemberRequestControlller::class, 'reject'])->name('member-requests.reject');
        Route::delete('/community-requests/{id}', [CommunityRequestController::class, 'destroy'])->name('community-requests.destroy');
    });

    Route::prefix('community-leader')
        ->name('member-requests.')
        ->middleware(['auth'])
        ->group(function () {
            Route::get('/requests', [MemberRequestControlller::class, 'index'])->name('index');
            Route::get('/requests/{id}', [MemberRequestControlller::class, 'show'])->name('show');
            Route::post('/requests', [MemberRequestControlller::class, 'store'])->name('store');
            Route::post('/requests/{id}/approve', [MemberRequestControlller::class, 'approve'])->name('approve');
            Route::post('/requests/{id}/reject', [MemberRequestControlller::class, 'reject'])->name('reject');
            Route::delete('/requests/{id}', [MemberRequestControlller::class, 'destroy'])->name('destroy');
        });
    Route::prefix('Community_Staff')->group(function () {
        Route::get('/dashboard', [CommunityStaffDashboard::class, 'index'])->name('community-staff.dashboard');
        Route::get('/TermsAndCondition', [TermsAndConditionController::class, 'index'])->name('TermsAndCondition');

        Route::post('/terms-and-conditions/store', [TermsAndConditionController::class, 'store'])->name('terms.store');
        Route::put('/terms-and-conditions/update/{id}', [TermsAndConditionController::class, 'update'])->name('terms.update');

        Route::get('/communities', [TermsAndConditionController::class, 'Community'])->name('communities.index');
        Route::put('/communities/{id}/update-status', [TermsAndConditionController::class, 'updateStatus'])->name('communities.update-status');

        Route::get('/community-requests', [CommunityRequestController::class, 'index'])->name('community-requests.index');
        Route::get('/community-requests/{id}', [CommunityRequestController::class, 'show'])->name('community-requests.show');
        Route::post('/community-requests/{id}/approve', [CommunityRequestController::class, 'approve'])->name('community-requests.approve');
        Route::post('/community-requests/{id}/reject', [CommunityRequestController::class, 'reject'])->name('community-requests.reject');
        // Route::delete('/community-staff/community-requests/{id}', [CommunityRequestController::class, 'destroy'])->name('community-requests.destroy');
        // Route::get('/community-staff/dashboard', [DashboardController::class, 'index'])->name('community-staff.dashboard');

        Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');
    });

    Route::prefix('User')->group(function () {
        Route::get('/dashboard', [GuestUserController::class, 'index'])->name('guestuser.dashboard');
        Route::post('/community/register/request', [GuestUserController::class, 'registerRequest'])->name('community.register.request');
    });
});
