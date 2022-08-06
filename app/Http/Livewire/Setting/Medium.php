<?php

namespace App\Http\Livewire\Setting;

use App\Models\Backend\Setting\ClassName;
use App\Models\Backend\Setting\Medium as MediumInfo;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Medium extends Component
{
    public $code;
    public $name;
    public $class_name_id;
    public $status=1;
    public $MediumId;

    public function MediumDelete($id){
        MediumInfo::find($id)->delete();
        $this->emit('success', [
            'text' => 'Medium Deleted Successfully',
        ]);
    }
    public function MediumEdit($id){

      $Update = MediumInfo::find($id);
      $this->MediumId = $id;
      $this->code = $Update->code;
      $this->name = $Update->name;
      $this->class_name_id = $Update->class_name_id;
      $this->status = $Update->status;
      $this->emit("modal", "MediumMModal");

    }
    public function MediumSave(){
        $this->validate([
            'code' => 'required',
            'name' => 'required',
            'status' => 'required',
        ]);
        
        if($this->MediumId){
           $Query = MediumInfo::find($this->MediumId);
        }else{
            $Query = new MediumInfo();
        }

        $Query->code = $this->code;
        $Query->name = $this->name;
        $Query->class_name_id = $this->class_name_id;
        $Query->status = $this->status;
        $Query->user_id = Auth::user()->id;
        $Query->save();

        $this->emit('success', [
            'text' => 'Medium C/U Successfully',
        ]);
        $this->emit("modal", "MediumMModal");
    }
    public function MediumModal(){
        $this->reset();
        $this->code = 'M'.floor(time() - 999999999);
        $this->emit("modal", "MediumMModal");
    }
    public function render()
    {
        return view('livewire.setting.medium', [
            'classes'=>ClassName::get()
        ]);
    }
}
