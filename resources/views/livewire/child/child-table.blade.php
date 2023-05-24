<div>
    <table class="table table-stripped align-items-center mb-0">
        <thead>
          <tr>
            <td>No</td>
            <td>Nama Anak</td>
            <td>NIK</td>
            <td>TTL</td>
            <td>Umur</td>
            <td>Jenis Kelamin</td>
            <td>Pendidikan</td>
            @if (auth()->user()->role =='admin')
              <td>Aksi</td>               
            @endif
          </tr>
        </thead>
        <tbody>
          @foreach ($children as $item)
          <tr>
            <td class="text-sm">{{$loop->iteration}}</td>
            <td class="text-sm">{{ucFirst($item->nama_anak)}}</td>
            <td class="text-sm">{{$item->nik_anak}}</td>
            <td class="text-sm">{{ucFirst($item->tempat_lahir_anak)}}, {{$item->tanggal_lahir_anak}}</td>
            <td class="text-sm">{{\Carbon\Carbon::parse($item->tanggal_lahir_anak)->diffForhumans()}}</td>
            <td class="text-sm">{{$item->jenis_kalamin}}</td>
            <td class="text-sm">{{ucFirst($item->pendidikan)}}</td>

            @if (auth()->user()->role =='admin')
              <td class="text-sm">
                <div class="dropdown">
                  <button class="btn btn-link text-secondary mb-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-ellipsis-v text-xs"></i>
                  </button>
                  <ul class="dropdown-menu">
                    <li>
                      <button wire:click="$emit('getId',{{$item->id}})" class="border-0 bg-transparent d-inline" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">Toggle right offcanvas</button>   
                      
                    </li>
                    <li><a class="dropdown-item" href="#" wire:click="hapus({{$item->id}})">Hapus</a></li>
                  </ul>
                </div>
                
              </td> 
            @endif

            
          </tr>
          @endforeach
        </tbody>
    </table>
</div>
