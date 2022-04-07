<?php
// session_start();

// if (isset($_SESSION['login'])){
//     header("Location: admin.php");
//     exit;
// }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../sekolah/guru/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../sekolah/guru/bootstrap/guru.css">
    <link rel="stylesheet" href="../sekolah/guru/fontawesome/css/all.css">
    <title>Halaman Login</title>
    <style type="text/css">
        h7{
            font-size: 12px;
        }

        form input{
            text-indent: 20px;
        }

        form input+i{
            position:absolute;
            left:7px;
            top:10px;
            color:#777;
        }

        form,form .input-icon{width:100%;}
        form .input-icon{position:relative;}

        form input:focus{border:1px solid #0099ff;color:#000}
        form input:focus+i{color:#0099ff;}

        .button{
            margin-left: 65px;
        }
    </style>
</head>
<body>
    <div class="kotak_login">
            <div class="container">
                    <div class="row text-center">
                        <div class="col col-4">
                        <img src="../sekolah/admin/gambar/test.png">
                        </div>
                        <div class="col col-8">
                        <p class="teks d-flex align-items-center">PONDOK PESANTREN DAR EL AMIR</p>
                        </div>
                    </div>
            </div>

        <div class="container">
            <form method="post" action="cek_login.php">
            <div class="form-group">
                    <label class="control-label" for="username">Username</label>
                        <div class="input-icon">
                        <input type="text" class="form-control" id="username" name="username" autocomplete="off" 
                        required>
                        <i class="fa fa-user"></i>
                    </div>
                </div><br>
                <div class="form-group">
                    <label class="control-label" for="password">Password</label>
                        <div class="input-icon">
                        <input type="password" class="form-control" id="password" name="password" autocomplete="off" 
                        required>
                        <i class="fa fa-lock"></i>
                    </div>
                    <input type="checkbox" id="show-password"> <h7>Show Password</h7>
                </div><br>
                <div class="form-group">
                    <label class="control-label" for="level">Jenis User</label>
                    <select class="form-control" id="level" name="level" autocomplete="off" required>
                        <option value="" selected disabled>Pilih..</option>
                        <option value="admin">admin</option>
                        <option value="santri">santri</option>
                        <option value="walikelas">wali kelas</option>
                        <option value="guru">guru</option>
                        <option value="stafftu">staff tu</option>
                        </select>
                </div><br>
            
                <div class="button">
                    <button type="submit" name="login" class="btn btn-info">Login</button>
                    <a class="btn btn-warning" href="index.php" role="button">Kembali</a>
                </div>
        </form>
    </div>
</div>
	</form>	
</div>
</body>
<script src="../sekolah/admin/jquery/jquery.min.js"></script>
        <script>
    $(document).ready(function(){  
   $('#show-password').click(function(){
    if($(this).is(':checked')){
     $('#password').attr('type','text');
    }else{
     $('#password').attr('type','password');
    }
   });
  });
        </script>
</html>
