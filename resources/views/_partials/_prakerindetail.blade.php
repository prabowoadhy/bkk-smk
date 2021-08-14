<h4 class="mt-2">Dibutuhkan : {{ $loker->posisi }}</h4>
<div class="row">
    <div class="card">
        <div class="card-header">
            <div class="row p-1">
                <div class="col-md-3 pl-">
                    <a><i class="fas fa-clock"></i> {{ $loker->jenis_loker }}</a>
                </div>
                <div class="col-md-3 pl-">
                    <a><i class="fas fa-building"></i> {{ $loker->bidang }}</a>
                </div>
                <div class="col-md-2 pl-">
                    <a><i class="fas fa-map-marker-alt"></i> {{ $loker->penempatan }}</a>
                </div>
                <div class="col-md-4 pl-">
                    <a><i class="fas fa-stopwatch"></i> Deadline : {{ $loker->tgl_selesai }}</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <p>{{ $loker->deskripsi }}</p>
        </div>
    </div>
    <div class="col-md-12">
    </div>
    
</div>