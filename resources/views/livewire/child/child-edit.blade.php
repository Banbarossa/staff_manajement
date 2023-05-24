<div>

    {{$previous}}

    <form action="" wire:submit.prevent="store">

        <div class="mb-3">
            <label for="nik">{{__('Nama')}}</label>
            <input type="text" id="nama_anak" wire:model="nama_anak" class="form-control @error('nama_anak') is-invalid @enderror" placeholder="Nama">
            @error('nama_anak')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="nik_anak">{{__('NIK_anak')}}</label>
            <input type="text" id="nik_anak" wire:model="nik_anak" class="form-control @error('nik_anak') is-invalid @enderror" placeholder="No Induk Kependudukan">
            @error('nik_anak')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="tempat_lahir_anak">{{__('Tempat Lahir')}}</label>
            <input type="text" id="tempat_lahir_anak" wire:model="tempat_lahir_anak" class="form-control @error('tempat_lahir_anak') is-invalid @enderror" placeholder="Tempat Lahir">
            @error('tempat_lahir_anak')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="tanggal_lahir_anak">{{__('Tanggal Lahir')}}</label>
            <input type="date" id="tanggal_lahir_anak" wire:model="tanggal_lahir_anak" class="form-control @error('tanggal_lahir_anak') is-invalid @enderror" placeholder="Tanggal Lahir" >
            @error('tanggal_lahir_anak')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="jenis_kelamin">{{__('jenis_kelamin')}}</label>
            <select name="jenis_kelamin" class="form-select  @error('jenis_kelamin') is-invalid @enderror" id="" wire:model="jenis_kelamin">
                <option value="">Pilih Jenis Kelamin</option>
                <option value="laki-Laki">laki-Laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
            @error('jenis_kelamin')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="pendidikan">{{__('Pendidikan')}}</label>
            <input type="text" id="pendidikan" wire:model="pendidikan" class="form-control @error('pendidikan') is-invalid @enderror" placeholder="Pendidikan" >
            @error('pendidikan')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>

        
        <button type="submit" class="btn btn-primary">submit</button>
    </form>

</div>
