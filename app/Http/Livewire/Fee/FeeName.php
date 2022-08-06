<?php

namespace App\Http\Livewire\Fee;

use App\Models\Fee\FeeName as FeeNameInfo;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class FeeName extends Component
{
    public $code;
    public $name;
    public $year;
    public $status=1;
    public $ClassNameId;

    public function FeeNameDelete($id){
        FeeNameInfo::find($id)->delete();
        $this->emit('success', [
            'text' => 'Fee Name Deleted Successfully',
        ]);
    }
    public function FeeNameEdit($id){

      $Update = FeeNameInfo::find($id);
      $this->ClassNameId = $id;
      $this->code = $Update->code;
      $this->name = $Update->name;
      $this->status = $Update->status;
      $this->emit("modal", "FeeNameModal");

    }
    public function FeeNameSave(){
        $this->validate([
            'code' => 'required',
            'name' => 'required',
            'status' => 'required',
        ]);
        
        if($this->ClassNameId){
           $Query = FeeNameInfo::find($this->ClassNameId);
        }else{
            $Query = new FeeNameInfo();
        }

        $Query->code = $this->code;
        $Query->name = $this->name;
        $Query->user_id = Auth::user()->id;
        $Query->status = $this->status;
        $Query->save();

        $this->emit('success', [
            'text' => 'Fee Name C/U Successfully',
        ]);
        $this->emit("modal", "FeeNameModal");
    }
    public function FeeNameModal(){
        $this->reset();
        $this->code = 'FN'.floor(time() - 999999999);
        $this->emit("modal", "FeeNameModal");
    } 
    public function render()
    {
        return view('livewire.fee.fee-name');
    }
}
