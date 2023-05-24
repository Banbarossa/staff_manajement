@extends('layouts.app')
@section('content')


<div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card mb-4">
          <div class="card-header pb-0 d-flex justify-content-between align-items-center">
            <h6>Authors table</h6>
            {{-- <a href="{{route('staff.create')}}" class="btn btn-primary">{{__('Add New')}}</a> --}}
          </div>

            
                
               
        </div>
      </div>
    </div>
    <div class="row">
        <div class="col-12">
            @foreach ($staff as $item)
            <div class="card shadow-sm mb-2" x-data="{open : false}">
                <div class="card-header" @click="open = ! open">
                    <div>
                        <h6 class="text-secondary">{{$item->nama}}  | {{$item->children->count()}} Orang Anak</h6>
                        
                    </div>
                    
                </div>

                <div class="card-body" x-show="open">
                    dhfajdhakdaas
                </div>
            </div>   
            
        @endforeach
        </div>
    </div>
  

    <x-footer/>

  
</div>



@push('myScript')
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
@endpush
    
@endsection