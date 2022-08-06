<?php

namespace App\Http\Livewire\Setting;
use App\Models\Backend\Setting\Group;
use App\Models\Backend\Setting\ClassName;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Department extends Component
{
    public $code;
    public $name;
    public $class_name_id;
    public $status=1;
    public $DepartmentId;

    public function GroupDelete($id){
        Group::find($id)->delete();
        $this->emit('success', [
            'text' => 'Group Deleted Successfully',
        ]);
    }
    public function GroupEdit($id){

      $Update = Group::find($id);
      $this->DepartmentId = $id;
      $this->code = $Update->code;
      $this->name = $Update->name;
      $this->class_name_id = $Update->class_name_id;
      $this->status = $Update->status;
      $this->emit("modal", "DepartmentModal");

    }
    public function GroupSave(){
        $this->validate([
            'code' => 'required',
            'name' => 'required',
            'class_name_id' => 'required',
            'status' => 'required',
        ]);
        
        if($this->DepartmentId){
           $Query = Group::find($this->DepartmentId);
        }else{
            $Query = new Group();
        }

        $Query->code = $this->code;
        $Query->name = $this->name;
        $Query->class_name_id = $this->class_name_id;
        $Query->status = $this->status;
        $Query->user_id = Auth::user()->id;
        $Query->save();

        $this->emit('success', [
            'text' => 'Group C/U Successfully',
        ]);
        $this->emit("modal", "DepartmentModal");
    }
    public function DepartmentModal(){
        $this->reset();
        $this->code = 'G'.floor(time() - 999999999);
        $this->emit("modal", "DepartmentModal");
    }
    public function render()
    {
        return view('livewire.setting.department', [
            'classes'=>ClassName::get()
        ]);
    }
}
