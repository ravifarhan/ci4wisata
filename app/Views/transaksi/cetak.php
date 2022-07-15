<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cetak Laporan</title>
    <link rel="stylesheet" href="/bootstrap-5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="/bootstrap-icons-1.8.3/bootstrap-icons.css">
  </head>
  <style>
    body{
      font-family: Arial;
    }
  </style>
  
  <body>

  <div class="container">
      <div class="card mt-2">
          <div class="card-header">
              <h2 class="text-center">Laporan Transaksi Objek Wisata</h2>
          </div>
          <table class="table table-info table-hover table-bordered">
          <thead class="table-dark">
              <tr>
              <th scope="col">No</th>
              <th scope="col">Nofak</th>
              <th scope="col">Kode</th>
              <th scope="col">Nama Objek Wisata</th>
              <th scope="col">Tiket Anak</th>
              <th scope="col">Jumlah Anak</th>
              <th scope="col">Pendapatan Anak</th>
              <th scope="col">Tiket Dewasa</th>
              <th scope="col">Jumlah Dewasa</th>
              <th scope="col">Pendapatan Dewasa</th>
              <th scope="col">Total Pendapatan</th>
              </tr>
          </thead>
          <tbody>
          <?php $i=1; 
          $totalsemua = 0;
          ?>
          <?php foreach ($transaksi as $t) :
              $totalanak       = $t->tiket_anak * $t->jumlah_anak;
              $totaldewasa     = $t->tiket_dewasa * $t->jumlah_dewasa;
              $totalpendapatan = $totalanak + $totaldewasa;
              $totalsemua     += $totalpendapatan;
              ?>
              <tr>
              <th scope="row"><?= $i++?></th>
              <td><?= $t->nofak; ?></td>
              <td><?= $t->kode; ?></td>
              <td><?= $t->nama; ?></td>
              <td><?= $t->tiket_anak; ?></td>
              <td><?= $t->jumlah_anak; ?></td>
              <td><?= $totalanak; ?></td>
              <td><?= $t->tiket_dewasa; ?></td>
              <td><?= $t->jumlah_dewasa; ?></td>
              <td><?= $totaldewasa; ?></td>
              <td><?= $totalpendapatan ?></td>
              </tr>
          <?php endforeach;?>
          </tbody>
          <tr>
              <td colspan="10"><strong>Total Pendapatan Wisata :</strong></td>
              <th> <?= $totalsemua ?> </th>
          </tr>
      </table>
      </div>
  </div>

    
<script src="/bootstrap-5.2.0/js/bootstrap.bundle.min.js"></script>


  </body>
</html>


