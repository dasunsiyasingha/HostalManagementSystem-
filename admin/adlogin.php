<?php
session_start();
error_reporting(0);
include('../includes/config.php');
if($_SESSION['alogin']!=''){
$_SESSION['alogin']='';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
  .bg-form-bg{
    background-color: #afd2ef;
  }
  </style>
  <!-- CSS -->
  <?php include '../libraries/styles.php';?>
</head>
<body class="d-flex align-items-center justify-content-center ">

  <div class="dropdown position-fixed bottom-0 end-0 mb-3 me-3 bd-mode-toggle">
    <button class="btn btn-bd-primary py-2 dropdown-toggle d-flex align-items-center" id="bd-theme" type="button" aria-expanded="false" data-bs-toggle="dropdown" aria-label="Toggle theme (light)">
      <span class="visually-hidden" id="bd-theme-text">Toggle theme</span>
    </button>
    <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="bd-theme-text">
      <li>
        <button type="button" class="dropdown-item d-flex align-items-center active" data-bs-theme-value="light" aria-pressed="true">
          <svg class="bi me-2 opacity-50" width="1em" height="1em"><use href="#sun-fill"></use></svg>
          Light
          <svg class="bi ms-auto d-none" width="1em" height="1em"><use href="#check2"></use></svg>
        </button>
      </li>
      <li>
        <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="dark" aria-pressed="false">
          <svg class="bi me-2 opacity-50" width="1em" height="1em"><use href="#moon-stars-fill"></use></svg>
          Dark
          <svg class="bi ms-auto d-none" width="1em" height="1em"><use href="#check2"></use></svg>
        </button>
      </li>
      <li>
        <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="auto" aria-pressed="false">
          <svg class="bi me-2 opacity-50" width="1em" height="1em"><use href="#circle-half"></use></svg>
          Auto
          <svg class="bi ms-auto d-none" width="1em" height="1em"><use href="#check2"></use></svg>
        </button>
      </li>
    </ul>
  </div>

  <main class="d-flex align-items-center justify-content-center vh-100 vw-100 m-0" style="background-color:#2C3E50;">


    <div class=" p-5  shadow " style=" width: 95%;height:85%; background-color:#8dddec;border-radius:2rem" >
    <div class="row h-100 d-flex align-items-center ">
        <!-- First Part -->
        <div class=" col-5 d-flex align-items-center">

        <div class="ms-5 bg-form-bg  shadow rounded" style="width: 80%; height: 65%;max-height:590px;padding:55px">

                      <form role="form" method="post">
                          <!-- Title -->
                          <h1 class="h3 mb-4 fw-bold text-center text-primary" style="margin-top: -1rem;">Admin Sign in</h1>

                          <!-- Subtitle -->
                          <p class="text-center text-muted mb-2">
                              Enter your credentials to access the admin dashboard.
                          </p>

                          <!-- Error Message -->
                          <small class="form-check-label text-danger text-center d-block mb-3" id="notice" style="visibility: hidden;">
                              Invalid Details.. Please Try Again!
                          </small>

                          <!-- Username Input -->
                          <div class="form-floating mb-4 ">
                              <input type="text" class="form-control border-primary shadow-sm" name="username" id="username" placeholder="Username">
                              <label for="username">Username</label>
                          </div>

                          <!-- Password Input -->
                          <div class="form-floating mb-4">
                              <input type="password" class="form-control border-primary shadow-sm" name="password" id="password" placeholder="Password">
                              <label for="password">Password</label>
                          </div>

                          <!-- Options Row -->
                          <div class="d-flex justify-content-between align-items-center my-3">
                              <!-- Remember Me -->
                              <div class="form-check">
                                  <input class="form-check-input" type="checkbox" value="remember-me" id="flexCheckDefault">
                                  <label class="form-check-label text-muted" for="flexCheckDefault">
                                      Remember Me
                                  </label>
                              </div>
                              <!-- Forgot Password -->
                              <a href="#" class="text-primary fw-bold" style="text-decoration: none;">Forgot Password?</a>
                          </div>

                          <!-- Submit Button -->
                          <button type="submit" name="login" class="btn btn-primary w-100 py-2 shadow">
                              Sign In
                          </button>

                  

                        
                      </form>
                    


                
                
                
            
          </div>  

        </div>
        <!-- Second Part -->
        <div class="col-7 d-flex align-items-center justify-content-center text-white">
        <div >
                    <img src="../assets/picture/adlog-bg (2).png" alt="Hostel Management Image" style="width:68rem;margin-top:-10rem">
                </div>
        </div>
    </div>

      
    </div>
  </main>

  <script src="/docs/5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> 
  <script>
    document.getElementById("username").addEventListener("change", hideNotice);
    document.getElementById("password").addEventListener("change", hideNotice);
  
    function hideNotice(){
      console.log("clicked");
      document.getElementById("notice").style.visibility = "hidden";
    }

  </script>
   <?php 
   if(isset($_POST['login']))
   {
   $username=$_POST['username'];
   $password=$_POST['password'];

   if(empty($username)){
    echo "<script type='text/javascript'>
      var notice = document.getElementById('notice');
      notice.innerHTML = 'Please enter User Name';
      notice.style.visibility = 'visible';
      </script>";

   }else if(empty($password)){
    echo "<script type='text/javascript'>
      var notice = document.getElementById('notice');
      notice.innerHTML = 'Please enter password';
      notice.style.visibility = 'visible';
      </script>";
  }else{
    $sql ="SELECT username, password FROM admin WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $username);
     $stmt->execute();
     $stmt->bind_result($dbusername, $dbpassword);
     $stmt->fetch();
     $stmt->close();
    
    //  $temp = password_hash('1234', PASSWORD_DEFAULT);
    //  echo $temp;
     if ($dbpassword && password_verify($password, $dbpassword)) { 
       $_SESSION['alogin']=$_POST['username'];
       echo "<script type='text/javascript'> document.location ='dashboard.php'; </script>";
     } else{
       echo "<script type='text/javascript'>document.getElementById('notice').style.visibility = 'visible';</script>";
     }

   }
   
   }
   ?>


</body>
</html>
