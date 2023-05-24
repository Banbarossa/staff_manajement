<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStaffRequest;
use App\Models\Jabatan;
use App\Models\Pekerjaan;
use App\Models\Pendidikan;
use App\Models\Staff;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function __construct()
    {
        $this->middleware(['isAdmin'])->except(['index','show']);
    }

    public function index()
    {
        $staffs = Staff::where('status',true)->orderBy('nama','ASC')->get();
        return view('staff.index',['staffs'=>$staffs]);
    }

    public function create()
    {
        $pekerjaan = Pekerjaan::orderBy('no_urut','ASC')->get();
        $pendidikan = Pendidikan::orderBy('no_urut','ASC')->get();
        $jabatan = Jabatan::orderBy('no_urut','ASC')->get();
        // dd ($pekerjaan);
        return view('staff.create',[
            'pekerjaan'=>$pekerjaan,
            'pendidikan'=>$pendidikan,
            'jabatan'=>$jabatan
        ]);
    }


    public function store(StoreStaffRequest $request)
    {
  
              // 'tanggal_lahir_istri'=>'date',
              // 'jabatan'=>'',
              // 'alamat_domisili'=>'',
              // 'nama_istri'=>'',
              // 'tempat_lahir_istri'=>'',
              // 'pendidikan_istri'=>'',
              // 'pekerjaan_istri'=>'',
  
        
        if($request->nik_istri){
           $this->validate($request,[
            'nik_istri'=>'digits:16'
           ]);
        }
           
        
        $data = Staff::create([
            'nupl'=>$request->nupl,
            'nama'=>$request->nama,
            'no_kk'=>$request->no_kk,
            'no_nik'=>$request->no_nik,
            'tempat_lahir'=>$request->tempat_lahir,
            'tanggal_lahir'=>$request->tanggal_lahir,
            'pendidikan_terakhir'=>$request->pendidikan_terakhir,
            'lulusan'=>$request->lulusan,
            'tmt'=>$request->tmt,
            'alamat_ktp'=>$request->alamat_ktp,
            'alamat_domisili'=>$request->alamat_domisili,
            'jabatan'=>$request->jabatan,
            'nama_istri'=>$request->nama_istri,
            'nik_istri'=>$request->nik_istri,
            'tempat_lahir_istri'=>$request->tempat_lahir_istri,
            'tanggal_lahir_istri'=>$request->tanggal_lahir_istri,
            'pendidikan_istri'=>$request->pendidikan_istri,
            'pekerjaan_istri'=>$request->pekerjaan_istri,
        ]);

        if(!$data){
            return redirect()->back()->with('error', 'Data gagal di input, peiksa kembali inputan anda');
        }

        return redirect()->route('staff.index')->with('success', 'Data berhasil ditambahakan');

     

    }


    public function show(Staff $staff)
    {
        $data = Staff::where('id', $staff->id)->with('children')->first();
        return view ('staff.staffview',['staff'=>$data]);
    }


    public function edit(Staff $staff)
    {
        $pendidikan= Pendidikan::orderBy('no_urut','ASC')->get();
        $pekerjaan= Pekerjaan::orderBy('no_urut','ASC')->get();
        $jabatan= Jabatan::orderBy('no_urut','ASC')->get();


        return view('staff.editstaff',[
            'staff'=>$staff,
            'pendidikan'=>$pendidikan,
            'pekerjaan'=>$pekerjaan,
            'jabatan'=>$jabatan,
        ]);
    }


    public function update(StoreStaffRequest $request, Staff $staff)
    {
        if($request->nik_istri){
            $this->validate($request,[
             'nik_istri'=>'digits:16'
            ]);
         }

         $data = Staff::where('id',$staff->id)->update([
            'nama'=>$request->nama,
            'no_kk'=>$request->no_kk,
            'no_nik'=>$request->no_nik,
            'tempat_lahir'=>$request->tempat_lahir,
            'tanggal_lahir'=>$request->tanggal_lahir,
            'pendidikan_terakhir'=>$request->pendidikan_terakhir,
            'lulusan'=>$request->lulusan,
            'tmt'=>$request->tmt,
            'alamat_ktp'=>$request->alamat_ktp,
            'alamat_domisili'=>$request->alamat_domisili,
            'jabatan'=>$request->jabatan,
            'nama_istri'=>$request->nama_istri,
            'nik_istri'=>$request->nik_istri,
            'tempat_lahir_istri'=>$request->tempat_lahir_istri,
            'tanggal_lahir_istri'=>$request->tanggal_lahir_istri,
            'pendidikan_istri'=>$request->pendidikan_istri,
            'pekerjaan_istri'=>$request->pekerjaan_istri,
        ]);

        if(!$data){
            return redirect()->back()->with('error', 'Data gagal di ubah, peiksa kembali inputan anda');
        }

        return redirect()->route('staff.index')->with('success', 'berhasil diubah');


    }

 
    public function destroy(Staff $staff)
    {
        //
    }


    public function statuschange(Request $request, $id){
        $data= Staff::find($id);
        if($data->status = true){
            $data->update([
                'status'=>false,
            ]);
        }else{
            $data->update([
                'status'=>true,
            ]);
        }
        

        return redirect()->back()->with('success','Status berhsil diubah');
    }
}
