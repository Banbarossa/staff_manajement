@extends('layouts.app')
@section('content')

<x-profile-header>
    <div class="col-auto my-auto">
        <div class="h-100">
            <h5 class="mb-1">
                User data
            </h5>
        </div>
    </div>
    <div class="col-lg-2 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
        <div class="nav-wrapper position-relative end-0">
            <ul class="nav nav-pills nav-fill p-1 bg-transparent" role="tablist">
                <li class="nav-item">
                    <a href="{{route('user.create')}}" class="btn btn-primary">
                        <i class="fa fa-plus"></i>
                        <span>{{__('Add New')}}</span>
                    </a>
                </li>

            </ul>
        </div>
    </div>

</x-profile-header>


<div class="container-fluid py-4">
    {{-- error session --}}
    @if(session('error'))
        <div class="alert alert-warning alert-dismissible fade show d-flex align-items-center justify-content-beetwen" role="alert">
            <div>
                {{session('error')}}
            </div>
            <button type="button" class="btn-close text-white" data-bs-dismiss="alert" aria-label="Close">X</button>
        </div>
    @endif

    {{-- success session --}}
    @if(session('success'))
        <div class="alert alert-warning alert-dismissible fade show d-flex align-items-center justify-content-beetwen" role="alert">
            <div>
                {{session('success')}}
            </div>
            <button type="button" class="btn-close text-white" data-bs-dismiss="alert" aria-label="Close">X</button>
        </div>
    @endif





    <div class="row">


        <div class="col-12">
            <div class="card mb-4">
            <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                <h6>{{__('Daftar User')}}</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                      <thead>
                        <tr>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama</th>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Email</th>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">role</th>
                          <th class="text-secondary opacity-7">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
      
                        @foreach ($users as $user)
                        <tr>
                          <td>
                            <div class="d-flex px-2 py-1">
                              <div>
                                <img src="../assets/img/team-2.jpg" class="avatar avatar-sm me-3" alt="user1">
                              </div>
                              <div class="">
                                <h6 class="mb-0 text-sm">{{ucFirst($user->name)}}</h6>
                              </div>
                            </div>
                          </td>
                          
                          <td class="">
                            <h6 class="mb-0 text-sm">{{ucFirst($user->email)}}</h6>
                          </td>
                          <td class="">
                            <h6 class="mb-0 text-sm">{{ucFirst($user->role)}}</h6>
                          </td>
                          <td class="">
                            <a href="{{route('user.show',$user->id)}}" class="badge badge-md border-0 bg-gradient-success">Edit</a>
                            <form action="{{route('user.destroy',$user->id)}}" method="post" class="d-inline">
                                @csrf
                                @method('delete')
                                <button class="badge badge-md border-0 bg-gradient-danger" onclick="return confirm('apakah Anda yakin untuk menghapus?')">Hapus</button>
                            </form>
                          </td>
                          
                        </tr>
                        @endforeach
               
                      </tbody>
                    </table>
                  </div>
            
            </div>
            </div>
        </div>


            
        
    </div>
  

    <x-footer/>

  
</div>
@endsection