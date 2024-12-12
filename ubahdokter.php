<?php 
session_start();

if(!isset($_SESSION["login"]) && $_SESSION["role"] != "admin"){
  header("Location: index.php");
  exit;
}
  require 'functions.php';
//ambil data di url
$id = $_GET["id"];

//query data 
$detaildokter= query("SELECT * FROM dokter WHERE id = $id")[0];
$detailpoli= query("SELECT * FROM poli");
$defaultpoli= query("SELECT poli.id, poli.nama_poli FROM dokter JOIN poli ON dokter.id_poli = poli.id WHERE dokter.id = $id")[0];


//cek apakah tombol submit sudah ditekan atau belum
  if (isset($_POST["submit"])){    
    //cek apakah data berhasil diubah
    if(ubahDokter($_POST) > 0 ){
      echo "
      <script>
      alert('data berhasil diubah');
      document.location.href = 'keloladokter.php';
      </script>
      ";
    }else{
      echo "
      <script>
      alert('data gagal diubah');
      document.location.href = 'keloladokter.php';
      </script>
      ";
    }   

  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ubah Data Dokter</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</head>
<body>
  
  <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Form Ubah Data Dokter</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="" method="post">
                <div class="card-body">
                  <div class="form-group">
                  <input type="hidden" name="dokter_id" value="<?= $detaildokter["id"]; ?>">
                    <label for="exampleInputEmail1">Nama Dokter</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter email" value = "<?= $detaildokter["nama"];?>" required name="nama_dokter">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Alamat</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Alamat" name="alamat" value="<?= $detaildokter["alamat"]; ?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword2">Nomor HP</label>
                    <input type= "text" name="no_hp" class="form-control" id="exampleInputPassword2" placeholder="Nomor HP" value="<?= $detaildokter["no_hp"]; ?>">
                  </div>
                  <div class="form-group">
                  <label for="exampleSelectRounded0">Poli</label>
                    <select name = "id_poli" class="custom-select rounded" id="exampleSelectRounded0">
                    <?php foreach($detailpoli as $poli) : ?>                    
                    <?php if($detaildokter["id_poli"] == $poli["id"]) :?>                   
                    <option  value="<?= $poli['id']; ?>" selected><?= $poli["nama_poli"]; ?></option>
                    <?php else : ?>
                    <option  value="<?= $poli['id']; ?>"><?= $poli["nama_poli"]; ?></option>
                    <?php endif; ?>
                    <?php endforeach; ?>
                  </select>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                </div>
              </form>
            </div>
  
    
 
</body>
</html>