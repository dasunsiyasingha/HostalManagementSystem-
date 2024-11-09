<?php
  session_start();
  error_reporting(0);

  include('../includes/config.php');

  if($_SESSION['seclogin']!=''){
    $_SESSION['seclogin']='';
  }
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <!-- CSS -->
  <?php include '../libraries/styles.php';?>
</head>
<body class="d-flex align-items-center justify-content-center py-4 bg-body-tertiary">

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

  <main class="d-flex align-items-center justify-content-center" style="height: 100vh;">
    <div class="bg-white p-5 rounded-3 shadow" style="min-width: 500px; width: 100%;">
      <form role="form" method="post">
        <h1 class="h3 mb-3 fw-normal text-center">Security sign in</h1>

        <small class="form-check-label text-danger" id="notice" style="visibility: hidden;">
            Invalid Details.. Please Try Again!
        </small>

        <div class="form-floating mb-3">
          <input type="text" class="form-control" id="securityID" name="securityID" placeholder="Enter your ID">
          <label for="floatingInput">Security ID</label>
        </div>
        <div class="form-floating">
          <input type="password" class="form-control" id="password" name="password" placeholder="Password">
          <label for="floatingPassword">Password</label>
        </div>

        <div class="form-check text-start my-3">
          <input class="form-check-input" type="checkbox" value="remember-me" id="flexCheckDefault">
          <label class="form-check-label" for="flexCheckDefault">
            Remember me
          </label>
        </div>
        <button class="btn btn-primary w-100 py-2" type="submit" name="login" >Sign in</button>
        
      </form>
    </div>
  </main>

  <script src="/docs/5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script>
    document.getElementById("securityID").addEventListener("change", hideNotice);
    document.getElementById("password").addEventListener("change", hideNotice);
  
    function hideNotice(){
      console.log("clicked");
      document.getElementById("notice").style.visibility = "hidden";
    }

  </script>
  <?php 
  if(isset($_POST['login'])){
  $securityID = $_POST['securityID'];
  $password = $_POST['password'];

  if(empty($securityID)){
    echo "<script type='text/javascript'>
      var notice = document.getElementById('notice');
      notice.innerHTML = 'Please enter security ID';
      notice.style.visibility = 'visible';
      </script>";

   }else if(empty($password)){
    echo "<script type='text/javascript'>
      var notice = document.getElementById('notice');
      notice.innerHTML = 'Please enter password';
      notice.style.visibility = 'visible';
      </script>";
  }else{
    $sql = "SELECT sid, password	FROM securityperson WHERE sid=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s',$securityID);
    $stmt->execute();
    $stmt->bind_result($dbSecID, $dbPassword);
    $stmt->fetch();
    $stmt->close();

    //  $temp = password_hash('1234', PASSWORD_DEFAULT);
    //  echo $temp;

    if($dbPassword && password_verify($password, $dbPassword)){
      $_SESSION['seclogin'] = $_POST['securityID'];
      echo "<script type='text/javascript'> document.location ='dashboard.php'; </script>";
    } else{
      echo "<script type='text/javascript'>
            var notice = document.getElementById('notice');
            notice.innerHTML = 'Invalid Details.. Please Try Again!';
            notice.style.visibility = 'visible';
            </script>";

    }
  }
}

?>
</body>
</html>




