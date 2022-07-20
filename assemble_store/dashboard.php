<?php
    session_start();
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
            Assemble Store Dashboard
        </title>
        <link rel="stylesheet" href="style_dashboard.css" />
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
                <h3>Dashboard</h3>
                <div class="box">
                    <h4>Selamat Datang <?php echo $_SESSION['a_global']->admin_name ?> di Assemble Store</h4>
                    <p><a href="index.php" target="_blank" class="btn">Menuju Website</a></p>
                </div>
                
            </div>
        </div>
        <!---footer--->
        <div class="footer">
                <hr />
                <p class="copyright">Copyright <script>document.write(new Date().getFullYear())</script> - Assemble Strore</p>
            </div>
    </body>
</html>