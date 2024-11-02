<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <!-- css -->
     <?php include '../libraries/styles.php';?>
</head>
<body style="margin:auto; height:100vh;">
<div class="page-inner mx-auto d-flex align-items-center justify-content-center" style="width:100vw; height:100vh;">
    
    <!-- Background div for all cards -->
    <div class="bg-light p-5 rounded shadow-lg d-flex align-items-center justify-content-center" style="width: 80%; min-width: 900px; height:500px;">

        <!-- Center the row within the background div -->
        <div class="row justify-content-center align-items-center w-100"> 

            <div class="col-md-4 d-flex justify-content-center">
                <div class="card card-secondary" style="width: 290px; height: 200px; cursor: pointer;" role="button" onclick="location.href='../admin/adlogin.php';">
                    <div class="card-body skew-shadow position-relative">
                        <h5 class="op-8 text-center position-absolute top-50 start-50 translate-middle fs-2">ADMIN SIGN IN</h5>
                    </div>
                </div>
            </div>

            <div class="col-md-4 d-flex justify-content-center">
                <div class="card card-secondary bg-secondary-gradient" style="width: 290px; height: 200px; cursor: pointer;" role="button" onclick="location.href='../student/stlogin.php';">
                    <div class="card-body bubble-shadow position-relative">
                        <h5 class="op-8 text-center position-absolute top-50 start-50 translate-middle fs-2">STUDENT SIGN IN</h5>
                    </div>
                </div>
            </div>

            <div class="col-md-4 d-flex justify-content-center">
                <div class="card card-secondary bg-secondary-gradient" style="width: 290px; height: 200px; cursor: pointer;" role="button" onclick="location.href='../securityPersons/selogin.php';">
                    <div class="card-body curves-shadow position-relative">
                        <h5 class="op-8 text-center position-absolute top-50 start-50 translate-middle fs-2">SECURITY PERSON SIGN IN</h5>
                    </div>
                </div>
            </div>

        </div>
    </div>      

</div>      
</body>
</html>
