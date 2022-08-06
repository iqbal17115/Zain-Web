<?php

namespace App\Http\Livewire\Setting;
use App\Models\Backend\Setting\Group;
use App\Models\Backend\Setting\Medium;
use App\Models\Backend\Setting\ClassName as ClassNameInfo;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ClassName extends Component
{
    public $code;
    public $name;
    public $year;
    public $status=1;
    public $ClassNameId;

    public function ClassNameDelete($id){
        ClassNameInfo::find($id)->delete();
        $this->emit('success', [
            'text' => 'ClassName Deleted Successfully',
        ]);
    }
    public function ClassNameEdit($id){

      $Update = ClassNameInfo::find($id);
      $this->ClassNameId = $id;
      $this->code = $Update->code;
      $this->name = $Update->name;
      $this->year = $Update->year;
      $this->status = $Update->status;
      $this->emit("modal", "ClassModal");

    }
    public function ClassNameSave(){
        $this->validate([
            'code' => 'required',
            'name' => 'required',
            'year' => 'required',
            'status' => 'required',
        ]);
        
        if($this->ClassNameId){
           $Query = ClassNameInfo::find($this->ClassNameId);
        }else{
            $Query = new ClassNameInfo();
        }

        $Query->code = $this->code;
        $Query->name = $this->name;
        $Query->year = $this->year;
        $Query->user_id = Auth::user()->id;
        $Query->status = $this->status;
        $Query->save();

        $this->emit('success', [
            'text' => 'Class C/U Successfully',
        ]);
        $this->emit("modal", "ClassModal");
    }
    public function ClassModal(){
        $this->reset();
        $this->code = 'M'.floor(time() - 999999999);
        $this->emit("modal", "ClassModal");
    } 
    public function render()
    {
        return view('livewire.setting.class-name');
    }
}
