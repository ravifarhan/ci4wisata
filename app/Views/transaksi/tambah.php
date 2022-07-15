<?= $this->extend('layouts/template'); ?>

<?= $this->section('content') ?>

<div class="card mt-5">
    <div class="card-header">
        <h3>
           <a href="/transaksi" class="btn btn-outline-primary bi bi-arrow-return-left"></a> 
        Form Transaksi Objek Wisata</h3>
    </div>
    <form action="/transaksi/simpan" method="post">
        <?=csrf_field(); ?>
        <div class="card-body">
            <div class="mb-3 row">
                <label for="nofak" class="col-sm-2 col-form-label">Nofak</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control <?= ($validation->hasError('nofak')) ? 'is-invalid' : ''; ?>" value="<?= old('nofak'); ?>" id="nofak" name="nofak" autofocus>
                    <div class="invalid-feedback">
                        <?= $validation->getError('nofak'); ?>
                    </div>  
                </div>
            </div>
            <div>
            <label for="kode" class="col-sm-2 col-form-label">Kode</label>
                <select class="form-select-sm form-select-md mb-3 col-4" name="kode">
                    <option selected disabled>Pilih Kode</option>
                    <?php foreach ($wisata as $w) : ?>
                    <option value="<?= $w['kode']?>"><?= $w['kode'] ?> - <?= $w['nama'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3 row">
                <label for="jumlah_anak" class="col-sm-2 col-form-label">Jumlah Anak</label>
                <div class="col-sm-4">
                <input type="number" class="form-control <?= ($validation->hasError('junlah_anak')) ? 'is-invalid' : ''; ?>" value="<?= old('jumlah_anak'); ?>" id="jumlah_anak" name="jumlah_anak">
                <div class="invalid-feedback">
                    <?= $validation->getError('jumlah_anak'); ?>
                </div>  
                </div>
            </div>
            <div class="mb-3 row">
                <label for="jumlah_dewasa" class="col-sm-2 col-form-label">Jumlah Dewasa</label>
                <div class="col-sm-4">
                <input type="number" class="form-control <?= ($validation->hasError('jumlah_dewasa')) ? 'is-invalid' : ''; ?>" value="<?= old('jumlah_dewasa'); ?>" id="jumlah_dewasa" name="jumlah_dewasa">
                <div class="invalid-feedback">
                    <?= $validation->getError('jumlah_dewasa'); ?>
                </div>      
                </div>
            </div>
            <div>
                <button type="submit" class="btn btn-success">Tambah Data Transaksi</button>
            </div>
        </div>
    </form> 
</div>

<?= $this->endSection() ?>