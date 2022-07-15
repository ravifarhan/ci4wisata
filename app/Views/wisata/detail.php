<?= $this->extend('layouts/template') ?>
<?= $this->section('content') ?>

<div class="row justify-content-center">
    <div class="card" style="width: 50rem;">
        <div class="card-header">
            <h2 class="text-center"><strong>Detail Objek Wisata</strong></h2>
        </div>
        <center><img src="/img/<?= $wisata['gambar'] ?>" class="card-img-top w-50 mt-3 rounded-4"></center>
        <div class="card-body">
        <ul class="list-group list-group-horizontal">
            <li class="list-group-item list-group-item-action"><strong>Kode Objek Wisata</strong></li>
            <li class="list-group-item list-group-item-action"><?= $wisata['kode'] ?></li>
        </ul>
        <ul class="list-group list-group-horizontal">
            <li class="list-group-item list-group-item-action"><strong>Nama Objek Wisata</strong></li>
            <li class="list-group-item list-group-item-action"><?= $wisata['nama'] ?></li>
        </ul>
        <ul class="list-group list-group-horizontal">
            <li class="list-group-item list-group-item-action"><strong>Harga Tiket Anak</strong></li>
            <li class="list-group-item list-group-item-action ">Rp. <?= $wisata['tiket_anak'] ?></li>
        </ul>
        <ul class="list-group list-group-horizontal">
            <li class="list-group-item list-group-item-action"><strong>Harga Tiket Dewasa</strong></li>
            <li class="list-group-item list-group-item-action">Rp. <?= $wisata['tiket_dewasa'] ?></li>
        </ul>
            <!-- <h5 class="card-title">Kode Objek Wisata</h5> -->
            <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
        </div> 
        <div class="card-footer text-center">
            <a href="/wisata" class="btn btn-outline-success bi bi-arrow-return-left"> Kembali</a>
        </div>
    </div>
</div>



<?= $this->endSection() ?>