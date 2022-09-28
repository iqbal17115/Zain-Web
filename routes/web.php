<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CommonController;
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

//Not Auth Pages
Route::get('/', [CommonController::class, 'welcome'])->name('welcome');
Route::get('/login', [CommonController::class, 'login'])->name('login');
Route::post('/users.login.submit', [CommonController::class, 'loginSubmit'])->name('users.login.submit');
Route::get('/register', [CommonController::class, 'register'])->name('register');
Route::post('/users.register.submit', [CommonController::class, 'registerSubmit'])->name('users.register.submit');
Route::post('/email.submit', [CommonController::class, 'emailSubmit'])->name('email.submit');
Route::get('newsDetails/{id}', [CommonController::class, 'newsDetails'])->name('newsDetails');
Route::get('logout',[CommonController::class, 'logout'])->name('logout');




//Auth Pages
Route::group(['middleware'=>['prevent.back']], function(){
Route::get('admindash',[AdminController::class, 'dashboard'])->name('admindash')->middleware('logged.user');
Route::get('updateHome', [AdminController::class, 'updateHome'])->name('updateHome')->middleware('logged.user');
Route::post('updateHome.submit', [AdminController::class, 'updateHomeSubmit'])->name('updateHome.submit')->middleware('logged.user');
Route::get('addHome', [AdminController::class, 'addHome'])->name('addHome')->middleware('logged.user');
Route::post('addHome.submit',[AdminController::class, 'addHomeSubmit'])->name('addHome.submit')->middleware('logged.user');
Route::get('updateAbout',[AdminController::class, 'updateAbout'])->name('updateAbout')->middleware('logged.user');
Route::post('updateAbout.submit', [AdminController::class, 'updateAboutSubmit'])->name('updateAbout.submit')->middleware('logged.user');
Route::get('addServices', [AdminController::class, 'addServices'])->name('addServices')->middleware('logged.user');
Route::post('addServices.submit', [AdminController::class, 'addServicesSubmit'])->name('addServices.submit')->middleware('logged.user');
Route::get('addEmployees', [AdminController::class, 'addEmployees'])->name('addEmployees')->middleware('logged.user');
Route::post('addEmployees.submit', [AdminController::class, 'addEmployeesSubmit'])->name('addEmployees.submit')->middleware('logged.user');
Route::get('addProducts', [AdminController::class, 'addProducts'])->name('addProducts')->middleware('logged.user');
Route::post('addProducts.submit', [AdminController::class, 'addProductsSubmit'])->name('addProducts.submit')->middleware('logged.user');
Route::get('addNews', [AdminController::class, 'addNews'])->name('addNews')->middleware('logged.user');
Route::post('addNews.submit', [AdminController::class, 'addNewsSubmit'])->name('addNews.submit')->middleware('logged.user');
Route::get('addContacts', [AdminController::class, 'addContacts'])->name('addContacts')->middleware('logged.user');
Route::post('addContacts.submit', [AdminController::class, 'addContactsSubmit'])->name('addContacts.submit')->middleware('logged.user');
Route::get('updateFooter', [AdminController::class, 'updateFooter'])->name('updateFooter')->middleware('logged.user');
Route::post('updateFooter.submit', [AdminController::class, 'updateFooterSubmit'])->name('updateFooter.submit')->middleware('logged.user');
Route::get('addDepartments', [AdminController::class, 'addDepartments'])->name('addDepartments')->middleware('logged.user');
Route::post('addDepartments.submit', [AdminController::class, 'addDepartmentsSubmit'])->name('addDepartments.submit')->middleware('logged.user');
Route::get('addCategories', [AdminController::class, 'addCategories'])->name('addCategories')->middleware('logged.user');
Route::post('addCategories.submit', [AdminController::class, 'addCategoriesSubmit'])->name('addCategories.submit')->middleware('logged.user');
Route::get('employeeList', [AdminController::class, 'employeeList'])->name('employeeList')->middleware('logged.user');
Route::get('newsList', [AdminController::class, 'newsList'])->name('newsList')->middleware('logged.user');
Route::get('productList', [AdminController::class, 'productList'])->name('productList')->middleware('logged.user');
Route::get('deptList', [AdminController::class, 'deptList'])->name('deptList')->middleware('logged.user');
Route::get('catList', [AdminController::class, 'catList'])->name('catList')->middleware('logged.user');
Route::get('serviceList', [AdminController::class, 'serviceList'])->name('serviceList')->middleware('logged.user');
Route::get('editProduct/{id}', [AdminController::class, 'editProduct'])->name('editProduct')->middleware('logged.user');
Route::post('editProduct.submit', [AdminController::class, 'editProductSubmit'])->name('editProduct.submit')->middleware('logged.user');
Route::get('deleteProduct/{id}', [AdminController::class, 'deleteProduct'])->name('deleteProduct')->middleware('logged.user');
Route::post('deleteProduct.submit', [AdminController::class, 'deleteProductSubmit'])->name('deleteProduct.submit')->middleware('logged.user');
Route::get('editEmployee/{id}', [AdminController::class, 'editEmployee'])->name('editEmployee')->middleware('logged.user');
Route::post('editEmployee.submit', [AdminController::class, 'editEmployeeSubmit'])->name('editEmployee.submit')->middleware('logged.user');
Route::get('deleteEmployee/{id}', [AdminController::class, 'deleteEmployee'])->name('deleteEmployee')->middleware('logged.user');
Route::post('deleteEmployee.submit', [AdminController::class, 'deleteEmployeeSubmit'])->name('deleteEmployee.submit')->middleware('logged.user');
Route::get('editNews/{id}', [AdminController::class, 'editNews'])->name('editNews')->middleware('logged.user');
Route::post('editNews.submit', [AdminController::class, 'editNewsSubmit'])->name('editNews.submit')->middleware('logged.user');
Route::get('deleteNews/{id}', [AdminController::class, 'deleteNews'])->name('deleteNews')->middleware('logged.user');
Route::post('deleteNews.submit', [AdminController::class, 'deleteNewsSubmit'])->name('deleteNews.submit')->middleware('logged.user');


});