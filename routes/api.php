<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use SaltProject\Controllers\ProjectsController;
use SaltProject\Controllers\CategoriesController;
use SaltProject\Controllers\ExpenseCategoriesController;
use SaltProject\Controllers\NestedMilestonesController;
use SaltProject\Controllers\NestedExpensesController;
use SaltProject\Controllers\NestedDiscussionsController;
use SaltProject\Controllers\NestedFilesController;

$version = config('app.API_VERSION', 'v1');

Route::middleware(['api'])
    ->prefix("api/{$version}")
    ->group(function () {

    // API: PROJECTS CATEGORIES
    Route::get("projects/categories", [CategoriesController::class, 'index'])->middleware(['auth:api']); // get entire collection
    Route::post("projects/categories", [CategoriesController::class, 'store'])->middleware(['auth:api']); // create new collection

    Route::get("projects/categories/trash", [CategoriesController::class, 'trash'])->middleware(['auth:api']); // trash of collection

    Route::post("projects/categories/import", [CategoriesController::class, 'import'])->middleware(['auth:api']); // import collection from external
    Route::post("projects/categories/export", [CategoriesController::class, 'export'])->middleware(['auth:api']); // export entire collection
    Route::get("projects/categories/report", [CategoriesController::class, 'report'])->middleware(['auth:api']); // report collection

    Route::get("projects/categories/{id}/trashed", [CategoriesController::class, 'trashed'])->where('id', '[a-zA-Z0-9-]+')->middleware(['auth:api']); // get collection by ID from trash

    // RESTORE data by ID (id), selected IDs (selected), and All data (all)
    Route::post("projects/categories/{id}/restore", [CategoriesController::class, 'restore'])->where('id', '[a-zA-Z0-9-]+')->middleware(['auth:api']); // restore collection by ID

    // DELETE data by ID (id), selected IDs (selected), and All data (all)
    Route::delete("projects/categories/{id}/delete", [CategoriesController::class, 'delete'])->where('id', '[a-zA-Z0-9-]+')->middleware(['auth:api']); // hard delete collection by ID

    Route::get("projects/categories/{id}", [CategoriesController::class, 'show'])->where('id', '[a-zA-Z0-9-]+')->middleware(['auth:api']); // get collection by ID
    Route::put("projects/categories/{id}", [CategoriesController::class, 'update'])->where('id', '[a-zA-Z0-9-]+')->middleware(['auth:api']); // update collection by ID
    Route::patch("projects/categories/{id}", [CategoriesController::class, 'patch'])->where('id', '[a-zA-Z0-9-]+')->middleware(['auth:api']); // patch collection by ID
    // DESTROY data by ID (id), selected IDs (selected), and All data (all)
    Route::delete("projects/categories/{id}", [CategoriesController::class, 'destroy'])->where('id', '[a-zA-Z0-9-]+')->middleware(['auth:api']); // soft delete a collection by ID

    // API: PROJECTS EXPENSES CATEGORIES
    Route::get("projects/expenses/categories", [ExpenseCategoriesController::class, 'index'])->middleware(['auth:api']); // get entire collection
    Route::post("projects/expenses/categories", [ExpenseCategoriesController::class, 'store'])->middleware(['auth:api']); // create new collection

    Route::get("projects/expenses/categories/trash", [ExpenseCategoriesController::class, 'trash'])->middleware(['auth:api']); // trash of collection

    Route::post("projects/expenses/categories/import", [ExpenseCategoriesController::class, 'import'])->middleware(['auth:api']); // import collection from external
    Route::post("projects/expenses/categories/export", [ExpenseCategoriesController::class, 'export'])->middleware(['auth:api']); // export entire collection
    Route::get("projects/expenses/categories/report", [ExpenseCategoriesController::class, 'report'])->middleware(['auth:api']); // report collection

    Route::get("projects/expenses/categories/{id}/trashed", [ExpenseCategoriesController::class, 'trashed'])->where('id', '[a-zA-Z0-9-]+')->middleware(['auth:api']); // get collection by ID from trash

    // RESTORE data by ID (id), selected IDs (selected), and All data (all)
    Route::post("projects/expenses/categories/{id}/restore", [ExpenseCategoriesController::class, 'restore'])->where('id', '[a-zA-Z0-9-]+')->middleware(['auth:api']); // restore collection by ID

    // DELETE data by ID (id), selected IDs (selected), and All data (all)
    Route::delete("projects/expenses/categories/{id}/delete", [ExpenseCategoriesController::class, 'delete'])->where('id', '[a-zA-Z0-9-]+')->middleware(['auth:api']); // hard delete collection by ID

    Route::get("projects/expenses/categories/{id}", [ExpenseCategoriesController::class, 'show'])->where('id', '[a-zA-Z0-9-]+')->middleware(['auth:api']); // get collection by ID
    Route::put("projects/expenses/categories/{id}", [ExpenseCategoriesController::class, 'update'])->where('id', '[a-zA-Z0-9-]+')->middleware(['auth:api']); // update collection by ID
    Route::patch("projects/expenses/categories/{id}", [ExpenseCategoriesController::class, 'patch'])->where('id', '[a-zA-Z0-9-]+')->middleware(['auth:api']); // patch collection by ID
    // DESTROY data by ID (id), selected IDs (selected), and All data (all)
    Route::delete("projects/expenses/categories/{id}", [ExpenseCategoriesController::class, 'destroy'])->where('id', '[a-zA-Z0-9-]+')->middleware(['auth:api']); // soft delete a collection by ID


    // API: PROJECTS
    Route::get("projects", [ProjectsController::class, 'index'])->middleware(['auth:api']); // get entire collection
    Route::post("projects", [ProjectsController::class, 'store'])->middleware(['auth:api']); // create new collection

    Route::get("projects/trash", [ProjectsController::class, 'trash'])->middleware(['auth:api']); // trash of collection

    Route::post("projects/import", [ProjectsController::class, 'import'])->middleware(['auth:api']); // import collection from external
    Route::post("projects/export", [ProjectsController::class, 'export'])->middleware(['auth:api']); // export entire collection
    Route::get("projects/report", [ProjectsController::class, 'report'])->middleware(['auth:api']); // report collection

    Route::get("projects/{id}/trashed", [ProjectsController::class, 'trashed'])->where('id', '[a-zA-Z0-9-]+')->middleware(['auth:api']); // get collection by ID from trash

    // RESTORE data by ID (id), selected IDs (selected), and All data (all)
    Route::post("projects/{id}/restore", [ProjectsController::class, 'restore'])->where('id', '[a-zA-Z0-9-]+')->middleware(['auth:api']); // restore collection by ID

    // DELETE data by ID (id), selected IDs (selected), and All data (all)
    Route::delete("projects/{id}/delete", [ProjectsController::class, 'delete'])->where('id', '[a-zA-Z0-9-]+')->middleware(['auth:api']); // hard delete collection by ID

    Route::get("projects/{id}", [ProjectsController::class, 'show'])->where('id', '[a-zA-Z0-9-]+')->middleware(['auth:api']); // get collection by ID
    Route::put("projects/{id}", [ProjectsController::class, 'update'])->where('id', '[a-zA-Z0-9-]+')->middleware(['auth:api']); // update collection by ID
    Route::patch("projects/{id}", [ProjectsController::class, 'patch'])->where('id', '[a-zA-Z0-9-]+')->middleware(['auth:api']); // patch collection by ID
    // DESTROY data by ID (id), selected IDs (selected), and All data (all)
    Route::delete("projects/{id}", [ProjectsController::class, 'destroy'])->where('id', '[a-zA-Z0-9-]+')->middleware(['auth:api']); // soft delete a collection by ID

    // API: PROJECTS MILESTONES
    Route::resource('projects.milestones', NestedMilestonesController::class);

    // API: PROJECTS EXPENSES
    Route::resource('projects.expenses', NestedExpensesController::class);

    // API: PROJECTS DISCUSSIONS
    Route::resource('projects.discussions', NestedDiscussionsController::class);

    // API: PROJECTS FILES
    Route::resource('projects.files', NestedFilesController::class);
});
