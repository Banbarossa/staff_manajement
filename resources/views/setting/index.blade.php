@extends('layouts.app')
@section('content')

<x-page-title>
    <div class="col-auto my-auto">
      <div class="h-100">
          <h5 class="mb-1">
              Setting
          </h5>
      </div>
  </div>
  <div class="col-lg-2 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
      <div class="nav-wrapper position-relative end-0">
          <ul class="nav nav-pills nav-fill p-1 bg-transparent" role="tablist">
              <li class="nav-item">
                
              </li>
          </ul>
      </div>
  </div>
  </x-page-title>

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12 col-lg-6 mt-3">
            <div class="card">
                <div class="card-header">
                    Daftar Pekerjaan
                </div>
                <div class="card-body">
                    <livewire:pekerjaaan.index/>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-6 mt-3">
            <div class="card">
                <div class="card-header">
                    Daftar Pendidikan
                </div>
                <div class="card-body">
                    <livewire:pendidikan.index/>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-6 mt-3">
            <div class="card">
                <div class="card-header">
                    Daftar Jabatan
                </div>
                <div class="card-body">
                    <livewire:jabatan.index/>
                </div>
            </div>
        </div>
    </div>

    
    <x-footer/>

  
</div>



@push('myScript')
<script src="https://cdn.jsdelivr.net/gh/livewire/sortable@v0.x.x/dist/livewire-sortable.js"></script>
@endpush

    
@endsection