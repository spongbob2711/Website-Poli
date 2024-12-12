<?php 
require 'functions.php';
  $id = $_GET["id"];

  if(hapusObat($id)>0){
    echo "
      <script>
      alert('data berhasil dihapus');
      document.location.href = 'kelolaobat.php';
      </script>
      ";
    }else{
      echo "
      <script>
      alert('data gagal dihapus');
      document.location.href = 'kelolaobat.php';
      </script>
      ";
  }
?>