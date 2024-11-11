

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin DashBoard</title>
        <!-- CSS Files -->
        <?php include '../libraries/styles.php';?>
</head>
<body >
    <!-- <div class="container text-center " style="width:100vw; height:100vh;"> -->

        <div class="row border border-primary" style="width:100vw; height:100vh;">
        <div class="row m-auto border border-primary" style="width:60%; height:60%;">
            <div class="col-4 align-self-center " style=height:50%; >
                <!-- <div class="row justify-content-center align-items-center "style="width: 100%;">  -->

                    <div class="col-md-4 d-flex justify-content-center m-auto mt-4"style="width: 100%; height: 80%;">
                        <div class="card card-secondary" style="width: 100%; height: 100%; cursor: pointer;" role="button" onclick="location.href='viewRegStudent.php';">
                            <div class="card-body skew-shadow position-relative">
                                <h5 class="op-8 text-center position-absolute top-50 start-50 translate-middle fs-2">MANAGE STUDENTS</h5>
                            </div>
                        </div>
                    </div>
                <!-- </div> -->

                </div>
            
            <div class="col-4 align-self-center  " style=height:50%; >
                    <div class="col-md-4 d-flex justify-content-center m-auto mt-4"style="width: 100%; height: 80%;">
                        <div class="card card-secondary" style="width: 100%; height: 100%; cursor: pointer;" role="button" onclick="location.href='manageRooms.php';">
                            <div class="card-body skew-shadow position-relative">
                                <h5 class="op-8 text-center position-absolute top-50 start-50 translate-middle fs-2">MANAGE ROOMS</h5>
                            </div>
                        </div>
                    </div>
            </div>

            
            <div class="col-4 align-self-center  " style=height:50%; >
                    <div class="col-md-4 d-flex justify-content-center m-auto mt-4"style="width: 100%; height: 80%;">
                        <div class="card card-secondary" style="width: 100%; height: 100%; cursor: pointer;" role="button" onclick="location.href='managesecurity.php';">
                            <div class="card-body skew-shadow position-relative">
                                <h5 class="op-8 text-center position-absolute top-50 start-50 translate-middle fs-2">MANAGE SECURITY PERSON</h5>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="col-4 align-self-center  " style=height:50%; >
                    <div class="col-md-4 d-flex justify-content-center m-auto mt-4"style="width: 100%; height: 80%;">
                        <div class="card card-secondary" style="width: 100%; height: 100%; cursor: pointer;" role="button" onclick="location.href='viewSecurityLogs.php';">
                            <div class="card-body skew-shadow position-relative">
                                <h5 class="op-8 text-center position-absolute top-50 start-50 translate-middle fs-2">VIEW SECURITY LOGS</h5>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="col-4 align-self-center  " style=height:50%; >
                    <div class="col-md-4 d-flex justify-content-center m-auto mt-4"style="width: 100%; height: 80%;">
                        <div class="card card-secondary" style="width: 100%; height: 100%; cursor: pointer;" role="button" onclick="location.href='viewStudentLogs.php';">
                            <div class="card-body skew-shadow position-relative">
                                <h5 class="op-8 text-center position-absolute top-50 start-50 translate-middle fs-2">VIEW STUDENT LOGS</h5>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="col-4 align-self-center  " style=height:50%; >
                    <div class="col-md-4 d-flex justify-content-center m-auto mt-4"style="width: 100%; height: 80%;">
                        <div class="card card-secondary" style="width: 100%; height: 100%; cursor: pointer;" role="button" onclick="location.href='viewRoomDetails.php';">
                            <div class="card-body skew-shadow position-relative">
                                <h5 class="op-8 text-center position-absolute top-50 start-50 translate-middle fs-2">VIEW ROOM DETAILS</h5>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
        </div>

    <!-- </div> -->
</body>
</html>

