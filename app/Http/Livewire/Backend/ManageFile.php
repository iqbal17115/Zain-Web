<?php

namespace App\Http\Livewire\Backend;

use App\Models\Backend\Person;
use App\Models\Backend\FileEntry;
use App\Models\Backend\ManageFile as ManageFileInfo;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ManageFile extends Component
{
    public $person_id;
    public $file_entry_id;
    public $date;
    public $status;
    public $note;
    public $FileManageId;

    public function PersonDelete($id){
        ManageFileInfo::find($id)->delete();
        $this->emit('success', [
            'text' => 'File Deleted Successfully',
        ]);
    }
    public function PersonEdit($id){

      $Update = ManageFileInfo::find($id);
      $this->FileManageId = $id;
      $this->person_id = $Update->person_id;
      $this->file_entry_id = $Update->file_entry_id;
      $this->date = $Update->date;
      $this->status = $Update->status;
      $this->note = $Update->note;
      $this->emit("modal", "ManageFileModal");

    }
    public function ClassNameSave(){
        $this->validate([
            'person_id' => 'required',
            'file_entry_id' => 'required',
            'date' => 'required',
            'status' => 'required',
        ]);
        DB::transaction(function() {

        if($this->FileManageId){
           $Query = ManageFileInfo::find($this->FileManageId);
        }else{
            ManageFileInfo::whereFileEntryId($this->file_entry_id)
                            ->whereActiveStatus('Active')->update(['active_status'=>'Inactive']);
            $Query = new ManageFileInfo();
            
            $Query->active_status = 'Active';
        }

        $Query->person_id = $this->person_id;
        $Query->file_entry_id = $this->file_entry_id;
        $Query->date = $this->date;
        $Query->status = $this->status;
        $Query->note = $this->note;
        $Query->save();

            $this->emit('success', [
                'text' => 'File C/U Successfully',
            ]);
        $this->emit("modal", "ManageFileModal");
       });
    }
    public function ManageFileModal(){
        $this->reset();
        $this->emit("modal", "ManageFileModal");
    } 
    public function render()
    {
        return view('livewire.backend.manage-file', [
            'persons'=>Person::orderBy('id', 'DESC')->get(),
            'files'=>FileEntry::orderBy('id', 'DESC')->get()
        ]);
    }
}
