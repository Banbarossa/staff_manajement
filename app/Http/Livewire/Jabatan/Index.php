<?php

namespace App\Http\Livewire\Jabatan;

use App\Models\Jabatan;
use Livewire\Component;

class Index extends Component
{
    public $jabatan,$no_urut;

    protected $rules=[
        'jabatan'=>'required'
    ];


    public function render()
    {
        $data=Jabatan::orderBy('no_urut','ASC')->get();
        return view('livewire.jabatan.index',['data'=>$data]);
    }

    public function store(){
        $this->validate();
        Jabatan::create([
            'jabatan'=>$this->jabatan,
        ]);

        $this->jabatan ='';
        session()->flash('success','Data jabatan berhasil ditambahkan');
    }

    public function destroy($id){
        Jabatan::find($id)->delete();
        session()->flash('success','Data jabatan berhasil dihapus');

    }

    public function JabatanOrder($items){
        foreach ($items as $item){
            Jabatan::find($item['value'])->update([
                'no_urut'=>$item['order']
            ]);
        }
    }
}
