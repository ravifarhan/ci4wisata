<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ravi Farhan</title>
    <link rel="stylesheet" href="/bootstrap-5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="/bootstrap-icons-1.8.3/bootstrap-icons.css">
  </head>
  <style>
    body{
      font-family: Arial;
    }
    .navbar{
      text-transform: uppercase;
      font-family: monospace;
      font-weight: bold;
      font-size: 20px;
      text-align: center;
    }
    .nav-link:hover:after{
      content: '';
      display: block;
      border-bottom : 3px solid blue;
      margin: auto;
      padding-bottom: 5px;
      margin-bottom: -8px;
    }
  </style>
  
  <body>
 
  <nav class="navbar navbar-expand-lg bg-transparent">
    <div class="container-fluid">
      <div class="container">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav m-auto ">
          <a href="/" class="nav-item nav-link" style="color:black">
            <i class="bi bi-house-fill"></i> Beranda
          </a>
          <a href="" class="nav-item nav-link" style="color:black">
            <i class="bi bi-person-fill"></i> Profil
          </a>
          <a href="/wisata" class="nav-item nav-link" style="color:black">
              <i class="bi bi-slack"></i> ObjekWisata
          </a>
          <a href="" class="nav-item nav-link" style="color:black">
              <i class="bi bi-globe"></i> About
          </a>
        </div>
      </div>
      </div>
    </div>
  </nav>

<div class="container my-1">
<?= $this->renderSection('content'); ?>
</div>
    

    
<script>
  function previewGambar(){
    const gambar      = document.querySelector('#gambar');
    const imgPreview  = document.querySelector('.img-thumbnail');

    const fileGambar = new FileReader();
    fileGambar.readAsDataURL(gambar.files[0]);
  
    fileGambar.onload = function(e) {
      imgPreview.src  = e.target.result;
    }
  }
</script>
<script src="/bootstrap-5.2.0/js/bootstrap.bundle.min.js"></script>
<!-- <script src="sweetalert2.all.min.js"></script> -->


  </body>
</html>