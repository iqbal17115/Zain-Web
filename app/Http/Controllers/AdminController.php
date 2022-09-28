<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Employees;
use App\Models\Departments;
use App\Models\Products;
use App\Models\Homes;
use App\Models\HomeImg;
use App\Models\Abouts;
use App\Models\Categories;
use App\Models\Services;
use App\Models\News;
use App\Models\Contacts;
class AdminController extends Controller
{
    function dashboard()
    {
        $newsCount = News::count();
        $user = User::where('email',session()->get('logged'))->first();
        $userCount = User::count();
        $employeeCount = Employees::count();
        $productCount = Products::count();
        $homes=Homes::where('home_id',1)->first();
        $deptCount = Departments::count();
        $catCount = Categories::count();
        $serviceCount = Services::count();
        return view('admin.dashboard')->with('employeeCount', $employeeCount)
                                      ->with('userCount', $userCount)
                                      ->with('productCount', $productCount)
                                      ->with('user', $user)
                                      ->with('newsCount', $newsCount)->with('homes', $homes)
                                      ->with('deptCount', $deptCount)
                                      ->with('catCount', $catCount)
                                      ->with('serviceCount', $serviceCount);
    }
    function updateHome()
    {
        $user = User::where('email',session()->get('logged'))->first();
        /* $homes = Homes::all(); */
        $homes=Homes::where('home_id',1)->first();
        return view('admin.updateHome')->with('user', $user)->with('homes', $homes);
    }
    function updateHomeSubmit(Request $req)
    {
        $user = User::where('email',session()->get('logged'))->first();
        $select = new HomeImg;//::where('home_img_id', 1)->first();
        $homes=Homes::where('home_id',1)->first();

        $name1 = $user->email.time().".".$req->file('home_img1')->getClientOriginalExtension();
        $req->file('home_img1')->move(public_path('home_imgs1'),$name1);

        $name2 = $user->email.time().".".$req->file('home_img2')->getClientOriginalExtension();
        $req->file('home_img2')->move(public_path('home_imgs2'),$name2);

        $name3 = $user->email.time().".".$req->file('home_img3')->getClientOriginalExtension();
        $req->file('home_img3')->move(public_path('home_imgs3'),$name3);

        $name4 = $user->email.time().".".$req->file('home_img4')->getClientOriginalExtension();
        $req->file('home_img4')->move(public_path('home_imgs4'),$name4);

        $name5 = $user->email.time().".".$req->file('home_img5')->getClientOriginalExtension();
        $req->file('home_img5')->move(public_path('home_imgs5'),$name5);

        $select->home_img1 = $name1;
        $select->home_img2 = $name2;
        $select->home_img3 = $name3;
        $select->home_img4 = $name4;
        $select->home_img5 = $name5;
        $select->user_id = $req->user_id;
        $select->save();
        $req->session()->flash('alert-success', 'Images Added Successfully!');
        return back();


    }
    function addHome()
    {
        $user = User::where('email', session()->get('logged'))->first();
        $homes=Homes::where('home_id',1)->first();
        return view('admin.addHome')->with('user', $user)->with('homes', $homes);
    }
    function addHomeSubmit(Request $req)
    {
        $req->validate([

            'home_title'=>'required|max:70',
            'home_desc'=>'required|max:500',
            'name' =>'required',
            'logo'=>'required|mimes:jpg,jpeg,png',
        ],
        [
            'home_title.required'=>'Title is required',
            'home_title.max'=>'Maximum 70 characters allowed',
            'home_desc.required'=>'Description is required',
            'home_desc.max'=>'Maximum 150 characters allowed',
            'name.required'=>'Please Insert Company Name',
            'logo.required' => 'Image is required',
            'logo.mimes' => 'Allowed files are JPEG/JPG/PNG',
        
        ]);
        $user = User::where('email', session()->get('logged'))->first();
        $name = $user->email.time().".".$req->file('logo')->getClientOriginalExtension();
        $req->file('logo')->move(public_path('home_imgs'),$name); 
        $homes = Homes::where('home_id', 1)->first();
        $homes->home_title = $req->home_title;
        $homes->name = $req->name;
        $homes->home_desc = $req->home_desc;
        $homes->logo = $name;
        $homes->user_id = $req->user_id;
        
        $homes->save();
        $req->session()->flash('alert-success', 'Home Section Updated Successfully!');
        return back();
    }
    function updateAbout()
    {
        $abouts = Abouts::where('about_id', 2)->first();
        $user = User::where('email',session()->get('logged'))->first();
        $homes=Homes::where('home_id',1)->first();
        return view('admin.updateAbout')->with('user',$user)->with('homes', $homes)->with('abouts', $abouts);
    }
    function updateAboutSubmit(Request $req)
    {
        $req->validate([

            'about_title'=>'required|max:90',
            'about_desc'=>'required',
            'about_img' => 'required|mimes:jpeg,jpg,png',
        ],
        [
            'about_title.required'=>'Title is required',
            //'about_title.max'=>'Maximum 30 characters allowed',
            'about_desc.required'=>'Description is required',
            'about_desc.max'=>'Maximum 1500 characters allowed',
            'about_img.required' => 'Image is required',
            'about_img.mimes' => 'Allowed files are JPEG/JPG/PNG',
        
        ]);
        $user = User::where('email', session()->get('logged'))->first();
        $name = $user->email.time().".".$req->file('about_img')->getClientOriginalExtension();
        $req->file('about_img')->move(public_path('about_imgs'),$name);
        $abouts = Abouts::where('about_id', 2)->first();
        $abouts->about_title=$req->about_title;
        $abouts->about_desc=$req->about_desc;
        $abouts->about_img=$name;
        $abouts->user_id=$req->user_id;
        $abouts->save();
        $req->session()->flash('alert-success', 'About Section Updated Successfully!');
        return back();
    }
    function addServices()
    {
        $user = User::where('email',session()->get('logged'))->first();
        $homes=Homes::where('home_id',1)->first();
        return view('admin.addServices')->with('user',$user)->with('homes', $homes);
    }
    function addServicesSubmit(Request $req)
    {
        $req->validate([

            'service_title'=>'required|max:30',
            'service_desc'=>'required',
            'service_icon' => 'required|regex:/fa-[a-zA-Z0-9-]+/',
        ],
        [
            'service_title.required'=>'Title is required',
            //'about_title.max'=>'Maximum 30 characters allowed',
            'service_desc.required'=>'Description is required',
            'service_desc.max'=>'Maximum 1500 characters allowed',
            'service_icon.required' => 'Icon is required',
            'service_icon.regex' => 'Invalid icon code',
        
        ]);
        $user = User::where('email',session()->get('logged'))->first();
        $services = new Services;
        $services->service_title=$req->service_title;
        $services->service_desc=$req->service_desc;
        $services->service_icon	=$req->service_icon	;
        $services->user_id=$req->user_id;
        $services->save();
        $req->session()->flash('alert-success', 'Service Added Successfully!');
        return back();
    }
    function addEmployees()
    {
        $user = User::where('email',session()->get('logged'))->first();
        $homes=Homes::where('home_id',1)->first();
        $dept = Departments::all();
        return view('admin.addEmployees')->with('user',$user)->with('dept', $dept)->with('homes', $homes);
    }
    function addEmployeesSubmit(Request $req)
    {
        $req->validate([

            'employee_name'=>'required|max:30',
            'employee_designation'=>'required',
            'employee_img' => 'required|mimes:jpg,jpeg,png',
            'dept_id'=>'required',
        ],
        [
            'employee_name.required'=>'Name is required',
            'employee_name.max'=>'Maximum 30 characters',
            'employee_designation.required'=>'Description is required',
            'employee_designation.max'=>'Designation is Required',
            'employee_img.required' => 'Image is required',
            'employee_img.mimes' => 'JPG, JPEG & PNG files allowed only',
            'dept_id.required' => 'Department name is required',
        
        ]);
        $user = User::where('email',session()->get('logged'))->first();
        $emp = new Employees;
        $name = $user->email.time().".".$req->file('employee_img')->getClientOriginalExtension();
        $req->file('employee_img')->move(public_path('employee_imgs'),$name);
        $emp->employee_name = $req->employee_name;
        $emp->employee_designation = $req->employee_designation;
        $emp->employee_img = $name;
        $emp->dept_id = $req->dept_id;
        $emp->user_id=$req->user_id;
        $emp->save();
        $req->session()->flash('alert-success', 'Employee Added Successfully!');
        return back();

    }
    function addProducts()
    {
        $cat = Categories::all();
        $homes=Homes::where('home_id',1)->first();
        $user = User::where('email',session()->get('logged'))->first();
        return view('admin.addProducts')->with('user', $user)->with('cat', $cat)->with('homes', $homes);
    }
    function addProductsSubmit(Request $req)
    {
        $req->validate([

            'prd_title'=>'required|max:90',
            'prd_desc'=>'required',
            'prd_img' => 'required|mimes:jpg,jpeg,png',
            'cat_id'=>'required',
        ],
        [
            'prd_title.required'=>'Name is required',
            'prd_title.max'=>'Maximum 90 characters',
            'prd_desc.required'=>'Description is required',
            'prd_img.required' => 'Image is required',
            'prd_img.mimes' => 'JPG, JPEG & PNG files allowed only',
            'cat_id.required' => 'Department name is required',
        
        ]);
        $user = User::where('email',session()->get('logged'))->first();
        $prd = new Products;
        $name = $user->email.time().".".$req->file('prd_img')->getClientOriginalExtension();
        $req->file('prd_img')->move(public_path('prd_imgs'),$name);
        $prd->prd_title = $req->prd_title;
        $prd->prd_desc = $req->prd_desc;
        $prd->prd_img = $name;
        $prd->cat_id = $req->cat_id;
        $prd->user_id = $req->user_id;
        $prd->save();
        $req->session()->flash('alert-success', 'Product Added Successfully!');
        return back();
    }
    function addNews()
    {
        $user = User::where('email',session()->get('logged'))->first();
        $homes=Homes::where('home_id',1)->first();
        return view('admin.addNews')->with('user',$user)->with('homes', $homes);
    }
    function addNewsSubmit(Request $req)
    {
        $req->validate([

            'news_title'=>'required|max:100',
            'news_desc'=>'required',
            'news_img' => 'required|mimes:jpg,jpeg,png',
            
        ],
        [
            'news_title.required'=>'Name is required',
            'news_title.max'=>'Maximum 100 characters',
            'news_desc.required'=>'Description is required',
            'news_img.required' => 'Image is required',
            'news_img.mimes' => 'JPG, JPEG & PNG files allowed only',
        ]);
        $user = User::where('email',session()->get('logged'))->first();
        $name = $user->email.time().".".$req->file('news_img')->getClientOriginalExtension();
        $req->file('news_img')->move(public_path('news_imgs'),$name);
        $news = new News;
        $news->news_title = $req->news_title;
        $news->news_desc = $req->news_desc;
        $news->news_img = $name;
        $news->user_id = $req->user_id;
        $news->save();
        $req->session()->flash('alert-success', 'News Added Successfully!');
        return back();

    }
    function addContacts()
    {
        $contacts =Contacts::where('contact_id', 1)->first();
        $user = User::where('email',session()->get('logged'))->first();
        $homes=Homes::where('home_id',1)->first();
        return view('admin.addContacts')->with('user', $user)->with('homes', $homes)->with('contacts', $contacts);
    }
    function addContactsSubmit(Request $req)
    {
        $req->validate([

            'phone'=>'required',
            'email'=>'required',
            'address' => 'required',
            'gMap'=>'required',
            
        ],
        [
            'phone.required'=>'Name is required',
            'email.required'=>'Description is required',
            'address.required' => 'Image is required',
            'gMap.required' => 'Image is required',
            
        ]);
        $user = User::where('email',session()->get('logged'))->first();
        $homes=Homes::where('home_id',1)->first();
        $contacts =Contacts::where('contact_id', 1)->first();
        $contacts->phone = $req->phone;
        $contacts->email = $req->email;
        $contacts->address = $req->address;
        $contacts->gMap = $req->gMap;
        $contacts->user_id = $req->user_id;
        $contacts->save();
        $req->session()->flash('alert-success', 'Contacts Updated Successfully!');
        return back();

    }
    function updateFooter()
    {
        $user = User::where('email',session()->get('logged'))->first();
        $homes=Homes::where('home_id',1)->first();
        return view('admin.updateFooter')->with('user', $user)->with('homes', $homes);
    }
    function updateFooterSubmit(Request $req)
    {

    }
    function addDepartments()
    {
        $user = User::where('email',session()->get('logged'))->first();
        $homes=Homes::where('home_id',1)->first();
        return view('admin.addDepartments')->with('user', $user)->with('homes', $homes);
    }
    function addDepartmentsSubmit(Request $req)
    {
        $req->validate(
            [
                'dept_name' => 'required',
            ],
            [
                'dept_name.required' => 'Department Name Is Mandatory',
            ]);
        $user = User::where('email',session()->get('logged'))->first();
        $dept = new Departments;
        $dept->dept_name = $req->dept_name;
        $dept->user_id = $req->user_id;
        $dept->save();
        $req->session()->flash('alert-success', 'Department Added Successfully!');
        return back();
    }
    function addCategories()
    {
        $user = User::where('email',session()->get('logged'))->first();
        $homes=Homes::where('home_id',1)->first();
        return view('admin.addCategories')->with('user', $user)->with('homes', $homes);
    }
    function addCategoriesSubmit(Request $req)
    {
        $req->validate(
            [
                'cat_name' => 'required',
            ],
            [
                'cat_name.required' => 'Category Name Is Mandatory',
            ]);
        $user = User::where('email',session()->get('logged'))->first();
        $cat = new Categories;
        $cat->cat_name = $req->cat_name;
        $cat->capacity = $req->capacity;
        $cat->user_id = $req->user_id;
        $cat->save();
        $req->session()->flash('alert-success', 'Category Added Successfully!');
        return back();
    }
    function employeeList()
    {
        $user = User::where('email',session()->get('logged'))->first();
        $homes=Homes::where('home_id',1)->first();
        $emp = Employees::paginate(10);
        return view('admin.employeeList')->with('user', $user)->with('emp',$emp)->with('homes', $homes);
    }
    function newsList()
    {
        $user = User::where('email',session()->get('logged'))->first();
        $homes=Homes::where('home_id',1)->first();
        $news = News::paginate(10);
        return view('admin.newsList')->with('user', $user)->with('news',$news)->with('homes', $homes);
    }
    function productList()
    {
        $user = User::where('email',session()->get('logged'))->first();
        $homes=Homes::where('home_id',1)->first();
        $prd = Products::paginate(10);
        return view('admin.productList')->with('user', $user)->with('prd',$prd)->with('homes', $homes);
    }
    function deptList()
    {
        $user = User::where('email',session()->get('logged'))->first();
        $homes=Homes::where('home_id',1)->first();
        $dept = Departments::paginate(10);
        return view('admin.deptList')->with('user', $user)->with('dept',$dept)->with('homes', $homes);
    }
    function catList()
    {
        $user = User::where('email',session()->get('logged'))->first();
        $homes=Homes::where('home_id',1)->first();
        $cat = Categories::paginate(10);
        return view('admin.catList')->with('user', $user)->with('cat',$cat)->with('homes', $homes);
    }
    function serviceList()
    {
        $user = User::where('email',session()->get('logged'))->first();
        $homes=Homes::where('home_id',1)->first();
        $service = Services::paginate(10);
        return view('admin.serviceList')->with('user', $user)->with('service',$service)->with('homes', $homes);
    }
   
