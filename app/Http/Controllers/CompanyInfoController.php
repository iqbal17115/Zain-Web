<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CompanyInfoController extends Controller
{
    public function companyInfo() {
        return view('admin.company_info');
    }
}
