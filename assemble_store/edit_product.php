<?php
    session_start();
    include 'db.php';
    if($_SESSION['status_login'] != true){
        echo '<script>window.location = "login.php"</script>';
    }

    $produk = mysqli_query($conn, "SELECT * FROM tb_product WHERE product_id = '".$_GET['id']."' ");
    if(mysqli_num_rows($produk) == 0){
        echo '<script>window.location="data-produk.php"</script>';
    }
    $p = mysqli_fetch_object($produk);
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
        <script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
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
                <h3>Edit Data Produk</h3>
                <div class="box">
                    <form action="" method="POST" enctype="multipart/form-data">
                    
                        <select  class ="inputcontrol" name="kategori" required>
                            <option value="">---Pilih---</option>
                            <?php 
                                $kategori = mysqli_query($conn, "SELECT * FROM tb_category ORDER BY cotegory_id DESC");
                                while($r = mysqli_fetch_array($kategori)){
                            
                            ?>
                            <option value="<?php echo $r['cotegory_id']  ?>" <?php echo ($r['cotegory_id']== $p->cotegory_id)? 'selected':''; ?>><?php echo $r['category_name'] ?></option>
                        <?php } ?>
                        </select>
                        <input type="text" name="nama" class="inputcontrol" placeholder="Nama Produk" value="<?php echo $p->product_name ?>" required>
                        <input type="text" name="harga" class="inputcontrol" placeholder="Harga" value="<?php echo $p->product_price ?>" required>
                        
                        <img src="produk/<?php echo $p->product_image ?>" width="200px">
                        <input type="hidden" name="foto" value="<?php echo $p->product_image ?>">
                        <input type="file" name="gambar" class="inputcontrol">
                        <textarea class="inputcontrol" name="deskripsi" placeholder="Deskripsi" ><?php echo $p->product_description ?></textarea>
                        <select name="status" class="inputcontrol">
                            <option value="">--Pilih--</option>
                            <option value="1"<?php echo ($p->product_status == 1)? 'selected':'' ?>>Aktif</option>
                            <option value="0"<?php echo ($p->product_status == 0)? 'selected':'' ?>>Tidak Aktif</option>
                        </select>
                        <input type="submit" name="submit" value="Submit" class="btn">
                    </form>
                    <?php 
                        if(isset($_POST['submit'])){
                            
                            // menampung data inputan dari form
                            $kategori   = $_POST['kategori'];
                            $nama       = $_POST['nama'];
                            $harga      = $_POST['harga'];
                            $deskripsi  = $_POST['deskripsi'];
                            $status     = $_POST['status'];
                            $foto       = $_POST['foto'];


                            //data gambar yang baru
                            $filename = $_FILES['gambar']['name'];
                            $tmp_name = $_FILES['gambar']['tmp_name'];

                            $type1 = explode('.',$filename);
                            $type2 = $type1[1];


                            $newname = 'produk'.time().'.'.$type2;
                             //menampung data format file yang diizinkan

                             $tipe_diizinkan = array('jpg', 'jpeg', 'png', 'gif');


                            //jika admin ganti gambar
                            if($filename != ''){
                                    if(!array($type2 ,$tipe_diizinkan)){
                                        echo '<script>alert("format file tidak diizinkan")</script>';
                                    }else{
                                        unlink('./produk/'.$foto);
                                        //proses upload file sekaligus insert ke database                                
                                        move_uploaded_file($tmp_name, './produk/' .$newname);
                                        $namagambar = $newname;
                                    }
                                    

                                }else{

                                    $namagambar = $foto;
                                    
                                }
                                //quety update data produk
                                $update = mysqli_query($conn, "UPDATE tb_product SET
                                            cotegory_id = '".$kategori."',
                                            product_name = '".$nama."',
                                            product_price = '".$harga."',
                                            product_description = '".$deskripsi."',
                                            product_image = '".$namagambar."',
                                            product_status = '".$status."'
                                            WHERE product_id = '".$p->product_id."' ");

                                if($update){
                                    echo '<script>alert("ubah data berhasil")</script>';
                                    echo '<script>window.location="data-produk.php"</script>';
                                }else{
                                    echo 'gagal' .mysqli_error($conn);
                                }


                        }


                            //jika admin tidak ganti gambar

                            

                        
                    ?>
                    
                </div>
            </div>
        </div>
        <!---footer--->
        <div class="footer">
                <hr />
                <p class="copyright">Copyright 2021 - Assemble Strore</p>
            </div>
            <script>
                CKEDITOR.replace('deskripsi');
            </script>
    </body>
</html>