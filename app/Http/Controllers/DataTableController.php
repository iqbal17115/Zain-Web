<?php

namespace App\Http\Controllers;

use App\Models\Backend\Setting\Section;
use App\Models\Backend\Setting\Group;
use App\Models\Backend\Setting\Medium;
use App\Models\Backend\Setting\ClassName;
use App\Models\Backend\Student\StudentInfo;
use App\Models\Fee\FeeName;
use App\Models\Backend\Fee\Fee;
use App\Models\Backend\Person;
use App\Models\Backend\FileEntry;
use App\Models\Backend\ManageFile;
use Yajra\Datatables\Datatables;
use Illuminate\Http\Request;

class DataTableController extends Controller
{
    public function ManageFileTable(){
        $Query = ManageFile::orderBy('id', 'desc')->get();

        $this->i = 1;

        return Datatables::of($Query)
        ->addColumn('id', function ($data) {
            return $this->i++;
        })
        ->addColumn('person_id', function ($data) {
            return $data->Person ? $data->Person->name:'';
        })
        ->addColumn('file_entry_id', function ($data) {
            return $data->FileEntry ? $data->FileEntry->name:'';
        })
        ->addColumn('action', function ($data) {
            $html = '';
            $html .= '<button class="btn btn-sm edit-button text-light" onclick="callEdit('.$data->id.')"><i class="bx bx-edit font-size-18"></i></button>';
            $html .= '<button class="btn btn-sm delete-button text-light ml-1" onclick="callDelete('.$data->id.')"><i class="bx bx-window-close font-size-18"></i></button>';
            
            return $html;
        })
        ->rawColumns(['action'])
        ->toJSON();
    }
    public function FileEntryTable(){
        $Query = FileEntry::orderBy('id', 'desc')->get();

        $this->i = 1;

        return Datatables::of($Query)
        ->addColumn('id', function ($data) {
            return $this->i++;
        })
        ->addColumn('action', function ($data) {
            $html = '';
            $html .= '<button class="btn btn-sm edit-button text-light" onclick="callEdit('.$data->id.')"><i class="bx bx-edit font-size-18"></i></button>';
            if(!$data->ManageFile){
            $html .= '<button class="btn btn-sm delete-button text-light ml-1" onclick="callDelete('.$data->id.')"><i class="bx bx-window-close font-size-18"></i></button>';
            }
            return $html;
        })
        ->rawColumns(['action'])
        ->toJSON();
    }
    public function PersonTable(){
        $Query = Person::orderBy('id', 'desc')->get();

        $this->i = 1;

        return Datatables::of($Query)
        ->addColumn('id', function ($data) {
            return $this->i++;
        })
        ->addColumn('action', function ($data) {
            $html = '';
            $html .= '<button class="btn btn-sm edit-button text-light" onclick="callEdit('.$data->id.')"><i class="bx bx-edit font-size-18"></i></button>';
            if(!$data->ManageFile){
                $html .= '<button class="btn btn-sm delete-button text-light ml-1" onclick="callDelete('.$data->id.')"><i class="bx bx-window-close font-size-18"></i></button>';
            }
            return $html;
        })
        ->rawColumns(['action'])
        ->toJSON();
    }
    public function FeeTable(){
        $Query = Fee::orderBy('id', 'desc')->get();

        $this->i = 1;

        return Datatables::of($Query)
        ->addColumn('id', function ($data) {
            return $this->i++;
        })
        ->addColumn('class_name_id', function ($data) {
            return $data->ClassName ? $data->ClassName->name : '';
        })
        ->addColumn('group', function ($data) {
            return $data->Group ? $data->Group->name : '';
        })
        ->addColumn('medium', function ($data) {
            return $data->Medium ? $data->Medium->name : '';
        })
        ->addColumn('status', function ($data) {
            return $data->status == 1 ? 'Active' : 'Inactive';
        })
        ->addColumn('action', function ($data) {
            return '<button class="btn btn-sm edit-button text-light" onclick="callEdit('.$data->id.')"><i class="fas fa-edit font-size-18"></i></button>
                    <button class="btn btn-sm delete-button text-light ml-1" onclick="callDelete('.$data->id.')"><i class="bx bx-window-close font-size-18"></i></button>';
        })
        ->rawColumns(['action'])
        ->toJSON();
    }
    public function FeeNameTable(){
        $Query = FeeName::orderBy('id', 'desc')->get();

        $this->i = 1;

        return Datatables::of($Query)
        ->addColumn('status', function ($data) {
            return $data->status == 1 ? 'Active' : 'Inactive';
        })
        ->addColumn('action', function ($data) {
            return '<button class="btn btn-sm edit-button text-light" onclick="callEdit('.$data->id.')"><i class="bx bx-edit font-size-18"></i></button>
                    <button class="btn btn-sm delete-button text-light ml-1" onclick="callDelete('.$data->id.')"><i class="bx bx-window-close font-size-18"></i></button>';
        })
        ->rawColumns(['action'])
        ->toJSON();
    }
    public function StudentTable(){
        $Query = StudentInfo::orderBy('id', 'desc')->get();

        $this->i = 1;

        return Datatables::of($Query)
        ->addColumn('id', function ($data) {
            return $this->i++;
        })
         ->addColumn('name', function ($data) {
            return $data->Student ? $data->Student->first_name.' '.$data->Student->last_name : '';
        })
        ->addColumn('name', function ($data) {
            return $data->Student ? $data->Student->first_name.' '.$data->Student->last_name : '';
        }) 
        ->addColumn('dob', function ($data) {
            return $data->Student ? $data->Student->dob : '';
        })
        ->addColumn('class_name', function ($data) {
            return $data->ClassName ? $data->ClassName->name : '';
        })
        ->addColumn('year', function ($data) {
            return $data->ClassName ? $data->ClassName->year : '';
        })
        ->addColumn('group', function ($data) {
            return $data->Group ? $data->Group->name : '';
        })
        ->addColumn('medium', function ($data) {
            return $data->Medium ? $data->Medium->name : '';
        })
        ->addColumn('section', function ($data) {
            return $data->Section ? $data->Section->name : '';
        })
        ->addColumn('status', function ($data) {
            return $data->status == 1 ? 'Active' : 'Inactive';
        })
        ->addColumn('action', function ($data) {
            return '<a class="btn btn-sm edit-button text-light" href="'.route('student.admission', ['id' => $data->id]).'" data-id="'.$data->id.'"><i class="fas fa-edit font-size-18"></i></a>
                    <button class="btn btn-sm delete-button text-light ml-1" onclick="callDelete('.$data->id.')"><i class="bx bx-window-close font-size-18"></i></button>';
        })
        ->rawColumns(['action'])
        ->toJSON();
    }
    public function SectionTable(){
        $Query = Section::orderBy('id', 'desc')->get();

        $this->i = 1;

        return Datatables::of($Query)
        ->addColumn('id', function ($data) {
            return $this->i++;
        })
         ->addColumn('class_name_id', function ($data) {
            return $data->ClassName ? $data->ClassName->name : '';
        })
        ->addColumn('status', function ($data) {
            return $data->status == 1 ? 'Active' : 'Inactive';
        })
        ->addColumn('action', function ($data) {
            return '<button class="btn btn-sm edit-button text-light" onclick="callEdit('.$data->id.')"><i class="bx bx-edit font-size-18"></i></button>
                    <button class="btn btn-sm delete-button text-light ml-1" onclick="callDelete('.$data->id.')"><i class="bx bx-window-close font-size-18"></i></button>';
        })
        ->rawColumns(['action'])
        ->toJSON();
    }
    public function ClassTable (){
        $Query = ClassName::orderBy('id', 'desc')->get();

        $this->i = 1;

        return Datatables::of($Query)
        ->addColumn('id', function ($data) {
            return $this->i++;
        })
        ->addColumn('status', function ($data) {
            return $data->status == 1 ? 'Active' : 'Inactive';
        })
        ->addColumn('class_name_id', function ($data) {
            return $data->ClassName ? $data->ClassName->name : '';
        })
        ->addColumn('action', function ($data) {
            $html = '';
            $html .= '<button class="btn btn-sm edit-button text-light" onclick="callEdit('.$data->id.')"><i class="bx bx-edit font-size-18"></i></button>';
            if(count($data->Section)<1 && count($data->Group)<1 && count($data->Medium)<1){
                $html .= '<button class="btn btn-sm delete-button text-light ml-1" onclick="callDelete('.$data->id.')"><i class="bx bx-window-close font-size-18"></i></button>';
            }
            return $html;
        })
        ->rawColumns(['action'])
        ->toJSON();
    }
    public function DepartmentTable()
    {
        $Query = Group::orderBy('id', 'desc')->get();

        $this->i = 1;

        return Datatables::of($Query)
        ->addColumn('id', function ($data) {
            return $this->i++;
        })
        ->addColumn('class_name_id', function ($data) {
            return $data->ClassName ? $data->ClassName->name : '';
        })
        ->addColumn('status', function ($data) {
            return $data->status == 1 ? 'Active' : 'Inactive';
        })
        ->addColumn('action', function ($data) {
            return '<button class="btn btn-sm edit-button text-light" onclick="callEdit('.$data->id.')"><i class="bx bx-edit font-size-18"></i></button>
                    <button class="btn btn-sm delete-button text-light ml-1" onclick="callDelete('.$data->id.')"><i class="bx bx-window-close font-size-18"></i></button>';
        })
        ->rawColumns(['action'])
        ->toJSON();
    }
    public function MediummTable()
    {
        $Query = Medium::orderBy('id', 'desc')->get();

        $this->i = 1;

        return Datatables::of($Query)
        ->addColumn('id', function ($data) {
            return $this->i++;
        })
        ->addColumn('class_name_id', function ($data) {
            return $data->ClassName ? $data->ClassName->name : '';
        })
        ->addColumn('status', function ($data) {
            return $data->status == 1 ? 'Active' : 'Inactive';
        })
        ->addColumn('action', function ($data) {
            return '<button class="btn btn-sm edit-button text-light" onclick="callEdit('.$data->id.')"><i class="bx bx-edit font-size-18"></i></button>
                    <button class="btn btn-sm delete-button text-light ml-1" onclick="callDelete('.$data->id.')"><i class="bx bx-window-close font-size-18"></i></button>';
        })
        ->rawColumns(['action'])
        ->toJSON();
    }
}
