<?php

namespace App\Http\Livewire\Backend;

use App\Models\Backend\Person as PersonInfo;
use Livewire\Component;

class Person extends Component
{
    public $code;
    public $name;
    public $designation;
    public $ClassNameId;

    public function PersonDelete($id){
        PersonInfo::find($id)->delete();
        $this->emit('success', [
            'text' => 'Person Deleted Successfully',
        ]);
    }
    public function PersonEdit($id){

      $Update = PersonInfo::find($id);
      $this->ClassNameId = $id;
      $this->code = $Update->code;
      $this->name = $Update->name;
      $this->designation = $Update->designation;
      $this->emit("modal", "PersonModal");

    }
    public function ClassNameSave(){
        $this->validate([
            'code' => 'required',
            'name' => 'required',
            'designation' => 'required',
        ]);
        
        if($this->ClassNameId){
           $Query = PersonInfo::find($this->ClassNameId);
        }else{
            $Query = new PersonInfo();
        }

        $Query->code = $this->code;
        $Query->name = $this->name;
        $Query->designation = $this->designation;
        $Query->save();

        $this->emit('success', [
            'text' => 'Person C/U Successfully',
        ]);
        $this->emit("modal", "PersonModal");
    }
    public function PersonModal(){
        $this->reset();
        $this->code = 'P'.floor(time() - 999999999);
        $this->emit("modal", "PersonModal");
    } 
    public function render()
    {
        return view('livewire.backend.person');
    }
}
