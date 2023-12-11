<?php


/**
 *
 * ------------------------------------
 * Backoffice Routes
 * ------------------------------------
 *
 */
Route::group(['middleware' => "backoffice.guest", 'as' => "auth." ], function(){
    Route::get('login',['as' => "login", 'uses' => "LoginController@login"]);
    Route::post('login',['uses' => "LoginController@authenticate"]);

    Route::get('sign-up',['as' => "sign_up", 'uses' => "RegisterController@signUp"]);
    Route::post('sign-up',['uses' => "RegisterController@register"]);

    Route::get('verify',['as' => "verify", 'uses' => "LoginController@verify"]);
    Route::post('verify',['uses' => "LoginController@check"]);
});

Route::group(['middleware' => ["backoffice.auth"/*, "backoffice.superUserOnly"*/]], function(){
    Route::get('logout',['as' => "logout",'uses' => "LoginController@logout"]);
    Route::get('/',['as' => "index",'uses' => "DashboardController@index"]);

    
    Route::group(['as' => "account.", 'prefix' => "account"], function(){
        Route::get('/',['as' => "index",'uses' => "AccountController@index"]);
        Route::post('/',['uses' => "AccountController@update"]);
        Route::post('update-password',['as' => "update_password",'uses' => "AccountController@updatePassword"]);
        Route::get('send-verification',['as' => "send_verification",'uses' => "AccountController@sendVerification"]);
        Route::get('verify-account/{username}',['as' => "verify_account",'uses' => "AccountController@verifyAccount"]);
    });

    // Route::group(['as' => "loan.", 'prefix' => "loan", 'middleware' => ["backoffice.superUserOnly"]], function(){
    //     Route::get('/',['as' => "index",'uses' => "LoanController@index"]);
    //     Route::post('/',['as' => "create",'uses' => "LoanController@create"]);
    //     Route::post('edit',['as' => "edit",'uses' => "LoanController@edit"]);
    //     Route::post('update',['as' => "update",'uses' => "LoanController@update"]);
    //     Route::any('delete/{id}',['as' => "delete",'uses' => "LoanController@delete"]);
    // });

    Route::group(['as' => "loan_type.", 'prefix' => "loan-type", 'middleware' => ["backoffice.superUserOnly"]], function(){
        Route::get('/',['as' => "index",'uses' => "LoanTypeController@index"]);
        Route::post('/',['as' => "create",'uses' => "LoanTypeController@create"]);
        Route::post('edit',['as' => "edit",'uses' => "LoanTypeController@edit"]);
        Route::post('update',['as' => "update",'uses' => "LoanTypeController@update"]);
        Route::any('delete/{id}',['as' => "delete",'uses' => "LoanTypeController@delete"]);
    });

    Route::group(['as' => "user.", 'prefix' => "user", 'middleware' => ["backoffice.superUserOnly"]], function(){
        Route::get('/',['as' => "index",'uses' => "UserController@index"]);
        Route::post('/',['as' => "create",'uses' => "UserController@create"]);
        Route::post('edit',['as' => "edit",'uses' => "UserController@edit"]);
        Route::get('view',['as' => "view",'uses' => "UserController@view"]);
        Route::post('update',['as' => "update",'uses' => "UserController@update"]);
        Route::any('delete/{id}',['as' => "delete",'uses' => "UserController@delete"]);

        Route::get('member',['as' => "member",'uses' => "UserController@member"]);
        Route::post('member',['uses' => "UserController@createMember"]);
        Route::post('edit-member',['as' => "edit_member",'uses' => "UserController@editMember"]);
        Route::post('update-member',['as' => "update_member",'uses' => "UserController@updateMember"]);
    });
    
    Route::group(['as' => "profile.", 'prefix' => "profile", 'middleware' => ["backoffice.memberOnly"]], function(){
        
        Route::group(['as' => "loan.", 'prefix' => "loan"], function(){
            Route::get('application',['as' => "application",'uses' => "LoanApplicationController@index"]);
            Route::post('application',['uses' => "LoanApplicationController@create"]);

            Route::get('current',['as' => "current",'uses' => "LoanApplicationController@current"]);
            Route::post('current',['uses' => "LoanApplicationController@updateCurrent"]);

            Route::get('history',['as' => "history",'uses' => "LoanApplicationController@history"]);
            
            Route::get('view/{id}',['as' => "view",'uses' => "LoanApplicationController@view"]);
            Route::post('co-borrower',['as' => "co_borrower",'uses' => "UserController@editMember"]);
        });
    });

    
    Route::group(['as' => "loan.", 'prefix' => "loan"], function(){
        Route::get('/',['as' => "list",'uses' => "LoanApplicationController@list"]);
        Route::get('view/{id}',['as' => "view",'uses' => "LoanApplicationController@view"]);
        Route::post('view/{id}',['uses' => "LoanApplicationController@update"]);
        Route::get('report',['as' => "report",'uses' => "LoanApplicationController@report"]);
    });

    Route::group(['as' => "product.", 'prefix' => "product"], function(){
        Route::get('/',['as' => "index", 'middleware' => ["backoffice.superUserOnly"],'uses' => "ProductController@index"]);
        Route::post('/',['as' => "create",'uses' => "ProductController@create"]);
        Route::post('edit',['as' => "edit", 'middleware' => ["backoffice.superUserOnly"],'uses' => "ProductController@edit"]);
        Route::get('view',['as' => "view",'uses' => "ProductController@view"]);
        Route::post('update',['as' => "update",'uses' => "ProductController@update"]);
        Route::any('delete/{id}',['as' => "delete", 'middleware' => ["backoffice.superUserOnly"],'uses' => "ProductController@delete"]);
        
        Route::get('grid',['as' => "grid",'uses' => "ProductController@grid"]);
    });
    
});
