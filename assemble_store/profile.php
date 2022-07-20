<?php
    session_start();
    include 'db.php';
    if($_SESSION['status_login'] != true){
        echo '<script>window.location = "login.php"</script>';
    }
    $query = mysqli_query($conn, "SELECT * FROM tb_admin  WHERE admin_id = '".$_SESSION['id']."' ");
    
    $d = mysqli_fetch_object($query);
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
                <h3>Profile</h3>
                <div class="box">
                    <form action="" method="POST">
                        <input type="text" name="nama" placeholder="Nama lengkap" class="inputcontrol" value="<?php echo $d->admin_name ?>" required>
                        <input type="text" name="user" placeholder="Username" class="inputcontrol" value="<?php echo $d->username ?>" required>
                        <input type="text" name="hp" placeholder="No Hp" class="inputcontrol" value="<?php echo $d->admin_telp ?>" required>
                        <input type="email" name="email" placeholder="Email" class="inputcontrol" value="<?php echo $d->admin_email ?>" required>
                        <input type="text" name="alamat" placeholder="Alamat" class="inputcontrol" value="<?php echo $d->admin_address ?>" required>
                        <input type="submit" name="submit" value="Update Profile" class="btn">
                    </form>
                    <?php 
                        if (isset($_POST['submit'])){
                            $nama   = ucwords($_POST['nama']);
                            $user   = $_POST['user'];
                            $hp     = $_POST['hp'];
                            $email  = $_POST['email'];
                            $alamat = ucwords($_POST['alamat']);

                            $update = mysqli_query($conn, "UPDATE tb_admin SET
                                        admin_name = '".$nama."',
                                        username = '".$user."',
                                        admin_telp = '".$hp."',
                                        admin_email = '".$email."',
                                        admin_address = '".$alamat."' WHERE admin_id = '".$d->admin_id."' ");

                            if($update){
                                echo '<script>alert("Ubah data Berhasil")</script>';
                                echo '<script>window.location="profile.php"</script>';
                            }else{
                                echo 'gagal' .mysqli_error($conn);
                            }
                        }
                    ?>
                    
                </div>

                <h3>Ubah Password</h3>
                <div class="box">
                    <form action="" method="POST">
                        <input type="password" name="pass1" placeholder="Password" class="inputcontrol" required>
                        <input type="password" name="pass2" placeholder="Konfirmasi Password" class="inputcontrol" required>
                        <input type="submit" name="ubah_password" value="Ubah Password" class="btn">
                    </form>
                    <?php 
                        if (isset($_POST['ubah_password'])){
                            $pass1   = $_POST['pass1'];
                            $pass2     = $_POST['pass2'];

                            if($pass2 != $pass1){
                                echo '<script>alert("Konfirmasi Password baru tidak sesuai")</script>';
                            }else{
                                $u_pass = mysqli_query($conn, "UPDATE tb_admin SET
                                        
                                        password = '".MD5($pass1)."' 
                                        WHERE admin_id = '".$d->admin_id."' ");
                                if($u_pass){
                                    echo '<script>alert("Ubah data Berhasil")</script>';
                                    echo '<script>window.location="profile.php"</script>';
                                }else{
                                    echo 'gagal' .mysqli_error($conn);
                                }
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