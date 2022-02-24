<?php

use App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::post('login', 'UserController@login');
Route::post('logout', 'UserController@logout');

Route::middleware('auth:sanctum')->group(function () {

    Route::apiResource('organizations', 'OrganizationsController');
    Route::apiResource('codes', 'CodesController');
    Route::apiResource('roles', 'RolesController');
    Route::apiResource('frequencies', 'FrequencyController');
    Route::apiResource('compliances', 'CodeCompliancesController');
    Route::post('organization-compliances', 'CodeCompliancesController@orgCompliances');
    Route::apiResource('verifications', 'RegulatorVerificationsController');
    Route::apiResource('events', 'EventsController');
    Route::post('organization-events/{org_id}', 'EventsController@OrgEvents');
    Route::prefix('reports')->group(function () {

        Route::prefix('admin')->group(function () {

            Route::post('company', 'ReportsController@getCompanyCodeReports');
            Route::post('code', 'ReportsController@getCodeReport');
        });
    });
});

Route::get('test', function () {
    return now();
});
