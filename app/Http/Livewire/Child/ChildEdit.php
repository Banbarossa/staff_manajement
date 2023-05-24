<?php

namespace App\Http\Livewire\Child;

use App\Models\Child;
use Livewire\Component;
use Illuminate\Support\Facades\URL;


class ChildEdit extends Component
{

    public $nama_anak,$nik_anak,$tempat_lahir_anak,$tanggal_lahir_anak,$jenis_kelamin,$pendidikan;
    public $previous;
    public $child_id;
    public $staff_id;
    public $listeners = ['getId'=>'getId'];

    protected $rules =[
        'nama_anak'=>'required|min:4',
        'nik_anak'=>'digits:16'
    ];


    public function mount(){
        $this->previous = URL::previous();
    }


    public function render()
    {
        return view('livewire.child.child-edit');
    }

    public function getId($id){
        $data = Child::find($id);
        $this->nama_anak =$data->nama_anak;
        $this->nik_anak =$data->nik_anak;
        $this->tempat_lahir_anak =$data->tempat_lahir_anak;
        $this->tanggal_lahir_anak =$data->tanggal_lahir_anak;
        $this->jenis_kelamin =$data->jenis_kelamin;
        $this->pendidikan =$data->pendidikan;
        
        $this->child_id = $id;
        $this->staff_id = $data->staff_id;
    }


    public function store(){
        $this->validate();

        Child::find($this->child_id)->update([
            'nama_anak'=> $this->nama_anak,
            'nik_anak'=>$this->nik_anak,
            'tempat_lahir_anak'=>$this->tempat_lahir_anak,
            'tanggal_lahir_anak'=>$this->tanggal_lahir_anak,
            'jenis_kelamin'=>$this->jenis_kelamin,
            'pendidikan'=>$this->pendidikan,
        ]);

        return redirect($this->previous)->with('success', 'Data Berhasil diubah');
    }
}
