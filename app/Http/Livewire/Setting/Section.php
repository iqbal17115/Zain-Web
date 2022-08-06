<?php

namespace App\Http\Livewire\Setting;

use App\Models\Backend\Setting\ClassName;
use App\Models\Backend\Setting\Section as SectionInfo;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Section extends Component
{
    public $code;
    public $name;
    public $class_name_id;
    public $status=1;
    public $SectionId;

    public function SectionDelete($id){
        SectionInfo::find($id)->delete();
        $this->emit('success', [
            'text' => 'Section Deleted Successfully',
        ]);
    }
    public function SectionEdit($id){

      $Update = SectionInfo::find($id);
      $this->SectionId = $id;
      $this->code = $Update->code;
      $this->name = $Update->name;
      $this->class_name_id = $Update->class_name_id;
      $this->status = $Update->status;
      $this->emit("modal", "ClassModal");

    }
    public function SectionSave(){
        $this->validate([
            'code' => 'required',
            'name' => 'required',
            'class_name_id' => 'required',
            'status' => 'required',
        ]);
        
        if($this->SectionId){
           $Query = SectionInfo::find($this->SectionId);
        }else{
            $Query = new SectionInfo();
        }

        $Query->code = $this->code;
        $Query->name = $this->name;
        $Query->class_name_id = $this->class_name_id;
        $Query->user_id = Auth::user()->id;
        $Query->status = $this->status;
        $Query->save();

        $this->emit('success', [
            'text' => 'Section C/U Successfully',
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
        return view('livewire.setting.section',[
            'classes'=>ClassName::get()
        ]);
    }
}
