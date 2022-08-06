<?php

namespace App\Http\Livewire\Fee;

use App\Models\Backend\Setting\ClassName;
use App\Models\Backend\Fee\Fee as FeeInfo;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Fee extends Component
{
    public $class_name_id;
    public $medium_id;
    public $group_id;
    public $fee;
    public $status = 1;
    public $FeeId;

    public function FeeEdit($id){
        $UpdateQuery = FeeInfo::find($id);
        $this->FeeId = $UpdateQuery->id;
        $this->class_name_id = $UpdateQuery->class_name_id;
        $this->medium_id = $UpdateQuery->medium_id;
        $this->group_id = $UpdateQuery->group_id;
        $this->fee = $UpdateQuery->fee;
        $this->status = $UpdateQuery->status;
    }
    public function FeeDelete($id){
        FeeInfo::find($id)->delete();
        $this->emit('success', [
            'text' => 'Fee Deleted Successfully',
        ]);
    }
    public function SaveFee(){

        $this->validate([
            'class_name_id' => 'required',
            'fee' => 'required',
        ]);

        $ClassName = ClassName::find($this->class_name_id);
        if(count($ClassName->Group) > 0){
            $this->validate([
                'group_id' => 'required',
            ]);
        }

        if(count($ClassName->Medium) > 0){
            $this->validate([
                'medium_id' => 'required',
            ]);
        }

        if($this->FeeId){
          $Query = FeeInfo::find($this->FeeId);
        }else{
            $Query = new FeeInfo();
            $Query->user_id = Auth::user()->id;
        }
        $Query->class_name_id = $this->class_name_id;
        $Query->medium_id = $this->medium_id;
        $Query->group_id = $this->group_id;
        $Query->fee = $this->fee;
        $Query->status = $this->status;
        $Query->save();

        $this->emit('success', [
            'text' => 'Fee Saved Successfully',
        ]);
    }
    public function render()
    {
        $SelectedClass = null;
        if($this->class_name_id){
           $SelectedClass = ClassName::find($this->class_name_id);
        }
        return view('livewire.fee.fee',[
            'classes'=> ClassName::orderBy('id', 'DESC')->get(),
            'SelectedClass'=> $SelectedClass
        ]);
    }
}