    function editProduct(Request $req)
    {
        $cat = Categories::all();
        $user = User::where('email',session()->get('logged'))->first();
        $prd = Products::where('prd_id', '=', $req->id)
                                ->select('prd_title','prd_id','prd_desc','prd_img','cat_id','user_id')
                                ->first();
        $homes=Homes::where('home_id',1)->first();
        return view('admin.editProduct')->with('user', $user)
                    ->with('prd', $prd)->with('homes', $homes)->with('cat', $cat);
    }

    function editProductSubmit(Request $req)
    {
       
        $req->validate([

            'prd_title'=>'required|max:90',
            'prd_desc'=>'required',
            'prd_img' => 'required|mimes:jpg,jpeg,png',
            'cat_id'=>'required',
        ],
        [
            'prd_title.required'=>'Name is required',
            'prd_title.max'=>'Maximum 90 characters',
            'prd_desc.required'=>'Description is required',
            'prd_img.required' => 'Image is required',
            'prd_img.mimes' => 'JPG, JPEG & PNG files allowed only',
            'cat_id.required' => 'Department name is required',
        
        ]);
        $user = User::where('email',session()->get('logged'))->first();
        $prd = Products::where('prd_id', $req->prd_id)->first();
        $name = $user->email.time().".".$req->file('prd_img')->getClientOriginalExtension();
        $req->file('prd_img')->move(public_path('prd_imgs'),$name);
        
         $prd->prd_title = $req->prd_title;
        $prd->prd_desc = $req->prd_desc;
        $prd->prd_img = $name;
        $prd->cat_id = $req->cat_id;
        $prd->user_id = $req->user_id;
        
        $prd->save();
        $req->session()->flash('alert-success', 'Product Edited Successfully!');
        return redirect('productList'); 
    }

