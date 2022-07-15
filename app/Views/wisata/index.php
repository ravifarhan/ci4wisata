<?= $this->extend('layouts/template') ?>
<?= $this->section('content') ?>

<div class="mb-2 mt-5">
    <a href="wisata/tambah" class="btn btn-primary">Tambah Objek Wisata</a>
    <a href="transaksi" class="btn btn-success">Transaksi Objek Wisata</a>
</div>
<div class="card">
    <div class="card-header">
        <h2 class="text-center"><strong>Data Objek Wisata</strong></h2>
            <?php if (session()->getFlashdata('pesan')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('pesan'); ?>
                </div>
            <?php endif; ?>
            <?php if (session()->getFlashdata('hapus')) : ?>
                <div class="alert alert-warning" role="alert">
                    <?= session()->getFlashdata('hapus'); ?>
                </div>
            <?php endif; ?>
    </div>
    <table class="table table-info table-hover table-bordered">
        <thead class="table-dark">
            <tr>
            <th scope="col">No</th>
            <!-- <th scope="col">Foto</th> -->
            <th scope="col">Kode</th>
            <th scope="col">Nama Objek Wisata</th>
            <th scope="col">Harga Tiket Anak</th>
            <th scope="col">Harga Tiket Dewasa</th>
            <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
        <?php $i=1; ?>
        <?php foreach ($wisata as $w) : ?>
            <tr>
            <th scope="row"><?= $i++?></th>
            <td><?= $w['kode'] ?></td>
            <td><?= $w['nama'] ?></td>
            <td>Rp. <?= $w['tiket_anak'] ?></td>
            <td>Rp. <?= $w['tiket_dewasa'] ?></td>
            <td>
                <a href="wisata/detail/<?= $w['kode']?>" class= "btn btn-info btn-sm bi bi-eye"> Detail</a>
                <a href="wisata/edit/<?= $w['kode']?>" class= "btn btn-warning btn-sm bi bi-pencil"> Edit</a>
                <form action="<?= 'wisata/hapus/'. $w['kode'] ?> " method="post" class="d-inline">
                <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" class="btn btn-danger btn-sm bi bi-trash" onclick="return confirm ('Yakin Hapus Data?');"> Hapus</a>
                </form>
            </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
   
</div>


<?= $this->endSection() ?>