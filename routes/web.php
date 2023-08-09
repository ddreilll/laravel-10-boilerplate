<?php

use App\Models\Configuration;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('home')->with('status', session('status'));
    }

    return redirect()->route('home');
});

Auth::routes(['register' => false]);

$defaultMiddlewares = ['auth', 'user.status'];

Route::group(['middleware' => $defaultMiddlewares, 'namespace' => 'Admin'], function () {
    Route::get('deactivated', 'UsersController@showDeactivated')->name('users.deactivated');
});

if (Schema::hasTable((new Configuration())->table)) {
    foreach (Configuration::select('key', 'value')->whereIn('key', ['panel.2fa', 'panel.email_verified'])->get() as $config) {
        switch ($config->key) {
            case 'panel.2fa':
                if ($config->value == "on") {
                    array_push($defaultMiddlewares, '2fa');
                }
                break;

            case 'panel.email_verified':
                if ($config->value == "on") {
                    array_push($defaultMiddlewares, 'verified');
                }
                break;
        }
    }
}

Route::group(['middleware' => $defaultMiddlewares], function () {

    Route::group(['namespace' => 'Admin'], function () {
        Route::get('/dashboard', 'HomeController@index')->name('home');

        // Roles
        Route::resource('roles', 'RolesController');

        // User Accounts
        Route::patch('users/{user}/status', 'UsersController@updateStatus')->name('users.updateStatus');
        Route::put('users/config/{configKey}', 'UsersController@updateConfig')->name('users.updateConfig');
        Route::resource('users', 'UsersController');

        // User Alerts
        Route::get('user-alerts/read', 'UserAlertsController@read');
        Route::resource('user-alerts', 'UserAlertsController', ['except' => ['edit', 'update']]);

        Route::get('global-search', 'GlobalSearchController@search')->name('globalSearch');
        Route::get('messenger', 'MessengerController@index')->name('messenger.index');
        Route::get('messenger/create', 'MessengerController@createTopic')->name('messenger.createTopic');
        Route::post('messenger', 'MessengerController@storeTopic')->name('messenger.storeTopic');
        Route::get('messenger/inbox', 'MessengerController@showInbox')->name('messenger.showInbox');
        Route::get('messenger/outbox', 'MessengerController@showOutbox')->name('messenger.showOutbox');
        Route::get('messenger/{topic}', 'MessengerController@showMessages')->name('messenger.showMessages');
        Route::delete('messenger/{topic}', 'MessengerController@destroyTopic')->name('messenger.destroyTopic');
        Route::post('messenger/{topic}/reply', 'MessengerController@replyToTopic')->name('messenger.reply');
        Route::get('messenger/{topic}/reply', 'MessengerController@showReply')->name('messenger.showReply');
    });

    Route::group(['prefix' => 'settings', 'as' => 'settings.'], function () {
        Route::resource('backups', 'BackupController');
        Route::get('backups/download/{file_name}', 'BackupController@download')->name('backups.export');


        Route::group(['namespace' => 'Admin'], function () {

            Route::get('/', function () {
                return view('admin.settings.index');
            });
        });
    });

    Route::group(['prefix' => 'my-profile', 'as' => 'my-profile.', 'namespace' => 'Auth'], function () {
        // Change password
        if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
            Route::get('edit', 'ChangePasswordController@edit')->name('edit');
            Route::post('edit', 'ChangePasswordController@update')->name('update');
            Route::post('/', 'ChangePasswordController@updateProfile')->name('updateProfile');
            Route::post('two-factor', 'ChangePasswordController@toggleTwoFactor')->name('toggleTwoFactor');
        }
    });

    Route::group(['namespace' => 'Auth'], function () {
        // Two Factor Authentication
        if (file_exists(app_path('Http/Controllers/Auth/TwoFactorController.php'))) {
            Route::get('two-factor', 'TwoFactorController@show')->name('twoFactor.show');
            Route::post('two-factor', 'TwoFactorController@check')->name('twoFactor.check');
            Route::get('two-factor/resend', 'TwoFactorController@resend')->name('twoFactor.resend');
        }
    });
});

Auth::routes();

Route::group(['middleware' => ['auth'], 'prefix' => 'email', 'as' => "verification."], function () {

    Route::get('/email/verify', function () {
        return view('auth.verify');
    })->name('notice');

    Route::get('/email/verify/{id}/{hash}', function (\Illuminate\Foundation\Auth\EmailVerificationRequest $request) {
        $request->fulfill();

        return redirect('/home')->with('verified', true);
    })->middleware(['signed'])->name('verify');

    Route::post('/email/verification-notification', function (\Illuminate\Http\Request $request) {
        $request->user()->sendEmailVerificationNotification();

        return back()->with('message', 'Verification link has been sent.');
    })->middleware(['throttle:6,1'])->name('send');

    Route::get('/email/verification-notification', function (\Illuminate\Http\Request $request) {
        return view('auth.verify');
    })->name('resend');
});
