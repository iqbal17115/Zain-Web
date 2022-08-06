<?php

namespace App\Http\Livewire\Student;

use App\Models\Backend\Setting\ClassName;
use App\Models\Backend\Setting\Country;
use App\Models\Backend\Student\Student;
use App\Models\Backend\Student\StudentInfo;
use App\Models\Backend\Student\ParentInfo;
use Illuminate\Support\Facades\DB;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Admission extends Component
{
    use WithFileUploads;

    // Student
    public $first_name;
    public $last_name;
    public $gender;
    public $dob;
    public $religion;
    public $email;

    // Parent
    public $father_name;
    public $mother_name;
    public $father_occupation;
    public $mother_occupation;
    public $phone;
    public $nationality;
    public $present_address;
    public $permanent_address;
    public $parent_photo;

    // Student Info
    public $class_name_id;
    public $group_id;
    public $medium_id;
    public $section_id;
    public $roll;
    public $student_photo;
    public $status = 1;

    // Others
    public $AdmissionId;

    public function mount($id = null){
       
        if($id){

            $StudentInfoQuery = StudentInfo::find($id);
            $this->AdmissionId=$StudentInfoQuery->id;
            $this->class_name_id=$StudentInfoQuery->class_name_id;
            $this->group_id=$StudentInfoQuery->group_id;
            $this->medium_id=$StudentInfoQuery->medium_id;
            $this->section_id=$StudentInfoQuery->section_id;
            $this->roll=$StudentInfoQuery->roll;
           
            $ParentQuery = ParentInfo::whereStudentId($StudentInfoQuery->student_id)->first();
            $this->father_name = $ParentQuery->father_name;
            $this->mother_name = $ParentQuery->mother_name;
            $this->father_occupation = $ParentQuery->father_occupation;
            $this->mother_occupation = $ParentQuery->mother_occupation;
            $this->phone = $ParentQuery->phone;
            $this->nationality = $ParentQuery->nationality;
            $this->present_address = $ParentQuery->present_address;
            $this->permanent_address = $ParentQuery->permanent_address;
           
            $StudentQuery = Student::find($StudentInfoQuery->student_id);
            $this->first_name = $StudentQuery->first_name;
            $this->last_name = $StudentQuery->last_name;
            $this->gender = $StudentQuery->gender;
            $this->dob = $StudentQuery->dob;
            $this->religion = $StudentQuery->religion;
            $this->email = $StudentQuery->email;

        }
    }
    public function AdmissionConfirm(){
        $this->validate([
            'first_name' => 'required|max:30',
            'last_name' => 'required|max:30',
            'gender' => 'required',
            'dob' => 'required',
            'religion' => 'required',
            'father_name' => 'required|max:30',
            'mother_name' => 'required|max:30',
            'class_name_id' => 'required',
            'roll' => 'required',
        ]);

        DB::transaction(function() {

        if($this->AdmissionId){
            $StudentInfoQuery = StudentInfo::find($this->AdmissionId);
            $StudentQuery = Student::find($StudentInfoQuery->student_id);
            $ParentQuery = ParentInfo::whereStudentId($StudentInfoQuery->student_id)->first();
        }else{
            $StudentQuery = new Student();
            $ParentQuery = new ParentInfo();
            $StudentInfoQuery = new StudentInfo();

            $StudentQuery->user_id = Auth::user()->id;
        }
     
            // Student
            $StudentQuery->first_name = $this->first_name;
            $StudentQuery->last_name = $this->last_name;
            $StudentQuery->gender = $this->gender;
            $StudentQuery->dob = $this->dob;
            $StudentQuery->religion = $this->religion;
            $StudentQuery->email = $this->email;
            $StudentQuery->save();

            // Parent
            $ParentQuery->student_id = $StudentQuery->id;
            $ParentQuery->father_name = $this->father_name;
            $ParentQuery->mother_name = $this->mother_name;
            $ParentQuery->father_occupation = $this->father_occupation;
            $ParentQuery->mother_occupation = $this->mother_occupation;
            $ParentQuery->phone = $this->phone;
            $ParentQuery->nationality = $this->nationality;
            $ParentQuery->present_address = $this->present_address;
            $ParentQuery->permanent_address = $this->permanent_address;
            $ParentQuery->parent_photo = $this->parent_photo;
            $ParentQuery->save();

            // Student Info
            $StudentInfoQuery->student_id = $StudentQuery->id;
            $StudentInfoQuery->class_name_id = $this->class_name_id;
            $StudentInfoQuery->group_id = $this->group_id;
            $StudentInfoQuery->medium_id = $this->medium_id;
            $StudentInfoQuery->section_id = $this->section_id;
            $StudentInfoQuery->roll = $this->roll;

            if($this->student_photo){
                $path = $this->student_photo->store('/public/photo');
                $StudentInfoQuery->student_photo = basename($path);
            }

            $StudentInfoQuery->user_id = Auth::user()->id;
            $StudentInfoQuery->status = $this->status;
            $StudentInfoQuery->save();

            if($StudentQuery && $ParentQuery && $StudentInfoQuery){
              $this->emit('success', [
                  'text' => 'Admission Saved Successfully',
              ]);
            }
            
            $this->reset();
        }); 
    }
    public function render()
    {
        $SelectedClass = null;
        if($this->class_name_id){
           $SelectedClass = ClassName::find($this->class_name_id);
        }
        return view('livewire.student.admission',[
            'classes'=> ClassName::orderBy('id', 'DESC')->get(),
            'countries'=> Country::get(),
            'SelectedClass'=> $SelectedClass
        ]);
    }
}
