<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\LocationMasterController;
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
    return redirect()->route("login");
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('url-manager', [App\Http\Controllers\UrlManagerController::class, "index"]);
Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', App\Http\Controllers\RoleController::class);
    Route::resource('users', App\Http\Controllers\UserController::class);
    Route::resource('members', App\Http\Controllers\MemberController::class);
    Route::resource('products', App\Http\Controllers\ProductController::class);
    Route::resource('branch', App\Http\Controllers\BranchController::class);
    Route::resource('group', App\Http\Controllers\GroupController::class);
    Route::resource('dashboard', App\Http\Controllers\DashboardController::class);
    Route::resource('recyclebin', App\Http\Controllers\RecyclebinController::class);
    Route::resource('activity', App\Http\Controllers\ActivityController::class);
    Route::resource('location-master', App\Http\Controllers\LocationMasterController::class);
    Route::resource('company-profile', App\Http\Controllers\CompanyProfileController::class);
    Route::resource('system-setting', App\Http\Controllers\SystemSettingController::class);
    Route::resource('admin-setting', App\Http\Controllers\AdminController::class);
    Route::resource('department', App\Http\Controllers\DepartmentController::class);
    Route::resource('list-branch-group', App\Http\Controllers\ListBranchGroupController::class);
    Route::resource('loan-master', App\Http\Controllers\LoanMasterController::class);
    Route::post('store-state', [LocationMasterController::class,'store_state'])->name('store_user_state');
    Route::get('city-list/{stateid}', [LocationMasterController::class,'cityIndex'])->name('city_index');
    Route::post('store-city', [LocationMasterController::class,'cityStore'])->name('store_city');
    Route::get('area-list/{stateid}/{cityid}', [LocationMasterController::class,'areaList'])->name('area_list');
    Route::post('store-area', [LocationMasterController::class,'storeArea'])->name('store_area');
    
    Route::get('get-city-list/',[LocationMasterController::class,'getCityList']);
    Route::get('get-area-list/',[LocationMasterController::class,'getareaList']);
    Route::get('get-pincode/',[LocationMasterController::class,'getpincode']);


    Route::get('get-branch-group', [App\Http\Controllers\ListBranchGroupController::class, "GroupRelatedBranch"])
    ->name("branch.group.filter");



    Route::patch('systemupdate/{id}', [UserController::class, 'updateSystemSetting'])->name('users.updateSystemSetting');
    Route::get('users/member/{id}', [UserController::class, 'showMember'])->name('users.showMember');
    Route::get('member/edit/{id}', [UserController::class, 'editMember'])->name('users.editMember');
    Route::get('active-member', [UserController::class, 'activeMember'])->name('activeMember');
    Route::get('pending-member', [UserController::class, 'pendingMember'])->name('pendingMember');
    Route::get('deleted-member', [UserController::class, 'deletedMember'])->name('deletedMember');
    Route::get('staff', [UserController::class, 'staffMember'])->name('staffMember');
    Route::get('list-branch-group/users/{id}', [UserController::class, 'createMember'])->name('users.createMember');
    Route::put('/users/{user}/status', [UserController::class, 'updateStatus'])->name('users.updateStatus');
});
