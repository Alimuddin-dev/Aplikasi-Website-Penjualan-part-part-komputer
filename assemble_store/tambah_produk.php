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
                <h3>Tambah Data Produk</h3>
                <div class="box">
                    <form action="" method="POST" enctype="multipart/form-data">
                    
                        <select  class ="inputcontrol" name="kategori" required>
                            <option value="">---Pilih---</option>
                            <?php 
                                $kategori = mysqli_query($conn, "SELECT * FROM tb_category ORDER BY cotegory_id DESC");
                                while($r = mysqli_fetch_array($kategori)){
                            
                            ?>
                            <option value="<?php echo $r['cotegory_id']  ?>"><?php echo $r['category_name'] ?></option>
                        <?php } ?>
                        </select>
                        <input type="text" name="nama" class="inputcontrol" placeholder="Nama Produk" required>
                        <input type="text" name="harga" class="inputcontrol" placeholder="Harga" required>
                        <input type="file" name="gambar" class="inputcontrol" required>
                        <textarea class="inputcontrol" name="deskripsi" placeholder="Deskripsi"></textarea>
                        <select name="status" class="inputcontrol">
                            <option value="">--Pilih--</option>
                            <option value="1">Aktif</option>
                            <option value="0">Tidak Aktif</option>
                        </select>
                        <input type="submit" name="submit" value="Submit" class="btn">
                    </form>
                    <?php 
                        if(isset($_POST['submit'])){
                            //print_r($_FILES['gambar']);
                            //menampung inputan dari form

                            $kategori   = $_POST['kategori'];
                            $nama       = $_POST['nama'];
                            $harga      = $_POST['harga'];
                            $deskripsi  = $_POST['deskripsi'];
                            $status     = $_POST['status'];
                            //menampung data file yang diuplaod
                            $filename = $_FILES['gambar']['name'];
                            $tmp_name = $_FILES['gambar']['tmp_name'];

                            $type1 = explode('.',$filename);
                            $type2 = $type1[1];


                            $newname = 'produk'.time().'.'.$type2;

                            

                            //menampung data format file yang diizinkan

                            $tipe_diizinkan = array('jpg', 'jpeg', 'png', 'gif');

                

                            //validasi format file

                            if(!array($type2 ,$tipe_diizinkan)){
                                echo '<script>alert("format file tidak diizinkan")</script>';
                            }else{
                                //proses upload file sekaligus insert ke database
                                
                                move_uploaded_file($tmp_name, './produk/' .$newname);
                                $insert = mysqli_query($conn, "INSERT INTO tb_product VALUES (
                                            null,
                                            '".$kategori."',
                                            '".$nama."',
                                            '".$harga."',
                                            '".$deskripsi."',
                                            '".$newname."',
                                            '".$status."',
                                            null
                                                ) ");

                                if($insert){
                                    echo '<script>alert("Tambah data berhasil")</script>';
                                    echo '<script>window.location="data-produk.php"</script>';
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
            <script>
                CKEDITOR.replace('deskripsi');
            </script>
    </body>
</html>