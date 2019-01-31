<?php

Route::get('/login/', 'UserController@login');
Route::post('login', array('uses' => 'UserController@doLogin'));
Route::get("password/reset/{token}", 'UserController@newPassword');
Route::post("password/reset/{token}", 'UserController@newPassword');
Route::get("password/lost/{token?}", 'UserController@lostPassword');
Route::post("password/lost/{token?}", 'UserController@lostPassword');

Route::group(array("prefix" => "activate"), function () {
    Route::get("validate/{username}", 'UserController@validateUsername');
    Route::get("{id}", 'UserController@activation');
    Route::post("{id}", 'UserController@doActivation');
});

Route::group(array('middleware' => 'auth'), function () {
    Route::get('/', 'UserController@dashboard');
    Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

    Route::group(['prefix' => '/'], function () {
        Route::get('stock', 'StockController@index');
        Route::get('parents', 'ParentsController@index');
        Route::get('notification', 'MessageController@index');
        Route::get('child', 'ChildController@index');
        Route::get('student', 'StudentController@index');
        Route::get('organization', 'OrganizationController@index');
        Route::get('owner', 'OwnerController@index');
        Route::get('subject', 'SubjectController@index');
        Route::get('branch', 'BranchController@index');
        Route::get('staff', 'StaffController@index');
        Route::get('package', 'PackageController@index');
        Route::get('teacher', 'TeacherController@index');

    });

    Route::group(['prefix' => 'json'], function () {
        Route::get('stock', 'StockController@grid');
        Route::get('parents', 'ParentsController@grid');
        Route::get('child', 'ChildController@grid');
        Route::get('student', 'StudentController@grid');
        Route::get('organization', 'OrganizationController@grid');
        Route::get('owner', 'OwnerController@grid');
        Route::get('subject', 'SubjectController@grid');
        Route::get('branch', 'BranchController@grid');
        Route::get('staff', 'StaffController@grid');
        Route::get('package', 'PackageController@grid');
        Route::get('teacher', 'TeacherController@grid');

    });

    Route::group(['prefix' => 'create'], function () {
        //Route::get('stock', 'StockController@create');
        Route::get('parents', 'ParentsController@create');
        Route::get('child', 'ChildController@create');
        Route::get('student', 'StudentController@create');
        Route::get('organization', 'OrganizationController@create');
        Route::get('owner', 'OwnerController@create');
        //Route::get('subject', 'SubjectController@create');
        //Route::get('branch', 'BranchController@create');
        Route::get('staff', 'StaffController@create');
        Route::get('package', 'PackageController@create');
        //Route::get('teacher', 'TeacherController@create');
    });

    Route::group(['prefix' => 'store'], function () {
        //Route::get('stock', 'StockController@store');
        Route::get('parents', 'ParentsController@store');
        Route::get('child', 'ChildController@store');
        Route::get('student', 'StudentController@store');
        Route::post('organization', 'OrganizationController@store');
        Route::post('owner', 'OwnerController@store');
        Route::post('branch', 'BranchController@store');
        //Route::get('subject', 'SubjectController@store');
        //Route::get('branch', 'BranchController@store');
        Route::post('staff', 'StaffController@store');
        Route::get('package', 'PackageController@store');
        //Route::get('teacher', 'TeacherController@store');
    });

    Route::group(['prefix' => 'show'], function () {
        Route::get('staff/{id}', 'StaffController@show');
        Route::get('owner/{id}', 'OwnerController@show');
        Route::get('organization/{id}', 'OrganizationController@show');
        Route::get('student/{id}', 'StudentController@show');
        Route::get('branch/{id}', 'BranchController@show');
        
    });


    Route::group(['prefix' => 'edit'], function () {
        Route::get('stock', 'StockController@edit');
        Route::get('parents', 'ParentsController@edit');
        //Route::get('child', 'ChildController@edit');
        Route::get('student/{id}', 'StudentController@edit');
        Route::get('organization/{id}', 'OrganizationController@edit');
        Route::get('owner/{id}', 'OwnerController@edit');
        Route::get('subject', 'SubjectController@edit');
        Route::get('branch/{id}', 'BranchController@edit');
        Route::get('staff/{id}', 'StaffController@edit');
        Route::get('package', 'PackageController@edit');
        Route::get('teacher', 'TeacherController@edit');
    });

    Route::group(['prefix' => 'update'], function () {
        Route::get('stock', 'StockController@update');
        Route::get('parents', 'ParentsController@update');
        //Route::get('child', 'ChildController@update');
        Route::get('student', 'StudentController@update');
        Route::post('organization/{id}', 'OrganizationController@update');
        Route::post('owner/{id}', 'OwnerController@update');
        Route::get('subject', 'SubjectController@update');
        Route::post('branch/{id}', 'BranchController@update');
        Route::post('staff/{id}', 'StaffController@update');
        Route::get('package', 'PackageController@update');
        Route::get('teacher', 'TeacherController@update');
    });

    Route::group(['prefix' => 'delete'], function () {
        Route::delete('organization/{id}', 'OrganizationController@destroy');
        Route::delete('owner/{id}', 'OwnerController@destroy');
        Route::delete('student/{id}', 'StudentController@destroy');
        Route::delete('branch/{id}', 'BranchController@destroy');
    });



// Super Admin
    Route::get('dashboard1', function () {
        return view('super_admin.dashboard');
    });

    //Route::resource('organization', 'OrganizationController');
    //Route::get('datatables/organization', 'OrganizationController@OrganizationDataTable');
    Route::post('organization/upload', 'OrganizationController@upload');

    //Route::resource('owner', 'OwnerController');
    //Route::get('datatables/owner', 'OwnerController@OwnerDataTable');
    Route::post('upload/owner', 'OwnerController@upload');

    Route::get('config', function () {
        return view('super_admin.configuration');
    });

// Clerk

    Route::get('dashboard', function () {
        return view('clerk.dashboard');
    });
    Route::get('tambah_pelajar', function () {
        return view('clerk.new_student');
    });
    Route::get('daftar_penjaga', function () {
        return view('clerk\reg_parent');
    });
    Route::resource('pelajar', 'StudentController');
    Route::get('datatables/pelajar', 'StudentController@StudentDataTable');

    Route::get('help', function () {
        return view('clerk.help');
    });

//Teacher

    Route::get('dashboard', function () {
        return view('teacher.dashboard');
    });

    //Route::resource('student_list', 'TeacherController');
   //Route::get('datatables/student', 'TeacherController@TeacherDataTable');

    //Route::resource('show_details', 'TeacherController');

    //Route::resource('show_grade', 'GradeController');
    //Route::get('datatables/grade/{id}', 'GradeController@GradeDataTable');

    Route::resource('message', 'MessageController');
    Route::get('datatables/message', 'MessageController@MessageDataTable');

    Route::get('help', function () {
        return view('teacher\help');
    });


// Owner
    Route::get('dashboard2', function () {
        return view('owner.dashboard');
    });
    //Route::resource('branch', 'BranchController');
    //Route::get('datatables/branch', 'BranchController@BranchDataTable');

    //Route::resource('staff', 'StaffController');
   // Route::get('datatables/staff', 'StaffController@StaffDataTable');
   // Route::post('upload/staff', 'StaffController@upload');

    Route::resource('package', 'PackageController');
    Route::get('datatables/package', 'PackageController@PackageDataTable');

    Route::resource('subject', 'SubjectController');
    Route::get('datatables/subject', 'SubjectController@SubjectDataTable');

    Route::get('configuration', function () {
        return view('owner.configuration');
    });

// Parents
    Route::resource('child', 'ChildController');
    Route::get('datatables/child', 'ChildController@ChildDataTable');

    Route::get('noti', function () {
        return view('parents.index_noti');
    });
});

Route::get('logout', 'UserController@logout');