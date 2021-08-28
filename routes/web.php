<?php

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::post('users/media', 'UsersController@storeMedia')->name('users.storeMedia');
    Route::post('users/ckmedia', 'UsersController@storeCKEditorImages')->name('users.storeCKEditorImages');
    Route::resource('users', 'UsersController');

    // Audit Logs
    Route::resource('audit-logs', 'AuditLogsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

    // User Alerts
    Route::delete('user-alerts/destroy', 'UserAlertsController@massDestroy')->name('user-alerts.massDestroy');
    Route::get('user-alerts/read', 'UserAlertsController@read');
    Route::resource('user-alerts', 'UserAlertsController', ['except' => ['edit', 'update']]);

    // Families
    Route::delete('families/destroy', 'FamiliesController@massDestroy')->name('families.massDestroy');
    Route::resource('families', 'FamiliesController');

    // User Documents
    Route::delete('user-documents/destroy', 'UserDocumentsController@massDestroy')->name('user-documents.massDestroy');
    Route::post('user-documents/media', 'UserDocumentsController@storeMedia')->name('user-documents.storeMedia');
    Route::post('user-documents/ckmedia', 'UserDocumentsController@storeCKEditorImages')->name('user-documents.storeCKEditorImages');
    Route::resource('user-documents', 'UserDocumentsController');

    // Contracts
    Route::delete('contracts/destroy', 'ContractsController@massDestroy')->name('contracts.massDestroy');
    Route::resource('contracts', 'ContractsController');

    // Vacation Requests
    Route::delete('vacation-requests/destroy', 'VacationRequestsController@massDestroy')->name('vacation-requests.massDestroy');
    Route::resource('vacation-requests', 'VacationRequestsController');

    // Facilities
    Route::delete('facilities/destroy', 'FacilitiesController@massDestroy')->name('facilities.massDestroy');
    Route::post('facilities/media', 'FacilitiesController@storeMedia')->name('facilities.storeMedia');
    Route::post('facilities/ckmedia', 'FacilitiesController@storeCKEditorImages')->name('facilities.storeCKEditorImages');
    Route::resource('facilities', 'FacilitiesController');

    // Cities
    Route::delete('cities/destroy', 'CitiesController@massDestroy')->name('cities.massDestroy');
    Route::resource('cities', 'CitiesController');

    // Branches
    Route::delete('branches/destroy', 'BranchesController@massDestroy')->name('branches.massDestroy');
    Route::post('branches/media', 'BranchesController@storeMedia')->name('branches.storeMedia');
    Route::post('branches/ckmedia', 'BranchesController@storeCKEditorImages')->name('branches.storeCKEditorImages');
    Route::resource('branches', 'BranchesController');

    // Vacations Types
    Route::delete('vacations-types/destroy', 'VacationsTypesController@massDestroy')->name('vacations-types.massDestroy');
    Route::resource('vacations-types', 'VacationsTypesController');

    // Attendance
    Route::resource('attendances', 'AttendanceController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // Rewards
    Route::delete('rewards/destroy', 'RewardsController@massDestroy')->name('rewards.massDestroy');
    Route::resource('rewards', 'RewardsController');

    Route::get('system-calendar', 'SystemCalendarController@index')->name('systemCalendar');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});
