<?php
include 'db.php';
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
        <link rel="stylesheet" href="style_data.css" />
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
                <h3>Data Kategori</h3>
                <div class="box">
                    <p><a href="tambah_category.php" class="btn0">Tambah Kategori</a></p>
                   <table border="1" cellspacing="0" class="table">
                       <thead>
                           <tr>
                               <th width="60px">No</th>
                               <th>Kategori</th>
                               <th width="300px" >Aksi</th>
                           </tr>
                       </thead>
                       <tbody>
                           <?php 
                                $no = 1;
                                $kategori = mysqli_query($conn, "SELECT * FROM tb_category ORDER BY cotegory_id DESC");
                                if(mysqli_num_rows($kategori)>0){
                                while($row = mysqli_fetch_array($kategori)){

                                
                           ?>
                           <tr>
                               <td><?php echo $no++ ?></td>
                               <td><?php echo $row['category_name']?></td>
                               <td style="text-align: center; vertical-align: middle;">
                                   <a href="edit_kategory.php?id=<?php echo $row['cotegory_id'] ?>" class="btn1">Edit</a>    <a href="proses_hapus.php?idk=<?php echo $row['cotegory_id']?>"onclick="return confirm('Yakin ingin hapus ?')" class="btn2">Hapus</a> 
                               </td>
                           </tr>
                           <?php }}else{ ?>
                            <tr>
                                <td colspan="3">Tidak ada data</td>
                            </tr>

                            <?php } ?>
                       </tbody>
                   </table>
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