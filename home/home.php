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
<div class="page-inner mx-auto d-flex justify-content-center" style="width:100vw; height:100vh;">
    
    <!-- Background div for all cards -->
    <div class="p-5 shadow-lg d-flex justify-content-center" style="width: 99.5%; min-width: 900px; height: 63%; background-color: #8dddec; border-radius: 20px;">
    <div>
        <h3 class="fw-bold" style="color: black; margin-top: -1rem; font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;margin-left: -49rem">
            HMS.
        </h3>
        <img src="../assets/picture/bg_img.png" alt="Image" class="image mt-0" style="margin-right: -50rem">
    </div>

    <div class="ms-3" >
        <h1 class="mb-4 fw-bold" style="margin-top: 9rem; margin-left: -45rem;">
            Manage your hostel<br> and keep everything organized,<br> all in one place!
        </h1>
        <p class="mb-5" style="margin-left: -45rem;">
            Choose your login type: Admin, Student, or Security, to access customized features<br> and tools tailored for your role
        </p>
    </div>
</div>

        
        

        
    </div>      

</div> 
<div class="row justify-content-center mx-auto d-flex w-100" style="margin-top: -17rem;"  > 

            <div class="col-md-4 d-flex justify-content-center">
                <div class="card " style="width: 450px; height: 200px; cursor: pointer;background-color: #a9afff;" role="button" onclick="location.href='../admin/adlogin.php';">
                    <div class="card-body skew-shadow position-relative">
                        <h5 class="op-8 text-center position-absolute top-50 start-50 translate-middle fs-2 fw-bold " style="color: black;">ADMIN SIGN IN</h5>
                    </div>
                </div>
            </div>

            <div class="col-md-4 d-flex justify-content-center">
                <div class="card  " style="width: 450px; height: 200px; cursor: pointer;background-color: #a9afff;" role="button" onclick="location.href='../student/stlogin.php';">
                    <div class="card-body bubble-shadow position-relative">
                        <h5 class="op-8 text-center position-absolute top-50 start-50 translate-middle fs-2 fw-bold" style="color: black;">STUDENT SIGN IN</h5>
                    </div>
                </div>
            </div>

            <div class="col-md-4 d-flex justify-content-center">
                <div class="card  " style="width: 450px; height: 200px; cursor: pointer;background-color: #a9afff" role="button" onclick="location.href='../securityPersons/selogin.php';">
                    <div class="card-body curves-shadow position-relative">
                        <h5 class="op-8 text-center position-absolute top-50 start-50 translate-middle fs-2 fw-bold" style="color: black;">SECURITY PERSON SIGN IN</h5>
                    </div>
                </div>
            </div>




</body>
</html>
