<?php

namespace App\Http\Livewire\Child;

use App\Models\Child;
use Livewire\Component;
use Illuminate\Support\Facades\URL;

class ChildTable extends Component
{


    public $staff_id;

    public function mount($staff){
        $this->staff_id = $staff->id;
    }


    public function render()
    {

        $children = Child::where('staff_id', $this->staff_id)->get();
        return view('livewire.child.child-table',['children' => $children]);
    }

    public function hapus($id){
        $hapus = Child::find($id)->delete();
        if ($hapus){
            return redirect(URL::previous())->with('success', 'Data berhasil dihapus');
        }
    }
}
