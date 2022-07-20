<?php
    session_start();
    include 'db.php';
    if($_SESSION['status_login'] != true){
        echo '<script>window.location = "login.php"</script>';
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset= "utf-8" >
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>
            Assemble Store Profile
        </title>
        <link rel="stylesheet" href="style_profile.css" />
        <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,200&display=swap"
        rel="stylesheet"
        />
        <link
        rel="stylesheet"
        href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
        />
    </head>
    <body>
        <!---Header--->
        <header>
            <div class="container">
                <h1><a href="">
                    <img src="images/logo.png" alt="" width="150px" style="transform: scale(1.5,1);transform-origin: left;margin-right=100px"
                </a></h1>
                <ul>
                    <li><a href ="dashboard.php">Dashboard</a></li>
                    <li><a href ="profile.php">Profile</a></li>
                    <li><a href ="data-kategori.php">Data Kategori</a></li>
                    <li><a href ="data-produk.php">Data Produk</a></li>
                    <li><a href ="keluar.php">Logout</a></li>
                </ul>
            </div> 
        </header>
        <!---content--->
        <div class="section">
            <div class="container">
                <h3>Tambah Data Category</h3>
                <div class="box">
                    <form action="" method="POST">
                        <input type="text" name="nama" placeholder="Nama Kategori" class="inputcontrol" required>
                        <input type="submit" name="submit" value="Submit" class="btn">
                    </form>
                    <?php 
                        if(isset($_POST['submit'])){
                            $nama = ucwords($_POST['nama']);

                            $insert = mysqli_query($conn, "INSERT INTO tb_category VALUES(
                                null,
                                '".$nama."'
                            )");
                            if($insert){
                                echo '<script>alert("Tambah kategori berhasil")</script>';
                                echo '<script>window.location="data-kategori.php"</script>';
                        
                            }else{
                                echo 'gagal' .mysqli_error($conn);
                            }
                        }
                    ?>
                    
                </div>
            </div>
        </div>
        <!---footer--->
        <div class="footer">
                <hr />
                <p class="copyright">Copyright 2021 - Assemble Strore</p>
            </div>
    </body>
</html>