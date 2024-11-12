<?php
    session_start();
    error_reporting(0);
    include('../includes/config.php');
    if(strlen($_SESSION['alogin'])==0){ 
        header('location:../home/home.php');
    }else{
        $availableSt = 0;
        $stuCount = 0;
        $securitycount = 0;
        try{
            $sql = "SELECT COUNT(studentID) AS availableSt FROM student WHERE status = 1";

            if ($result = $conn->query($sql)) {
                $row = $result->fetch_assoc();
                $availableSt = $row['availableSt'];
                
            }else{
                throw new Exception("Query failed: " . $conn->error);
            }

        }catch(Exception $e){
            $availableSt = "conn_error";
        }
//------------------------------------------------
        try{
            $sql = "SELECT COUNT(studentID) AS stucount FROM student WHERE 1";

            if ($result = $conn->query($sql)) {
                $row = $result->fetch_assoc();
                $stuCount = $row['stucount'];
                
            }else{
                throw new Exception("Query failed: " . $conn->error);
            }

        }catch(Exception $e){
            $stuCount = "conn_error";
        }

// =============================================================

        try{
            $sql = "SELECT COUNT(sid) AS availableSecu FROM securityperson WHERE status = 1";

            if ($result = $conn->query($sql)) {
                $row = $result->fetch_assoc();
                $availableSecu = $row['availableSecu'];
                
            }else{
                throw new Exception("Query failed: " . $conn->error);
            }

        }catch(Exception $e){
            $availableSecu = "conn_error";
        }
//------------------------------------------------
        try{
            $sql = "SELECT COUNT(sid) AS securitycount FROM securityperson WHERE 1";

            if ($result = $conn->query($sql)) {
                $row = $result->fetch_assoc();
                $securitycount = $row['securitycount'];
                
            }else{
                throw new Exception("Query failed: " . $conn->error);
            }

        }catch(Exception $e){
            $securitycount = "conn_error";
        }


        // =============================================================

        try{
            $sql = "SELECT COUNT(roomNo) AS roomCount FROM room WHERE 1";

            if ($result = $conn->query($sql)) {
                $row = $result->fetch_assoc();
                $roomCount = $row['roomCount'];
                
            }else{
                throw new Exception("Query failed: " . $conn->error);
            }

        }catch(Exception $e){
            $roomCount = "conn_error";
        }
//----------------------------------------------------------
        try{
            $sql = "SELECT COUNT(*) AS rooms_without_students FROM (SELECT room.roomNo FROM room LEFT JOIN student ON room.roomNo = student.stRoomNo GROUP BY room.roomNo HAVING COUNT(student.stRoomNo) = 0) AS empty_rooms;";

            if ($result = $conn->query($sql)) {
                $row = $result->fetch_assoc();
                $emptyRooms = $row['rooms_without_students'];
                
            }else{
                throw new Exception("Query failed: " . $conn->error);
            }

        }catch(Exception $e){
            $emptyRooms = "conn_error";
        }


        
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin DashBoard</title>
        <!-- CSS Files -->
        <?php include '../libraries/styles.php';?>

    <style>
        
    </style>
</head>
<body >
    <!-- <div class="container text-center " style="width:100vw; height:100vh;"> -->

    <?php include '../components/header.php';?>
<!-- CARDS ROW begin -->
    <div class="container my-5">
        <div class="row">
            <!-- Students in Hostel Card -->
            <div class="col-md-4">
                <div class="card text-white bg-primary mb-3">
                    <div class="card-body text-center">
                        <i class="fas fa-users fa-3x"></i>
                        <h3 class="card-title mt-3"><?php echo htmlspecialchars($availableSt).'/'.htmlspecialchars($stuCount); ?></h3>
                        <p class="card-text">Students in Hostel</p>
                    </div>
                </div>
            </div>

            <!-- Available Security Persons Card -->
            <div class="col-md-4">
                <div class="card text-white bg-success mb-3">
                    <div class="card-body text-center">
                        <i class="fas fa-shield-alt fa-3x"></i>
                        <h3 class="card-title mt-3"><?php echo htmlspecialchars($availableSecu).'/'.htmlspecialchars($securitycount); ?></h3>
                        <p class="card-text">Available Security Persons</p>
                    </div>
                </div>
            </div>

            <!-- Empty Rooms Card -->
            <div class="col-md-4">
                <div class="card text-white bg-warning mb-3">
                    <div class="card-body text-center">
                        <i class="fas fa-bed fa-3x"></i>
                        <h3 class="card-title mt-3"><?php echo htmlspecialchars($emptyRooms).'/'.htmlspecialchars($roomCount); ?></h3>
                        <p class="card-text">Empty Rooms</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- CARDS ROW END -->


        <div class="row border border-primary" style="width:100vw; height:100vh;">
        <div class="row m-auto border border-primary" style="width:60%; height:60%;">
            <div class="col-4 align-self-center " style=height:50%; >

                    <div class="col-md-4 d-flex justify-content-center m-auto mt-4"style="width: 100%; height: 80%;">
                        <div class="card card-secondary" style="width: 100%; height: 100%; cursor: pointer;" role="button" onclick="location.href='manageStudent.php';">
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

        <?php include '../components/footer.php';?>
    <!-- </div> -->
</body>
</html>

<?php } ?>

