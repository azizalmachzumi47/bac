<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Image_activityController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SuperiorityController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Vision_missionController;
use App\Http\Controllers\Web_bacController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\UserMiddleware;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;

// use Illuminate\Support\Facades\Mail;

Route::get('/', [Web_bacController::class, 'index'])->name('home');
Route::get('/detail_service', [Web_bacController::class, 'detail_service'])->name('detail_service');
Route::get('/detail_product', [Web_bacController::class, 'detail_product'])->name('detail_product');


Route::redirect('/login', '/auth');
Route::get('/login', function () {
    return redirect()->route('auth')->with('error', 'Maaf, Anda harus login terlebih dahulu!!!');
});

Route::middleware(['guest'])->group(function () {
    Route::get('auth', [AuthController::class, 'auth'])->name('auth');

    Route::post('login', [AuthController::class, 'login'])->name('login');
    Route::post('register', [AuthController::class, 'register'])->name('register');
});

Route::get('admin', [AdminController::class, 'index'])
    ->name('admin')
    ->middleware('role:1');

Route::get('user', [UserController::class, 'index'])
    ->name('user')
    ->middleware('role:2');


Route::middleware(['auth', AdminMiddleware::class])->group(function () {
    // Admin routes
    Route::get('admin', [AdminController::class, 'index'])->name('admin.index');
    Route::put('admin/edituser/{id}', [AdminController::class, 'edituser'])->name('admin.edituser');
    Route::delete('admin/{id}', [AdminController::class, 'destroy'])->name('admin.destroy');

    Route::get('admin/role', [AdminController::class, 'role'])->name('admin.role');
    Route::post('admin/addrole', [AdminController::class, 'addrole'])->name('admin.addrole');
    Route::get('admin/role_edit/{id}', [AdminController::class, 'role_edit'])->name('admin.role_edit');
    Route::post('admin/role_update/{id}', [AdminController::class, 'role_update'])->name('admin.role_update');
    Route::get('admin/role_delete/{id}', [AdminController::class, 'role_delete'])->name('admin.role_delete');
    Route::get('admin/roleaccess/{id}', [AdminController::class, 'roleAccess'])->name('admin.roleaccess');
    Route::post('admin/changeAccess', [AdminController::class, 'changeAccess'])->name('admin.changeAccess');

    //Menu
    Route::get('menu', [MenuController::class, 'index'])->name('menu.index');
    Route::post('menu/addmenu', [MenuController::class, 'addmenu'])->name('menu.addmenu');
    Route::get('menu/editmenu/{id}', [MenuController::class, 'editmenu'])->name('menu.editmenu');
    Route::post('menu/editmenu_action/{id}', [MenuController::class, 'editmenu_action'])->name('menu.editmenu_action');
    Route::get('menu/delete/{id}', [MenuController::class, 'delete'])->name('menu.delete');

    //SubMenu
    Route::get('menu/submenu', [MenuController::class, 'submenu'])->name('menu.submenu');
    Route::post('menu/submenu', [MenuController::class, 'addSubMenu'])->name('menu.addSubMenu');
    Route::put('menu/editSubMenu/{id}', [MenuController::class, 'editSubMenu'])->name('menu.editSubMenu');
    Route::delete('menu/deleteSubMenu/{id}', [MenuController::class, 'deleteSubMenu'])->name('menu.deleteSubMenu');

    //About Company Profile
    Route::get('company_profile', [AboutController::class, 'index'])->name('company_profile.index');
    Route::post('company_profile/addabout', [AboutController::class, 'addabout'])->name('company_profile.addabout');
    Route::post('company_profile/editabout_action/{id}', [AboutController::class, 'editabout_action'])->name('company_profile.editabout_action');
    Route::get('company_profile/deleteabout/{id}', [AboutController::class, 'deleteabout'])->name('company_profile.deleteabout');

    //Vision & Mission
    Route::get('company_profile/vision_mission', [Vision_missionController::class, 'vision_mission'])->name('company_profile.vision_mission');
    Route::post('company_profile/addvision_mission', [Vision_missionController::class, 'addvision_mission'])->name('company_profile.addvision_mission');
    Route::post('company_profile/editvision_mission_action/{id}', [Vision_missionController::class, 'editvision_mission_action'])->name('company_profile.editvision_mission_action');
    Route::get('company_profile/deletevision_mission/{id}', [Vision_missionController::class, 'deletevision_mission'])->name('company_profile.deletevision_mission');

    //Service
    Route::get('service', [ServiceController::class, 'index'])->name('service.index');
    Route::post('service/addservice', [ServiceController::class, 'addservice'])->name('service.addservice');
    Route::post('service/editservice_action/{id}', [ServiceController::class, 'editservice_action'])->name('service.editservice_action');
    Route::get('service/deleteservice/{id}', [ServiceController::class, 'deleteservice'])->name('service.deleteservice');

    //Image Activity
    Route::get('service/image_activity', [Image_activityController::class, 'image_activity'])->name('service.image_activity');
    Route::post('service/addimage', [Image_activityController::class, 'addimage'])->name('service.addimage');
    Route::get('service/viewimages/{id_service}', [Image_activityController::class, 'viewImages'])->name('service.viewimages');
    Route::delete('service/deleteimageactivity/{id_imageactivity}', [Image_activityController::class, 'deleteimageactivity'])->name('service.deleteimageactivity');

    //Superiority
    Route::get('freecool_bac', [SuperiorityController::class, 'index'])->name('freecool_bac.index');
    Route::post('freecool_bac/addsuperiority', [SuperiorityController::class, 'addsuperiority'])->name('freecool_bac.addsuperiority');
    Route::post('freecool_bac/editsuperiority_action/{id_superiority}', [SuperiorityController::class, 'editsuperiority_action'])->name('freecool_bac.editsuperiority_action');
    Route::get('freecool_bac/deletesuperiority/{id_superiority}', [SuperiorityController::class, 'deletesuperiority'])->name('freecool_bac.deletesuperiority');

    //Client
    Route::get('freecool_bac/client', [ClientController::class, 'client'])->name('freecool_bac.client');
    Route::post('freecool_bac/addclient', [ClientController::class, 'addclient'])->name('freecool_bac.addclient');
    Route::post('freecool_bac/editclient_action/{id_client}', [ClientController::class, 'editclient_action'])->name('freecool_bac.editclient_action');
    Route::get('freecool_bac/deleteclient/{id_client}', [ClientController::class, 'deleteclient'])->name('freecool_bac.deleteclient');

    //Product
    Route::get('product', [ProductController::class, 'index'])->name('product.index');
    Route::post('product/addproduct', [ProductController::class, 'addproduct'])->name('product.addproduct');
    Route::post('product/editproduct_action/{id_product}', [ProductController::class, 'editproduct_action'])->name('product.editproduct_action');
    Route::get('product/deleteproduct/{id_product}', [ProductController::class, 'deleteproduct'])->name('product.deleteproduct');
});

