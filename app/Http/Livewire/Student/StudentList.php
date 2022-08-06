<?php

namespace App\Http\Livewire\Student;

use App\Models\Backend\Student\StudentInfo;
use App\Models\Backend\Student\Student;
use App\Models\Backend\Student\ParentInfo;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class StudentList extends Component
{
    public function StudentDelete($id){

        DB::transaction(function() use($id) {

        $StudentInfo = StudentInfo::find($id);
        $StudentId = $StudentInfo->student_id;
        StudentInfo::find($id)->delete();
        $StudentInfo = StudentInfo::find($id);
        if(!$StudentInfo){
            Student::find($StudentId)->delete();
            ParentInfo::whereStudentId($StudentId)->delete();
        }

        $this->emit('success', [
            'text' => 'Student Deleted Successfully!',
        ]);
       }); 
    }
    public function render()
    {
        return view('livewire.student.student-list');
    }
}
