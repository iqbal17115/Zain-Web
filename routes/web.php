<?php

use App\Http\Controllers\DatatableController;
use App\Http\Controllers\Admin\DashboardController;

use App\Http\Livewire\Setting\Medium;
use App\Http\Livewire\Setting\Department;
use App\Http\Livewire\Setting\ClassName;
use App\Http\Livewire\Setting\Section;
use App\Http\Livewire\Student\Admission;
use App\Http\Livewire\Student\StudentList;
use App\Http\Livewire\Fee\FeeName;
use App\Http\Livewire\Fee\Fee;
use App\Http\Livewire\Backend\Person;
use App\Http\Livewire\Backend\FileEntry;
use App\Http\Livewire\Backend\ManageFile;
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
    return view('welcome');
});

Route::group(['auth:sanctum', 'verified'], function () {
    Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {

    Route::group(['prefix' => 'fee', 'as' => 'fee.'], function () {
        Route::get('fee-type', FeeName::class)->name('fee-type');
        Route::get('fee', Fee::class)->name('fee');
    });

    Route::group(['prefix' => 'student', 'as' => 'student.'], function () {
        Route::get('admission/{id?}', Admission::class)->name('admission');
        Route::get('student-list', StudentList::class)->name('student-list');
    });

    Route::group(['prefix' => 'Setting', 'as' => 'Setting.'], function () {
        Route::get('medium', Medium::class)->name('medium');
        Route::get('group', Department::class)->name('group');
        Route::get('class_name', ClassName::class)->name('class_name');
        Route::get('section', Section::class)->name('section');
        Route::get('person', Person::class)->name('person');
        Route::get('file-entry', FileEntry::class)->name('file-entry');
        Route::get('manage-file', ManageFile::class)->name('manage-file');
    });

    Route::group(['prefix' => 'data', 'as' => 'data.'], function () {

        Route::get('medium-table', [DatatableController::class, 'MediummTable'])->name('medium_table');
        Route::get('group-table', [DatatableController::class, 'DepartmentTable'])->name('group_table');
        Route::get('class-table', [DatatableController::class, 'ClassTable'])->name('class_table');
        Route::get('section-table', [DatatableController::class, 'SectionTable'])->name('section_table');
        Route::get('student-list-table', [DatatableController::class, 'StudentTable'])->name('student_list_table');
        Route::get('fee-name-table', [DatatableController::class, 'FeeNameTable'])->name('fee_name_table');
        Route::get('fee-table', [DatatableController::class, 'FeeTable'])->name('fee_table');
        Route::get('person-table', [DatatableController::class, 'PersonTable'])->name('person_table');
        Route::get('file-entry-table', [DatatableController::class, 'FileEntryTable'])->name('file_entry_table');
        Route::get('manage-file-table', [DatatableController::class, 'ManageFileTable'])->name('manage_file_table');
    });
});
