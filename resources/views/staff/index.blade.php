@extends('layouts.app')
@section('content')

<x-page-title>
  <div class="col-auto my-auto">
    <div class="h-100">
        <h5 class="mb-1">
            Data Karyawan @if (request()->routeIs('staff.index'))
            {{'Aktif'}}
            @else
            {{'Non Aktif'}}
            @endif
        </h5>
    </div>
</div>
<div class="col-lg-2 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
    <div class="nav-wrapper position-relative end-0">
        <ul class="nav nav-pills nav-fill p-1 bg-transparent" role="tablist">
            @if (request()->routeIs('staff.index') && auth()->user()->role == 'admin')
            <li class="nav-item">
              <a href="{{route('staff.create')}}" class="btn btn-primary">{{__('Add New')}}</a>
            </li>
            @endif
            
        </ul>
    </div>
</div>
</x-page-title>



<div class="container-fluid py-4">
    <div class="row">
      <livewire:staff.staff-index/>
    </div>
  

    <x-footer/>

  
</div>




    
@endsection