@extends('layouts.app')
@section('content')

<x-page-title>
    <div class="col-auto my-auto">
        <div class="h-100">
            <h5 class="mb-1">
                Dashboard
            </h5>
            <div class="text-xs">Selamat Datang, <span class="text-uppercase fw-bold text-primary">{{ucfirst(auth()->user()->name)}}</span></div>
        </div>
    </div>
</x-page-title>
    <div class="container-fluid mt-5">
        <div class="row container">
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
              <div class="card">
                <div class="card-body p-3">
                  <div class="row">
                    <div class="col-8">
                      <div class="numbers">
                        <p class="text-sm mb-0 text-capitalize font-weight-bold">Staff Aktif</p>
                        <h5 class="font-weight-bolder mb-0">
                          {{$active->count()}}
                          <span class="text-primary text-sm font-weight-bolder ms-1">Orang</span>
                        </h5>
                      </div>
                    </div>
                    <div class="col-4 text-end">
                      <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                        <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
              <div class="card">
                <div class="card-body p-3">
                  <div class="row">
                    <div class="col-8">
                      <div class="numbers">
                        <p class="text-sm mb-0 text-capitalize font-weight-bold">Staff Non Aktif</p>
                        <h5 class="font-weight-bolder mb-0">
                            {{$inactive->count()}}
                          <span class="text-primary text-sm font-weight-bolder">Orang</span>
                        </h5>
                      </div>
                    </div>
                    <div class="col-4 text-end">
                      <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                        <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
              <div class="card">
                <div class="card-body p-3">
                  <div class="row">
                    <div class="col-8">
                      <div class="numbers">
                        <p class="text-sm mb-0 text-capitalize font-weight-bold">Admin</p>
                        <h5 class="font-weight-bolder mb-0">
                            {{$admin->count()}}
                          <span class="text-primary text-sm font-weight-bolder">Orang</span>
                        </h5>
                      </div>
                    </div>
                    <div class="col-4 text-end">
                      <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                        <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6">
              <div class="card">
                <div class="card-body p-3">
                  <div class="row">
                    <div class="col-8">
                      <div class="numbers">
                        <p class="text-sm mb-0 text-capitalize font-weight-bold">User</p>
                        <h5 class="font-weight-bolder mb-0">
                            {{$user->count()}}
                          <span class="text-primary text-sm font-weight-bolder">Orang</span>
                        </h5>
                      </div>
                    </div>
                    <div class="col-4 text-end">
                      <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                        <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
@endsection