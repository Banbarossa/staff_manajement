<div class="col-12">
    <div class="card mb-4">
      <div class="card-header pb-0 d-flex justify-content-between align-items-center">
        <h6>Daftar Karyawan</h6>
        <div class="d-flex gap-4">
          @if (auth()->user()->role == 'admin')
            <button class="btn btn-secondary" wire:click="export">Download Excel</button>   
          @endif
          <form action="" method="post">
            @csrf
            <input type="text" wire:model='search' name="search" placeholder="Search" class="form-control">
          </form>
        </div>

      </div>
      <div class="card-body px-0 pt-0 pb-2">
        <div class="table-responsive p-0">
          <table class="table align-items-center mb-0">
            <thead>
              <tr>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">tempat, Tgl Lahir</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Pendidikan Terakhir</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Employed</th>
                <th class="text-secondary opacity-7"></th>
              </tr>
            </thead>
            <tbody>
    
              @foreach ($staffs as $staff)
              <tr>
                <td>
                  <div class="d-flex px-2 py-1">
                    <div class="me-3 d-flex align-items-center">
                      <h4><i class="bi bi-person-circle"></i></h4>
                      {{-- <img src="../assets/img/team-2.jpg" class="avatar avatar-sm me-3" alt="user1"> --}}
                    </div>
                    <div class="d-flex flex-column justify-content-center">
                      <h6 class="mb-0 text-sm">{{ucFirst($staff->nama)}}</h6>
                      <p class="text-xs text-secondary mb-0">{{ucFirst($staff->jabatan)}}</p>
                    </div>
                  </div>
                </td>
                <td>
                  <p class="text-xs font-weight-bold mb-0">{{ucFirst($staff->tempat_lahir)}}, {{\Carbon\Carbon::parse($staff->tanggal_lahir)->format('d-m-y')}}</p>
                  <p class="text-xs text-secondary mb-0">{{\Carbon\Carbon::parse($staff->tanggal_lahir)->diffForHumans()}}</p>
                </td>
                <td class="align-middle text-center text-sm">
                  {{-- <span class="badge badge-sm bg-gradient-success">Online</span> --}}
                  <p class="text-xs text-secondary mb-0">{{$staff->pendidikan_terakhir}}</p>
                </td>
                <td class="align-middle text-center">
                  <span class="text-secondary text-xs font-weight-bold">{{$staff->tmt}}</span>
                  <p class="text-xs text-secondary mb-0">{{\Carbon\Carbon::parse($staff->tmt)->diffForHumans()}}</p>
                </td>
                <td class="align-middle">
                  <a href="/staff/{{$staff->id}}" class="badge badge-sm bg-gradient-success">View</a>
                  @if (auth()->user()->role == 'admin')
                    <a href="/staff/{{$staff->id}}/edit" class="badge badge-sm bg-gradient-warning">Edit</a>
                      
                  @endif
                </td>
              </tr>
              @endforeach
     
            </tbody>
          </table>

          <div class="mt-3 mx-3">
              {{$staffs->links()}}
          </div>
        </div>
    </div>


    </div>
  </div>