<?php 
    include 'db.php';
    $kontak = mysqli_query($conn, "SELECT admin_telp, admin_email, admin_address FROM tb_admin WHERE admin_id = 1");
    $a = mysqli_fetch_object($kontak);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>
            About | Assemble Store
        </title>
        <link rel="stylesheet" href="style_about.css"/>
        
    </head>
    <body>

            
            <header>
                    <div class="container1">
                        <h1><a href="index.php">
                            <img src="images/logo.png" alt="" width="150px" style="transform: scale(1.5,1);transform-origin: left;margin-right=100px"
                        </a></h1>
                        <ul>
                            <li><a href ="index.php">Home</a></li>
                            <li><a href ="produk.php">Produk</a></li>
                            <li><a href ="about.php">About</a></li>

                            <li><a href ="login.php">Login</a></li>
                            
                        </ul>
                    </div> 
                </header>
                <h3>Tentang Web Assemble Store</h3>
                <h5>Assemble Store adalah sebuah website e-commerce yang menjual part-part komputer yang berkualitas dan terjamin. 
                    Toko Online Assemble Berbasis Web yang memberikan akses bagi penjual yang ingin memasarkan produknya.
                    Web ini dibuat dengan tujuan sistem yang memudahkan pembeli dalam membeli produk yang diinginkan.
                    </h5>
                    <h3>Tim :</h3>
            <div class="container">
        <div class="card">
            <img src="images/alimuddin.jpg" alt="Person" class="card__image">
            <p class="card__name">Alimuddin</p>
            <div class="grid-container">

            <div class="grid-child-posts">
                
            </div>

            <div class="grid-child-followers">
                
            </div>

            </div>
            
            <button class="btn draw-border">Anggota 1</button>
            <button class="btn draw-border">Tim Pengembang</button>

        </div>
        <div class="card">
            <img src="images/wahyu.jpg" alt="Person" class="card__image">
            <p class="card__name">Wahyu Djuddah</p>
            <div class="grid-container">

            <div class="grid-child-posts">
                
            </div>

            <div class="grid-child-followers">
                
            </div>

            </div>
            
            <button class="btn draw-border">Anggota 2</button>
            <button class="btn draw-border">Tim Pengembang</button>

        </div>
        <div class="card">
            <img src="images/asra.png" alt="Person" class="card__image">
            <p class="card__name">Muh Azyumardi Azra</p>
            <div class="grid-container">

            <div class="grid-child-posts">
            
            </div>

            <div class="grid-child-followers">
            
            </div>

            </div>
            
            <button class="btn draw-border">Anggota 3</button>
            <button class="btn draw-border">Tim Pengembang</button>

        </div>
        <div class="card">
            <img src="images/yunus.png" alt="Person" class="card__image">
            <p class="card__name">Muh Yunus Ahlul Qijas</p>
            <div class="grid-container">

            <div class="grid-child-posts">
            
            </div>

            <div class="grid-child-followers">
            
            </div>

            </div>
            
            <button class="btn draw-border">Anggota 4</button>
            <button class="btn draw-border">Desainer</button>
        </div>
        <div class="card">
            <img src="images/firda.png" alt="Person" class="card__image">
            <p class="card__name">Firda Ayu Firanti</p>
            <div class="grid-container">

            <div class="grid-child-posts">
            
            </div>

            <div class="grid-child-followers">
                
            </div>

            </div>
            
            <button class="btn draw-border">Anggota 5</button>
            <button class="btn draw-border">Marketing</button>
        </div>
        </div>
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
