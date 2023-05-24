@extends('layouts.app')
@section('content')

<x-profile-header>
    <div class="col-auto my-auto">
        <div class="h-100">
            <h5 class="mb-1">
                Add New user
            </h5>
        </div>
    </div>
    <div class="col-lg-2 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
        <div class="nav-wrapper position-relative end-0">
            <ul class="nav nav-pills nav-fill p-1 bg-transparent" role="tablist">
                <li class="nav-item">


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

        <div class="col-12 col-lg-6">
            <div class="card mb-4">
            <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                <h6>{{__('Add New User')}}</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <form action="{{route('user.store')}}" method="post">
                    @csrf
                    <div class="px-4 py-4">

                        <div class="mb-3">
                            <label for="name">{{__('Name')}}</label>
                            <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror"  value="{{old('name')}}">
                            @error('name')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
        
                        <div class="mb-3">
                            <label for="email">{{__('Email')}}</label>
                            <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror"  value="{{old('email')}}">
                            @error('email')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="role">{{__('Role')}}</label>
                            <select name="role" id="role" class="form-select">
                                <option value="admin">Admin</option>
                                <option value="user">User</option>
                            </select>
                            @error('email')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
        
                        <div class="mb-3">
                            <label for="password">{{__('Password')}}</label>
                            <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password">
                            @error('password')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
        
                        <div class="mb-3">
                            <label for="password_confirmation">{{__('Password Confirmation')}}</label>
                            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="Password Confirmation">
                            @error('password_confirmation')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
        

                        <div class="d-flex justify-content-end mt-5">
                            <button type="submit" class="btn btn-primary px-4">Submit</button>
                        </div>

                    </div>
                </form>
            
            </div>
            </div>
        </div>


            
        
    </div>
  

    <x-footer/>

  
</div>
@endsection