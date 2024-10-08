<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProjectController;
use App\Http\Controllers\Api\LeadController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/projects', [ProjectController::class, 'index']);
Route::get('/technologies', [ProjectController::class, 'technologies']);
Route::get('/types', [ProjectController::class, 'types']);

Route::get('project-by-slug/{slug}', [ProjectController::class, 'projectByslug']);
Route::get('projects-by-type/{slug}', [ProjectController::class, 'projectsBytype']);
Route::get('projects-by-technology/{slug}', [ProjectController::class, 'projectsByTechnology']);
Route::post('/send-email', [LeadController::class, 'store']);
