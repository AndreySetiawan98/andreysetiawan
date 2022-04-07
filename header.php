<?php

  if(($_GET['role']=='admin')){
      include "admin.php";
  }else if(($_GET['role']=='guru')){
      include "masterguru.php";
  }else if(($_GET['role']=='edit')){
      include "editguru.php";
  }else if(($_GET['role']=='walikelas')){
      include "masterwalikelas.php";
  }else if(($_GET['role']=='siswa')){
      include "mastersiswa.php";
  }else if(($_GET['role']=='matpel')){
      include "masterpelajaran.php";
  }else if(($_GET['role']=='tahun')){
      include "mastertahun.php";
  }
  else{
      echo "Maaf, Halaman Ini Tidak Tersedia";
  }

?>


<title>
    <?php
        if(($_GET['role']=='admin')){
            echo "Dashboard Admin";
        }
        else if(($_GET['role']=='guru')){   
            echo "Master Guru";
        }else if(($_GET['role']=='walikelas')){
            echo "Master Wali Kelas";
        }else if(($_GET['role']=='siswa')){
            echo "Master Santri";
        }else if(($_GET['role']=='matpel')){
            echo "Master Mata Pelajaran";
        }else if(($_GET['role']=='tahun')){
            echo "Tahun Pelajaran";
        }
        else { 
            echo "Maaf, Halaman Ini Tidak Tersedia";
        }
    ?>
</title>