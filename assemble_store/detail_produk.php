<?php 
    error_reporting(0);
    include 'db.php';
    $kontak = mysqli_query($conn, "SELECT admin_telp, admin_email, admin_address FROM tb_admin WHERE admin_id = 1");
    $a = mysqli_fetch_object($kontak);

    $produk = mysqli_query($conn, "SELECT * FROM tb_product WHERE product_id= '".$_GET['id']."' ");
    $p = mysqli_fetch_object($produk);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset= "utf-8" >
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>
            Assemble Store
        </title>
        <link rel="stylesheet" href="style_index.css" />
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
                <h1><a href="index.php">
                <img src="images/logo.png" alt="" width="150px" style="transform: scale(1.5,1);transform-origin: left;margin-right=100px"
                </a></h1>
                <ul>
                    <li><a href ="index.php">Home</a></li>
                    <li><a href ="produk.php">Produk</a></li>
                    
                    
                </ul>
            </div> 
        </header>

        <!---search---->

        <div class="search">
            <div class="container">
                <form action="produk.php">
                    <input type="text" name="search" placeholder="Cari produk" value="<?php echo $_GET['search'] ?>">
                    <input type="hidden" name="kat" value="<?php echo $_GET['kat'] ?>">
                    <input type="submit" name="cari" value="Cari Produk">
                </form>
            </div>
        </div>

        <!-- produk detail -->
        <div class="section">
            <div class="container">
                <h3>Detail Produk</h3>
                <div class="box">
                    <div class="col-2">
                        <img src="produk/<?php echo $p->product_image ?>"width="100%">
                        
                    </div>
                    <div class="col-2">
                        <h3><?php echo $p->product_name ?></h3>
                        <h4>Rp. <?php echo number_format($p->product_price) ?></h4>
                        <p>Deskripsi :<br>

                            <?php echo $p->product_description ?>
                        </p>
                        <p><a href="https://api.whatsapp.com/send?phone=<?php echo $a->admin_telp ?>&text=Hai, Saya tertarik dengan produk anda." target="_blank" class="btn0">Hubungi Via Whatsapp</a></p>
                    </div>

                </div>
            </div>
        </div>

        
        


    

        <!--- footer -->
        <div class="footer">
                <hr />
                <h4>Alamat</h4>
                <p><?php echo $a->admin_address ?></p>

                <h4>Email</h4>
                <p><?php echo $a->admin_email ?></p>

                <h4>No. Hp</h4>
                <p><?php echo $a->admin_telp ?></p>
                <p class="copyright">Copyright 2021 - Assemble Strore</p>
            </div>
            <script>
                CKEDITOR.replace('deskripsi');
            </script>
        
    </body>
</html>