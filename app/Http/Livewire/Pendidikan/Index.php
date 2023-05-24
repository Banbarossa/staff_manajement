<?php

namespace App\Http\Livewire\Pendidikan;

use App\Models\Pendidikan;
use Livewire\Component;

class Index extends Component
{
    public $jenjang,$no_urut;

    protected $rules=[
        'jenjang'=>'required'
    ];

    public function render()
    {
        $data=Pendidikan::orderBy('no_urut','ASC')->get();
        return view('livewire.pendidikan.index',['data'=>$data]);
    }


    public function store(){
        $this->validate();
        Pendidikan::create([
            'jenjang'=>$this->jenjang,
        ]);

        $this->jenjang ='';
        session()->flash('success','Data pendidikan berhasil ditambahkan');
    }

    public function destroy($id){
        pendidikan::find($id)->delete();
        session()->flash('success','Data pendidikan berhasil dihapus');

    }

    public function pendidikanOrder($items){
        foreach($items as $item){
            Pendidikan::find($item['value'])->update([
                'no_urut'=>$item['order']
            ]);
        }
    }
}