    function deleteProduct(Request $req)
    {
        $cat = Categories::all();
        $user = User::where('email',session()->get('logged'))->first();
        $prd = Products::where('prd_id', '=', $req->id)
                                ->select('prd_title','prd_id','prd_desc','prd_img','cat_id','user_id')
                                ->first();
        $homes=Homes::where('home_id',1)->first();
        return view('admin.deleteProduct')->with('user', $user)
                    ->with('prd', $prd)->with('homes', $homes)->with('cat', $cat);
    }
    function deleteProductSubmit(Request $req)
    {
        
        $user = User::where('email',session()->get('logged'))->first();
        $prd = Products::where('prd_id', $req->prd_id)->first();
        
        
        $prd->delete();
        $req->session()->flash('alert-success', 'Product Deleted Successfully!');
        return redirect('productList'); 
    }
    function editEmployee(Request $req)
    {
        $dept = Departments::all();
        $user = User::where('email',session()->get('logged'))->first();
        $emp = Employees::where('employee_id', '=', $req->id)
                                ->select('employee_name','employee_id','employee_designation','employee_img','dept_id','user_id')
                                ->first();
        $homes=Homes::where('home_id',1)->first();
        return view('admin.editEmployee')->with('user', $user)
                    ->with('emp', $emp)->with('homes', $homes)->with('dept', $dept);
    }

