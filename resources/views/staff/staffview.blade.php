@extends('layouts.app')
@section('content')

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

    <div class="row">
      <div class="col-12">
        @if(session('success'))
          <x-alert-success>
            {{session('success')}}
          </x-alert-success>
        @endif
      </div>

      <div class="col-12 col-lg-7">

          <div class="card mb-4">
          <div class="card-header pb-0 d-flex justify-content-between mb-3">
              <h4 class="text-primary">{{ucFirst($staff->nama)}}</h4>
              <h6 class="text-secondary">Detail Karyawan</h6>
          </div>
          <div class="card-body px-3 pt-0 pb-2">
              <div class="table-stripped p-0">
              <table class="table align-items-center mb-0">
                  <tbody>

                  <tr>  
                      <td width="200px" class="align-middle text-sm">
                        <p class="text-secondary mb-0">Status</p>
                        </td>
                      <td class="align-middle text-sm d-flex justify-content-between align-item-center">

                        <p class="mb-0 {{$staff->status==false ?'badge badge-sm border-0 bg-danger text-white' :'text-secondary '}}">{{$staff->status==true ?'Active' :'Non Aktive'}}</p>

                        <div class="d-flex gap-4">

                          @if ($staff->status ==true && auth()->user()->role == 'admin')
                          <form action="{{route('status.change',$staff->id)}}" method="post" class="">
                            @csrf
                            @method('put')
                            <button type="submit" value="1" class="badge badge-md bg-gradient-danger border-0 d-inline">Non Aktifkan</button>
                          </form>
                          @endif
                        </div>

                        
                      </td>
                  </tr>
                  <tr>  
                      <td width="200px" class="align-middle text-sm">
                      <p class="text-secondary mb-0">N U P L</p>
                      </td>
                      <td class="align-middle text-sm">
                      <p class="text-secondary mb-0">{{$staff->nupl}}</p>
                      </td>
                  </tr>
                  <tr>  
                      <td width="200px" class="align-middle text-sm">
                      <p class="text-secondary mb-0">Nama</p>
                      </td>
                      <td class="align-middle text-sm">
                      <p class="text-secondary mb-0">{{$staff->nama}}</p>
                      </td>
                  </tr>
                  <tr>  
                      <td width="200px" class="align-middle text-sm">
                      <p class="text-secondary mb-0">No Kartu Keluarga</p>
                      </td>
                      <td class="align-middle text-sm">
                      <p class="text-secondary mb-0">{{$staff->no_kk}}</p>
                      </td>
                  </tr>
                  <tr>  
                      <td width="200px" class="align-middle text-sm">
                      <p class="text-secondary mb-0">No KTP</p>
                      </td>
                      <td class="align-middle text-sm">
                      <p class="text-secondary mb-0">{{$staff->no_nik}}</p>
                      </td>
                  </tr>
                  <tr>  
                      <td width="200px" class="align-middle text-sm">
                      <p class="text-secondary mb-0">Tempat lahir</p>
                      </td>
                      <td class="align-middle text-sm">
                      <p class="text-secondary mb-0">{{$staff->tempat_lahir}}</p>
                      </td>
                  </tr>
                  <tr>  
                      <td width="200px" class="align-middle text-sm">
                      <p class="text-secondary mb-0">Tanggal lahir, Usia</p>
                      </td>
                      <td class="align-middle text-sm">
                      <p class="text-secondary mb-0">{{\Carbon\Carbon::parse($staff->tanggal_lahir)->format('d-M-Y')}} | <span class="ml-auto"><small class="text-danger">{{\Carbon\Carbon::parse($staff->tanggal_lahir)->diffForHumans()}}</small></span> </p>
                      </td>
                  </tr>
                  <tr>  
                      <td width="200px" class="align-middle text-sm">
                      <p class="text-secondary mb-0">Pendidikan Terakhir</p>
                      </td>
                      <td class="align-middle text-sm">
                      <p class="text-secondary mb-0">{{$staff->pendidikan_terakhir}}</p>
                      </td>
                  </tr>
                  <tr>  
                      <td width="200px" class="align-middle text-sm">
                      <p class="text-secondary mb-0">Lulusan</p>
                      </td>
                      <td class="align-middle text-sm">
                      <p class="text-secondary mb-0">{{$staff->lulusan}}</p>
                      </td>
                  </tr>
                  <tr>  
                      <td width="200px" class="align-middle text-sm">
                      <p class="text-secondary mb-0">T M T, Lama Kerja</p>
                      </td>
                      <td class="align-middle text-sm">
                      <p class="text-secondary mb-0">{{\Carbon\Carbon::parse($staff->tmt)->format('d-M-Y')}} | <span class="ml-auto"><small class="text-danger">{{\Carbon\Carbon::parse($staff->tmt)->diffForHumans()}}</small></span> </p>
                      </td>
                  </tr>
                  <tr>  
                      <td width="200px" class="align-middle text-sm">
                      <p class="text-secondary mb-0">Jabatan</p>
                      </td>
                      <td class="align-middle text-sm">
                      <p class="text-secondary mb-0">{{$staff->jabatan}}</p>
                      </td>
                  </tr>
                  <tr>  
                      <td width="200px" class="align-middle text-sm">
                      <p class="text-secondary mb-0">Alamat KTP</p>
                      </td>
                      <td class="align-middle text-sm">
                      <p class="text-secondary mb-0">{{$staff->alamat_ktp}}</p>
                      </td>
                  </tr>
                  <tr>  
                      <td width="200px" class="align-middle text-sm">
                      <p class="text-secondary mb-0">Alamat Domisili</p>
                      </td>
                      <td class="align-middle text-sm">
                      <p class="text-secondary mb-0">{{$staff->alamat_domisili}}</p>
                      </td>
                  </tr>
                  <tr>  
                      <td width="200px" class="align-middle text-sm">
                        <p class="text-secondary mb-0">Jumlah Anak</p>
                      </td>
                      <td class="align-middle text-sm d-flex align-items-center justify-content-between">
                        <p class="text-secondary mb-0">{{$staff->children->count()}} Orang</p>
                        @if (auth()->user()->role == 'admin')
                          <button class="border-0 bg-transparent" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasAdd" aria-controls="offcanvasAdd">Tambah data anak</button>                           
                        @endif
                      </td>
                  </tr>
                  

                  </tbody>
              </table>
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
              <div class="table-stripped p-0">
              <table class="table align-items-center mb-0">
                  <tbody>
                      <tr>  
                          <td width="200px" class="align-middle text-sm">
                          <p class="text-secondary mb-0">Nama Istri</p>
                          </td>
                          <td class="align-middle text-sm">
                          <p class="text-secondary mb-0">{{$staff->nama_istri}}</p>
                          </td>
                      </tr>
                      <tr>  
                          <td width="200px" class="align-middle text-sm">
                          <p class="text-secondary mb-0">NIK</p>
                          </td>
                          <td class="align-middle text-sm">
                          <p class="text-secondary mb-0">{{$staff->nik_istri}}</p>
                          </td>
                      </tr>
                      <tr>  
                          <td width="200px" class="align-middle text-sm">
                          <p class="text-secondary mb-0">Tempat Lahir</p>
                          </td>
                          <td class="align-middle text-sm">
                          <p class="text-secondary mb-0">{{$staff->tempat_lahir_istri}}</p>
                          </td>
                      </tr>
                      <tr>  
                          <td width="200px" class="align-middle text-sm">
                          <p class="text-secondary mb-0">Tanggal Lahir</p>
                          </td>
                          <td class="align-middle text-sm">
                          <p class="text-secondary mb-0">{{$staff->tanggal_lahir_istri}}</p>
                          </td>
                      </tr>
                      <tr>  
                          <td width="200px" class="align-middle text-sm">
                          <p class="text-secondary mb-0">Pendidikan</p>
                          </td>
                          <td class="align-middle text-sm">
                          <p class="text-secondary mb-0">{{$staff->pendidikan_istri}}</p>
                          </td>
                      </tr>
                      <tr>  
                          <td width="200px" class="align-middle text-sm">
                          <p class="text-secondary mb-0">Pekerjaan Istri</p>
                          </td>
                          <td class="align-middle text-sm">
                          <p class="text-secondary mb-0">{{$staff->pekerjaan_istri}}</p>
                          </td>
                      </tr>
                  

                  </tbody>
              </table>
              </div>
          </div>
          </div>
      </div>
      {{-- identitas Istri end--}}

    </div>
    <div class="row">
      <livewire:child.child-create :staff="$staff"/>
    </div>
  
    
  
    <div class="row"  x-data="{open : false}">
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