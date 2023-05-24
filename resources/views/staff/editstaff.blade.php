@extends('layouts.app')
@section('content')


<div class="container-fluid py-4">

    <form action="{{route('staff.update',$staff->id)}}" method="post">
    @csrf
    @method('put')
        <div class="row">
            
                <div class="col-12 col-lg-7">
                    <div class="card mb-4">
                    <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                        <h6>Edit Data {{$staff->name}}</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="px-4 py-4">
                            <div class="mb-3">
                                <label for="nupl">{{__('NUPL')}}</label>
                                <input type="text" id="nupl" name="nupl" class="form-control @error('nupl') is-invalid @enderror" placeholder="NUPL" value="{{$staff->nupl}}" disabled>
                                @error('nupl')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="nama">{{__('Nama')}}</label>
                                <input type="text" id="nama" name="nama" class="form-control @error('nama') is-invalid @enderror" placeholder="Nama Karyawan" value="{{old('nama')?? $staff->nama}}">
                                @error('nama')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <div class="row">
                                    <div class="col-6">
                                        <label for="no_kk">{{__('Nomor kartu Keluarga')}}</label>
                                        <input type="number" id="no_kk" name="no_kk" class="form-control @error('no_kk') is-invalid @enderror" placeholder="Nomor kartu Keluarga" value="{{old('no_kk')?? $staff->no_kk}}">
                                        @error('no_kk')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="col-6">
                                        <label for="no_nik">{{__('Nomor Induk Kependudukan')}}</label>
                                        <input type="number" id="no_nik" name="no_nik" class="form-control @error('no_nik') is-invalid @enderror" placeholder="Nomor Induk Kependudukan" value="{{old('no_nik')?? $staff->no_nik}}">
                                        @error('no_nik')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="row">
                                    <div class="col-6">
                                        <label for="tempat_lahir">{{__('Tempat Lahir')}}</label>
                                        <input type="text" id="tempat_lahir" name="tempat_lahir" class="form-control @error('tempat_lahir') is-invalid @enderror" placeholder="Tempat Lahir" value="{{old('tempat_lahir')?? $staff->tempat_lahir}}">
                                        @error('tempat_lahir')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="col-6">
                                        <label for="tanggal_lahir">{{__('Tanggal Lahir')}}</label>
                                        <input type="date" id="tanggal_lahir" name="tanggal_lahir" class="form-control @error('tanggal_lahir') is-invalid @enderror" placeholder="Tanggal Lahir" value="{{old('tanggal_lahir')?? $staff->tanggal_lahir}}">
                                        @error('tanggal_lahir')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                        @enderror
                                    </div>
                                </div>                           
                            </div>

                            <div class="mb-3">
                                <label for="pendidikan_terakhir">{{__('Pendidikan Terakhir')}}</label>

                                <select name="pendidikan_terakhir" id="pendidikan_terakhir" class="form-select @error('pendidikan_terakhir') is-invalid @enderror">
                                    <option value="">Pilih Pendidikan Terakhir</option>
                                    @foreach ($pendidikan as $item)
                                        <option value="{{$item->jenjang}}" @if ($staff->pendidikan_terakhir == $item->jenjang) {{'selected'}}
                                            
                                        @endif>{{$item->jenjang}}</option>
                                        
                                    @endforeach
                                </select>
                                
                                @error('pendidikan_terakhir')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="lulusan">{{__('Lulusan')}}</label>
                                <input type="text" id="lulusan" name="lulusan" class="form-control @error('lulusan') is-invalid @enderror" placeholder="Lulusan" value="{{old('lulusan')?? $staff->lulusan}}">
                                @error('lulusan')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="tmt">{{__('Tanggal Mulai Tugas')}}</label>
                                <input type="date" id="tmt" name="tmt" class="form-control @error('tmt') is-invalid @enderror" placeholder="Tanggal Mulai Tugas" value="{{old('tmt')?? $staff->tmt}}">
                                @error('tmt')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="jabatan">{{__('Jabatan')}}</label>

                                <select name="jabatan" id="jabatan" class="form-select @error('jabatan') is-invalid @enderror">
                                    <option value="">Pilih jabatan</option>
                                    @foreach ($jabatan as $item)
                                        <option value="{{$item->jabatan}}" @if ($staff->jabatan == $item->jabatan) {{'selected'}}
                                            
                                        @endif>{{$item->jabatan}}</option>
                                        
                                    @endforeach
                                </select>
                                
                                @error('jabatan')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="alamat_ktp">{{__('Alamat KTP')}}</label>

                                <textarea class="form-control @error('alamat_ktp') is-invalid @enderror" name="alamat_ktp" id="alamat_ktp" rows="3">{{old('alamat_ktp')?? $staff->alamat_ktp}}</textarea>
                                
                                @error('alamat_ktp')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="alamat_domisili">{{__('Alamat Domisili')}}</label>

                                <textarea class="form-control @error('alamat_domisili') is-invalid @enderror" name="alamat_domisili" id="alamat_domisili" rows="3">{{old('alamat_domisili')?? $staff->alamat_domisili}}</textarea>
                                
                                @error('alamat_domisili')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>



                        </div>
                    
                    </div>
                    </div>
                </div>


                <div class="col-12 col-lg-5">
                    <div class="card mb-4">
                        <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                            <h6>Data Istri</h6>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="px-4 py-4">

                                <div class="mb-3">
                                    <label for="nama_istri">{{__('Nama Istri')}}</label>
                                    <input type="text" id="nama_istri" name="nama_istri" class="form-control @error('nama_istri') is-invalid @enderror" placeholder="Nama Istri" value="{{old('nama_istri')?? $staff->nama_istri}}">
                                    @error('nama_istri')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="nik_istri">{{__('No Induk Kependudukan')}}</label>
                                    <input type="text" id="nik_istri" name="nik_istri" class="form-control @error('nik_istri') is-invalid @enderror" placeholder="No Induk Kependudukan" value="{{old('nik_istri')?? $staff->nik_istri}}">
                                    @error('nik_istri')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="tempat_lahir_istri">{{__('Tempat lahir')}}</label>
                                    <input type="text" id="tempat_lahir_istri" name="tempat_lahir_istri" class="form-control @error('tempat_lahir_istri') is-invalid @enderror" placeholder="Tempat Lahir" value="{{old('tempat_lahir_istri')?? $staff->tempat_lahir_istri}}">
                                    @error('tempat_lahir_istri')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="tanggal_lahir_istri">{{__('Tanggal lahir')}}</label>
                                    <input type="date" id="tanggal_lahir_istri" name="tanggal_lahir_istri" class="form-control @error('tanggal_lahir_istri') is-invalid @enderror" placeholder="Tanggal Lahir" value="{{old('tanggal_lahir_istri')?? $staff->tanggal_lahir_istri}}">
                                    @error('tanggal_lahir_istri')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="pendidikan_istri">{{__('Pendidikan Terakhir')}}</label>
    
                                    <select name="pendidikan_istri" id="pendidikan_istri" class="form-select @error('pendidikan_istri') is-invalid @enderror">
                                        <option value="">Pilih Pendidikan Terakhir</option>
                                        @foreach ($pendidikan as $item)
                                        <option value="{{$item->jenjang}}" @if ($staff->pendidikan_istri == $item->jenjang) {{'selected'}}
                                            
                                        @endif>{{$item->jenjang}}</option>
                                        
                                    @endforeach
                                    </select>
                                    
                                    @error('pendidikan_istri')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="pekerjaan_istri">{{__('Pekerjaan')}}</label>
    
                                    <select name="pekerjaan_istri" id="pekerjaan_istri" class="form-select @error('pekerjaan_istri') is-invalid @enderror">
                                        <option value="">Pilih Pekerjaan</option>
                                        @foreach ($pekerjaan as $item)
                                            <option value="{{$item->pekerjaan}}" @if ($staff->pekerjaan_istri == $item->pekerjaan) {{'selected'}}
                                                
                                            @endif>{{$item->pekerjaan}}</option>
                                        @endforeach
                                    </select>
                                    
                                    @error('pekerjaan_istri')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>


                                <div class="d-flex justify-content-end mt-3">
                                    <button type="submit" class="btn btn-primary px-4">{{__('Edit Data')}}</button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            
        </div>
    </form>

    <x-footer/>

  
</div>




    
@endsection