<div>
    @if (session()->has('success'))
    <x-alert-success>
        {{session('success')}}
    </x-alert-success>
        
    @endif
    <form action="" wire:submit.prevent='store' method="post">
        <div class="d-flex justify-content-between gap-3">
            <input type="text" class="form-control" wire:model='pekerjaan' placeholder="Pekerjaan">
            <button class="badge badge-sm bg-gradient-primary border-0" type="submit"><small>Tambah</small></button>
          </div>
    </form>

    <div class="table-responsive mt-3">

        <table class="table table-sm">
            <th class="text-xs"ead>
                <tr>
                    <th class="text-xs"></th>
                    <th class="text-xs">No</th>
                    <th class="text-xs">Pekerjaan</th>
                    <th class="text-xs">Aksi</th>
                </tr>
            </thead>
            <tbody wire:sortable="PekerjaanOrder">
                @foreach ($data as $item)
                <tr wire:sortable.item="{{ $item->id }}" wire:key="item-{{ $item->id }}" wire:sortable.handle>
                    <td class="text-xs"><i class="bi bi-grip-vertical"></i></td>
                    <td class="text-xs">{{$loop->iteration}}</td>
                    <td class="text-xs" >{{$item->pekerjaan}}</td>
                    <td class="text-xs">
                        <button class="badge badge-sm bg-gradient-danger border-0" wire:click="destroy({{$item->id}})">Delete</button>
                    </td>
                </tr>
                @endforeach
                
            </tbody>
        </table>
    </div>
</div>