    function editEmployeeSubmit(Request $req)
    {
       
        $req->validate([

            'employee_name'=>'required|max:30',
            'employee_designation'=>'required',
            'employee_img' => 'required|mimes:jpg,jpeg,png',
            'dept_id'=>'required',
        ],
        [
            'employee_name.required'=>'Name is required',
            'employee_name.max'=>'Maximum 30 characters',
            'employee_designation.required'=>'Description is required',
            'employee_designation.max'=>'Designation is Required',
            'employee_img.required' => 'Image is required',
            'employee_img.mimes' => 'JPG, JPEG & PNG files allowed only',
            'dept_id.required' => 'Department name is required',
        
        ]);
        $user = User::where('email',session()->get('logged'))->first();
        $emp = Employees::where('employee_id', $req->employee_id)->first();
        $name = $user->email.time().".".$req->file('employee_img')->getClientOriginalExtension();
        $req->file('employee_img')->move(public_path('employee_imgs'),$name);
        
        $emp->employee_name = $req->employee_name;
        $emp->employee_designation = $req->employee_designation;
        $emp->employee_img = $name;
        $emp->dept_id = $req->dept_id;
        $emp->user_id=$req->user_id;
        
        $emp->save();
        $req->session()->flash('alert-success', 'Employee Edited Successfully!');
        return redirect('employeeList'); 
    }
    function deleteEmployee(Request $req)
    {
        $dept = Departments::all();
        $user = User::where('email',session()->get('logged'))->first();
        $emp = Employees::where('employee_id', '=', $req->id)
                                ->select('employee_name','employee_id','employee_designation','employee_img','dept_id','user_id')
                                ->first();
        $homes=Homes::where('home_id',1)->first();
        return view('admin.deleteEmployee')->with('user', $user)
                    ->with('emp', $emp)->with('homes', $homes)->with('dept', $dept);
    }
    function deleteEmployeeSubmit(Request $req)
    {
        
        $user = User::where('email',session()->get('logged'))->first();
        $emp = Employees::where('employee_id', $req->employee_id)->first();
        
        
        $emp->delete();
        $req->session()->flash('alert-success', 'Employee Deleted Successfully!');
        return redirect('employeeList'); 
    }
    function editNews(Request $req)
    {
        
        $user = User::where('email',session()->get('logged'))->first();
        $news = News::where('news_id', '=', $req->id)
                                ->select('news_id', 'news_title', 'news_desc', 'news_img' ,'user_id')
                                ->first();
        $homes=Homes::where('home_id',1)->first();
        return view('admin.editNews')->with('user', $user)
                    ->with('news', $news)->with('homes', $homes);
    }
    function editNewsSubmit(Request $req)
    {
        $req->validate([

            'news_title'=>'required|max:90',
            'news_desc'=>'required',
            'news_img' => 'required|mimes:jpg,jpeg,png',
            
        ],
        [
            'news_title.required'=>'Name is required',
            'news_title.max'=>'Maximum 90 characters',
            'news_desc.required'=>'Description is required',
            'news_img.required' => 'Image is required',
            'news_img.mimes' => 'JPG, JPEG & PNG files allowed only',
            
        
        ]);
        $user = User::where('email',session()->get('logged'))->first();
        $news = News::where('news_id', $req->news_id)->first();
        $name = $user->email.time().".".$req->file('news_img')->getClientOriginalExtension();
        $req->file('news_img')->move(public_path('news_imgs'),$name);
        
        $news->news_title = $req->news_title;
        $news->news_desc = $req->news_desc;
        $news->news_img = $name;
        $news->user_id=$req->user_id;
        
        $news->save();
        $req->session()->flash('alert-success', 'News Item Edited Successfully!');
        return redirect('newsList'); 
    }
    function deleteNews(Request $req)
    {
        $user = User::where('email',session()->get('logged'))->first();
        $news = News::where('news_id', '=', $req->id)
                                ->select('news_id', 'news_title', 'news_desc', 'news_img' ,'user_id')
                                ->first();
        $homes=Homes::where('home_id',1)->first();
        return view('admin.deleteNews')->with('user', $user)
                    ->with('news', $news)->with('homes', $homes);
    }
    function deleteNewsSubmit(Request $req)
    {
        $news = News::where('news_id', '=', $req->news_id)->first();
        
        
        $news->delete();
        $req->session()->flash('alert-success', 'News Item Deleted Successfully!');
        return redirect('newsList'); 
    }
}
