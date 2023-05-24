<?php

namespace App\Http\Livewire\Pekerjaaan;

use App\Models\Pekerjaan;
use Livewire\Component;

class Index extends Component
{
    public $pekerjaan,$no_urut;

    protected $rules=[
        'pekerjaan'=>'required'
    ];

    public function render()
    {
        $data=Pekerjaan::orderBy('no_urut','ASC')->get();
        return view('livewire.pekerjaaan.index',['data'=>$data]);
    }

    public function store(){
        $this->validate();
        Pekerjaan::create([
            'pekerjaan'=>$this->pekerjaan,
        ]);

        $this->pekerjaan ='';
        session()->flash('success','Data Pekerjaan berhasil ditambahkan');
    }

    public function destroy($id){
        Pekerjaan::find($id)->delete();
        session()->flash('success','Data Pekerjaan berhasil dihapus');

    }

    public function PekerjaanOrder($items){
        // dd ($items);
        foreach ($items as $item){
            Pekerjaan::find($item['value'])->update([
                'no_urut'=>$item['order']
            ]);
            
        }

       

    }


}

    
