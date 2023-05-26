<?php

namespace App\Http\Livewire\Staff;

use App\Exports\StaffsExport;
use App\Models\Staff;
use Livewire\Component;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;

class StaffIndex extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search;
    public $limitPage= 20;

    public function render()
    {
        $staffs = Staff::where('status',true)->orderBy('nama','ASC')->paginate($this->limitPage);
        if($this->search !== null ){
            $staffs = Staff::where('status',true)
            ->where('nama','LIKE','%'.$this->search.'%')
            ->orderBy('nama','ASC')
            ->paginate($this->limitPage);
        }

        if(request()->routeis('staff.inactive')){
            $staffs = Staff::where('status',false)->orderBy('nama','ASC')->paginate($this->limitPage);
            if($this->search !== null ){
                $staffs = Staff::where('status',false)
                ->where('nama','LIKE','%'.$this->search.'%')
                ->orderBy('nama','ASC')
                ->paginate($this->limitPage);
            }
        }


        return view('livewire.staff.staff-index',['staffs'=>$staffs]);
    }

    public function export(){
        return Excel::download(new StaffsExport, 'Staff.xlsx');
    }
}
