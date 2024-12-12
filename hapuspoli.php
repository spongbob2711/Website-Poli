<?php 
require 'functions.php';
  $id = $_GET["id"];

  if(hapusPoli($id)>0){
    echo "
      <script>
      alert('data berhasil dihapus');
      document.location.href = 'kelolapoli.php';
      </script>
      ";
    }else{
      echo "
      <script>
      alert('data gagal dihapus');
      document.location.href = 'kelolapoli.php';
      </script>
      ";
  }
?>