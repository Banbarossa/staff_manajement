<?php

namespace App\Http\Livewire\Child;

use App\Models\Child;
use App\Models\Pendidikan;
use Illuminate\Cache\RedisTagSet;
use Illuminate\Support\Facades\URL as FacadesURL;
use Livewire\Component;
use PharIo\Manifest\Url;

class ChildCreate extends Component
{
    public $nama_anak,$nik_anak,$tempat_lahir_anak,$tanggal_lahir_anak,$jenis_kelamin,$pendidikan;
    public $previous;
    public $ppdk;
    
    public $staff_id;

    protected $rules =[
        'nama_anak'=>'required|min:4',
        'nik_anak'=>'digits:16'
    ];

    public function mount($staff){
        $this->staff_id =$staff->id;
        $this->previous = FacadesURL::previous().'/'.$staff->id;
        $this->pddk = Pendidikan::orderBy('no_urut','ASC')->get();
    }
   

    public function render()
    {

        return view('livewire.child.child-create');
    }


    public function store(){
        $this->validate();

        $stored = Child::create([
            'nama_anak'=>$this->nama_anak,
            'staff_id'=>$this->staff_id,
            'nik_anak'=>$this->nik_anak,
            'tempat_lahir_anak'=>$this->tempat_lahir_anak,
            'tanggal_lahir_anak'=>$this->tanggal_lahir_anak,
            'jenis_kelamin'=>$this->jenis_kelamin,
            'pendidikan'=>$this->pendidikan,
        ]);

        return redirect($this->previous)->with('success', 'Data berhasil ditambahkan');
        $this->clear();

    }


    public function clear(){
        [
        $this->nama_anak='',
        $this->nik_anak='',
        $this->tempat_lahir_anak='',
        $this->tanggal_lahir_anak='',
        $this->jenis_kelamin='',
        $this->pendidikan='',
        ];
    }
   
}
