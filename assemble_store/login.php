<!DOCTYPE html>
<html>
    <head>
        <meta charset= "utf-8" >
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>
            Login | Assemble Store
        </title>
        <link rel="stylesheet" href="style.css" />
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
    <div class="account-page">
      <div class="container">
        <div class="row">
            <div class="form-container" width="100%">
              <div class="form-btn">
                <span>Login</span>
              </div>
              <form action="" id="RegForm" method="POST">
                <h6>*Halaman ini khusus Admin</h6>
                <input type="text" name="user" placeholder="Username" style="border-radius:5px;"/>
                <input type="password" name="pass" placeholder="Password" style="border-radius:5px;" />
                <button type="submit" name="submit" class="btn">Login</button>
                
                <p><a href="index.php" class="btn">Kembali ke Website</a></p>
                
              </form>

              
              
            </div>
            
        </div>
        
      </div>
      
      <?php
                if(isset($_POST['submit'])){
                    session_start();
                    include 'db.php';
                    $user = mysqli_real_escape_string($conn, $_POST['user']);
                    $pass = mysqli_real_escape_string($conn, $_POST['pass']);

                    $cek = mysqli_query($conn, "SELECT *FROM tb_admin WHERE username = '".$user."' AND password = '".MD5($pass)."'");
                    if(mysqli_num_rows($cek) > 0){
                        $d = mysqli_fetch_object($cek);
                        $_SESSION['status_login'] = true;
                        $_SESSION['a_global'] = $d;
                        $_SESSION['id'] = $d->admin_id;
                        echo '<script>window.location="dashboard.php"</script>';
                    }else{
                        echo '<script>alert("Username atau password anda salah")</script>';
                    }
                }
              ?>
    </div>
    </body>
</html>