Route::middleware(['auth', UserMiddleware::class])->group(function () {
    // User routes
    Route::get('user', [UserController::class, 'index'])->name('user.index');
});

Route::get('dashboard', [DashboardController::class, 'index'])
    ->middleware('auth')
    ->name('dashboard.index');


// Route::middleware(['auth'])->group(function(){

// });



Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('email/verify/{id}/{hash}', [AuthController::class, 'verify'])->name('verification.verify');

Route::get('/auth/google/redirect', function () {
    return Socialite::driver('google')->redirect();
})->name('google');

Route::get('/auth/google/callback', function () {
    // dd(Socialite::driver('google'));
    $googleUser = Socialite::driver('google')->user();
    // dd($googleUser);
    $user = User::where('email', $googleUser->getEmail())->first();

    if ($user) {
        if (empty($user->image) || !str_starts_with($user->image, 'images/')) {
            $user->image = $googleUser->getAvatar();
        }

        if (is_null($user->email_verified_at)) {
            $user->email_verified_at = now();
        }

        $user->save();
    } else {
        $user = User::create([
            'name' => $googleUser->getName(),
            'email' => $googleUser->getEmail(),
            'email_verified_at' => now(),
            'password' => Hash::make($googleUser->password),
            'image' => $googleUser->getAvatar(),
            'google_id' => $googleUser->getId()
        ]);
    }

    Auth::login($user);
    return redirect()->route('user.index');
});

// Route::get('/test-email', function () {
//     Mail::raw('Ini adalah tes pengiriman email dari Laravel', function ($message) {
//         $message->to('azizalmachzumi21@gmail.com')
//                 ->subject('Tes Pengiriman Email dari Laravel');
//     });

//     return 'Cek email untuk memastikan pengiriman berhasil!';
// });
