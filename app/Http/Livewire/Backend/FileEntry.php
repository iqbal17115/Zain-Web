<?php

namespace App\Http\Livewire\Backend;

use App\Models\Backend\FileEntry as FileEntryInfo;
use Livewire\Component;

class FileEntry extends Component
{
    public $code;
    public $name;
    public $FileEntryId;

    public function PersonDelete($id){
        FileEntryInfo::find($id)->delete();
        $this->emit('success', [
            'text' => 'File Deleted Successfully',
        ]);
    }
    public function PersonEdit($id){

      $Update = FileEntryInfo::find($id);
      $this->FileEntryId = $id;
      $this->code = $Update->code;
      $this->name = $Update->name;
      $this->emit("modal", "PersonModal");

    }
    public function ClassNameSave(){
        $this->validate([
            'code' => 'required',
            'name' => 'required',
        ]);
        
        if($this->FileEntryId){
           $Query = FileEntryInfo::find($this->FileEntryId);
        }else{
            $Query = new FileEntryInfo();
        }

        $Query->code = $this->code;
        $Query->name = $this->name;
        $Query->save();

        $this->emit('success', [
            'text' => 'File C/U Successfully',
        ]);
        $this->emit("modal", "PersonModal");
    }
    public function PersonModal(){
        $this->reset();
        $this->code = 'F'.floor(time() - 999999999);
        $this->emit("modal", "PersonModal");
    } 
    public function render()
    {
        return view('livewire.backend.file-entry');
    }
}
