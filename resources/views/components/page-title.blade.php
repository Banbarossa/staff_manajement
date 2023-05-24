<div class="container-fluid">
    <div class="page-header min-height-150 border-radius-xl mt-4" style="background-image: url('../assets/img/curved-images/curved0.jpg'); background-position-y: 50%;">
        <span class="mask bg-gradient-primary opacity-6"></span>
    </div>
    <div class="card card-body blur shadow-blur mx-4 mt-n6 overflow-hidden">
        <div class="row gx-4">
            <div class="col-auto">
                <div class="avatar avatar-xl position-relative">
                <img src="{{asset('')}}assets/img/pis_logo.png" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
                </div>
            </div>
            
            {{ $slot }}

            
        </div>
    </div>
</div>
