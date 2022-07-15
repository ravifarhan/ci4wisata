<?= $this->extend('layouts/template'); ?>

<?= $this->section('content') ?>

<div class="card mt-5">
    <div class="card-header">
        <h3>
           <a href="/wisata" class="btn btn-outline-primary bi bi-arrow-return-left"></a> 
        Form Edit Objek Wisata</h3>
    </div>
    <form action="/wisata/ubah/<?=$wisata['kode']?>" method="post" enctype="multipart/form-data">
        <?=csrf_field(); ?>
        <input type="hidden" name="gambarLama" value="<?= $wisata['gambar'];?>">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group mb-3 row">
                        <label for="kode" class="col-sm-4 col-form-label">Kode Objek Wisata</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="kode" name="kode" value="<?= $wisata['kode'] ?>">   
                        </div>
                    </div>
                    <div class="form-group mb-3 row">
                        <label for="nama" class="col-sm-4 col-form-label">Nama Objek Wisata</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="nama" name="nama" value="<?= $wisata['nama'] ?>">
                        </div>
                    </div>  
                </div>
                <div class="col-lg-6">
                    <div class="form-group mb-3 row">
                        <label for="tiket_anak" class="col-sm-4 col-form-label">Harga Tiket Anak</label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control" value="<?= $wisata['tiket_anak'] ?>"" id="tiket_anak" name="tiket_anak">
                        </div>
                    </div>
                    <div class=" form-group mb-3 row">
                        <label for="tiket_dewasa" class="col-sm-4 col-form-label">Harga Tiket Dewasa</label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control" value="<?= $wisata['tiket_dewasa'] ?>"" id="tiket_dewasa" name="tiket_dewasa"> 
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                <div class="form-group mb-3 row">
                        <label for="gambar" class="col-sm-2 col-form-label">Foto Tempat Wisata</label>
                        <div class="col-sm-2">
                            <img src="/img/<?= $wisata['gambar']?>" class="img-thumbnail img-preview">
                        </div>
                        <div class="col-sm-8">
                            <div class="input-group mb-3">
                                <input class="form-control <?= ($validation->hasError('gambar')) ? 'is-invalid' : ''; ?>" type="file" id="gambar" name="gambar" onchange="previewGambar()">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('gambar'); ?>
                                </div>  
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div >
                <button type="submit" class="btn btn-success">Ubah Data</button>
            </div>     
        </div>
    </form>
</div>

<?= $this->endSection() ?>