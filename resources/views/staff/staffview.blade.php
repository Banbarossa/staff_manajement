@extends('layouts.app')
@section('content')

@push('myStyle')
<style>
  table{
    table-layout: fixed;
  }
  table td {
      word-wrap: break-word;
      overflow-wrap: break-word;
    }
  /* .wrap-text {
      word-wrap: break-word !important;
    } */
</style>
    
@endpush

<x-page-title>
  <div class="col-auto my-auto">
    <div class="h-100">
        <h5 class="mb-1">
            {{ucFirst($staff->nama)}}
        </h5>
        <div class="text-sm text-secondary">
          <small>{{$staff->jabatan}}</small>
        </div>
    </div>
</div>
<div class="col-lg-2 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
    <div class="nav-wrapper position-relative end-0">
        <ul class="nav nav-pills nav-fill p-1 bg-transparent" role="tablist">
          @if (auth()->user()->role =='admin')
            <li class="nav-item">
              <a href="{{route('staff.edit',$staff->id)}}" class="btn btn-primary">{{__('Edit Data')}}</a>
            </li>
          @endif
            
        </ul>
    </div>
</div>
</x-page-title>

<div class="container-fluid py-4">
  {{-- <div class="row container">
    <div class="col-12 col-xl-7">
      <div class="card h-100">
        <div class="card-header pb-0 p-3">
          <div class="row">
            <div class="col-md-8 d-flex align-items-center">
              <h6 class="mb-0">Profile Information</h6>
            </div>
            <div class="col-md-4 text-end">
              <a href="javascript:;">
                <i class="fas fa-user-edit text-secondary text-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Profile"></i>
              </a>
            </div>
          </div>
        </div>
        <div class="card-body p-3">
          <hr class="horizontal gray-light my-2">
          <ul class="list-group">
            <li class="list-group-item border-0 ps-0 pt-0 text-sm d-flex justify-content-between">
              <span><strong class="text-dark">Nama:</strong> &nbsp; {{ucFirst($staff->nama)}}</span>
              <p class="mb-0 {{$staff->status==false ?'badge badge-sm border-0 bg-danger text-white' :'text-secondary '}} text-sm">{{$staff->status==true ?'Active' :'Non Aktive'}}</p>
            </li>
            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">NUPL:</strong> &nbsp; (44) 123 1234 123</li>
            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Email:</strong> &nbsp; alecthompson@mail.com</li>
            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Alamat KTP:</strong> &nbsp; {{$staff->alamat_ktp}}</li>
            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Alamat Domisili:</strong> &nbsp; {{$staff->alamat_domisili}}</li>
            <li class="list-group-item border-0 ps-0 pb-0">
              <strong class="text-dark text-sm">Social:</strong> &nbsp;
              <a class="btn btn-facebook btn-simple mb-0 ps-1 pe-2 py-0" href="javascript:;">
                <i class="fab fa-facebook fa-lg"></i>
              </a>
              <a class="btn btn-twitter btn-simple mb-0 ps-1 pe-2 py-0" href="javascript:;">
                <i class="fab fa-twitter fa-lg"></i>
              </a>
              <a class="btn btn-instagram btn-simple mb-0 ps-1 pe-2 py-0" href="javascript:;">
                <i class="fab fa-instagram fa-lg"></i>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div> --}}
  


    <div class="row container">
      <div class="col-12">
        @if(session('success'))
          <x-alert-success>
            {{session('success')}}
          </x-alert-success>
        @endif
      </div>

      <div class="col-12 col-lg-7">
        <div class="">
          <div class="card mb-4">
            <div class="card-header pb-0 d-flex justify-content-between mb-3">
                <h4 class="text-primary">{{ucFirst($staff->nama)}}</h4>
                <h6 class="text-secondary">Detail Karyawan</h6>
            </div>
            <div class="card-body px-3 pt-0 pb-2">
                <div class="p-0 row">
                    <div class="mt-2">
                      <ul class="list-group">
                        <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Status:</strong>
                          <div class="d-flex justify-content-between">
                            <p class="mb-0 text-sm {{$staff->status==false ?'badge badge-sm border-0 bg-danger text-white' :'text-secondary '}}">{{$staff->status==true ?'Active' :'Non Aktive'}}</p>
                            @if ($staff->status = true)
                              <form action="{{route('status.change',$staff->id)}}" method="post" class="">
                                @csrf
                                @method('put')
                                <button type="submit" value="1" class="badge badge-md bg-gradient-danger border-0 d-inline">Non Aktifkan</button>
                              </form>
                            @endif
                          </div>
                          
                        </li>
                        <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">NUPL:</strong> 
                          <p class="text-sm text-gray">{{$staff->nupl}}</p>
                        </li>
                        <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Nama:</strong> 
                          <p class="text-sm text-gray">{{$staff->nama}}</p>
                        </li>
                        <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">No Kartu Keluarga:</strong> 
                          <p class="text-sm text-gray">{{$staff->no_kk}}</p>
                        </li>
                        <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">No KTP:</strong> 
                          <p class="text-sm text-gray">{{$staff->no_nik}}</p>
                        </li>
                        <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Tempat lahir:</strong> 
                          <p class="text-sm text-gray">{{$staff->tempat_lahir}}</p>
                        </li>
                        <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Tanggal Lahir | Usia:</strong> 
                          <p class="text-sm text-gray">{{\Carbon\Carbon::parse($staff->tanggal_lahir)->format('d-M-Y')}} | <span class="ml-auto"><small class="text-primary">{{\Carbon\Carbon::parse($staff->tanggal_lahir)->diffForHumans()}}</small></span></p>
                        </li>
                        <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Pendidikan Terakhir:</strong> 
                          <p class="text-sm text-gray">{{$staff->pendidikan_terakhir}}</p>
                        </li>
                        <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Lulusan:</strong> 
                          <p class="text-sm text-gray">{{$staff->lulusan}}</p>
                        </li>
                        <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">TMT | Lama Kerja:</strong> 
                        <p class="text-sm text-gray">{{\Carbon\Carbon::parse($staff->tmt)->format('d-M-Y')}} | <span class="ml-auto"><small class="text-primary">{{\Carbon\Carbon::parse($staff->tmt)->diffForHumans()}}</small></span></p>
                        </li>
                        <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Jabatan:</strong> 
                        <p class="text-sm text-gray">{{$staff->jabatan}}</p>
                        </li>
                        <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Alamat KTP:</strong> 
                        <p class="text-sm text-gray">{{$staff->alamat_ktp}}</p>
                        </li>
                        <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Alamat Domisili:</strong> 
                        <p class="text-sm text-gray">{{$staff->alamat_domisili}}</p>
                        </li>
                        <li class="list-group-item border-0 ps-0 text-sm">
                            <strong class="text-dark">Jumlah Anak:</strong> 
                            <div class="d-flex justify-content-between">
                              <p class="text-sm text-gray">{{$staff->children->count()}} Orang</p>
                              @if (auth()->user()->role == 'admin')
                                  <button class="badge badge-sm border-0 bg-gradient-secondary d-inline" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasAdd" aria-controls="offcanvasAdd">Tambah data anak</button>                           
                              @endif
                            </div>
                            

                        </li>
                      </ul>
                    </div>
                  
                </div>
            </div>
          </div>
        </div>
      </div>

        

      {{-- identitas Istri start--}}
      <div class="col-12 col-lg-5">
          <div class="card mb-4">
          <div class="card-header pb-0 d-flex justify-content-between mb-3">
              <h6 class="text-secondary">Detail Istri</h6>
          </div>
          <div class="card-body px-3 pt-0 pb-2">
            <div class="p-0 row">
              <div class="mt-2">
                <ul class="list-group">
                  
                  <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Nama Istri:</strong> 
                    <p class="text-sm text-gray">{{$staff->nama_istri}}</p>
                  </li>
                  <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">No KTP:</strong> 
                    <p class="text-sm text-gray">{{$staff->nik_istri}}</p>
                  </li>
                  <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Tempat Lahir:</strong> 
                    <p class="text-sm text-gray">{{$staff->tempat_lahir_istri}}</p>
                  </li>
                  <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Tanggal Lahir:</strong> 
                    <p class="text-sm text-gray">{{$staff->tanggal_lahir_istri}}</p>
                  </li>
                  <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Pendidikan:</strong> 
                    <p class="text-sm text-gray">{{$staff->pendidikan_istri}}</p>
                  </li>
                  <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Pekerjaan:</strong> 
                    <p class="text-sm text-gray">{{$staff->pekerjaan_istri}}</p>
                  </li>
                </ul>
              </div>
            
          </div>

          </div>
          </div>
      </div>
      {{-- identitas Istri end--}}

    </div>
    <div class="row">
      <livewire:child.child-create :staff="$staff"/>
    </div>
  
    
  
    <div class="row container"  x-data="{open : false}">
      <div class="col-12">
        <div  @click="open = ! open"class="alert alert-warning alert-dismissible fade show d-flex align-items-center justify-content-center position-relative" role="alert">
          <button class="border-0 bg-transparent"><i class="bi bi-arrow-down-circle-fill"></i> Lihat detail data Anak click disini <i class="bi bi-arrow-down-circle-fill"></i></button>
        </div>
        <div class=" p-0" x-show="open">

          <livewire:child.child-table :staff="$staff"/>



        </div>
      </div>
    </div>



    

<x-footer/>
</div>

{{-- Edit data --}}
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasRightLabel">Offcanvas right</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <livewire:child.child-edit/>
  </div>
</div>



@push('myScript')
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
@endpush
    
    
@endsection