<?php
    session_start();
    error_reporting(0);
    include('../includes/config.php');
    if(strlen($_SESSION['alogin'])==0){ 
        header('location:../home/home.php');
    }else{

        if(isset($_POST['register'])){
            
            $stId = $_POST['stid'];
            $stName = $_POST['stname'];
            $stNic = $_POST['stnic'];
            $stBatch = $_POST['stbatch'];
            $stContact = $_POST['stcontact'];
            $stPswd = $_POST['stpwsd'];
            $stRoom = $_POST['stroom'];

            $hashPswd = password_hash($stPswd, PASSWORD_DEFAULT);

            $sql="INSERT INTO  student(studentID, studentName, nic, batch, phoneNumber, pswd, stRoomNo) VALUES('$stId','$stName','$stNic','$stBatch','$stContact','$hashPswd','$stRoom')";
            if (mysqli_query($conn, $sql)) {
                echo "New record created successfully";
              } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
              }

        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration</title>
    <!-- Include Bootstrap CSS -->
    <?php include '../libraries/styles.php';?>

</head>
<body>

    <div class="container-fluid d-flex align-items-center justify-content-center" >
        <div  style="width: 50%; ">
            <div class="alert alert-success mt-4">Place alert box</div>
            <div class="card mt-5 mb-5">
                <div class="card-header">
                    <h3 class="card-title text-center">Student Register</h3>
                </div>
                <div class="card-body">
                    <form role="form" method="post">
                        <div class="form-group mb-3">
                            <label for="stid">Student ID</label>
                            <input type="text" class="form-control" id="stid" name="stid" placeholder="Enter student ID" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="stname">Student Name</label>
                            <input type="text" class="form-control" id="stname" name="stname" placeholder="Enter student name" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="stnic">NIC</label>
                            <input type="text" class="form-control" id="stnic" name="stnic" placeholder="Enter student NIC" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="stpwsd">Student password</label>
                            <input type="text" class="form-control" id="stpwsd" name="stpwsd" placeholder="Enter student password" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="stcontact">Contact Number</label>
                            <input type="text" class="form-control" id="stcontact" name="stcontact" placeholder="Enter contact number" required>
                        </div>
                        <!-- Dropdown Input room number -->
                        <div class="form-group mb-3">
                                    <label for="stroom">Room No</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="stroom" name="stroom"  placeholder="Enter student room" aria-label="Student Room" required>
                                        <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            Dropdown
                                        </button>
                                        <ul class="dropdown-menu">
                                            <!-- <li><a class="dropdown-item" href="#" onclick="stroom('1')">1</a></li>
                                            <li><a class="dropdown-item" href="#" onclick="stroom('2')">2</a></li>
                                            <li><a class="dropdown-item" href="#" onclick="stroom('3')">3</a></li>
                                            <li><a class="dropdown-item" href="#" onclick="stroom('4')">4</a></li> -->
                                           
                                            <?php
                                                    
                                                    $sql = "SELECT roomNo FROM room";
                                                    $results = $conn->query($sql);

                                                    if($results->num_rows > 0)
                                                    {
                                                    foreach($results as $result)
                                                     {?>
                                                        <li <a class="dropdown-item" href="#" onclick="stroom('<?php echo htmlentities($result['roomNo']); ?>')" ><?php echo htmlentities($result['roomNo']); ?></a></li>
                                                <?php  }}?>
                                        </ul>
                                    </div>
                                </div>

                                

                            <div class="form-group mb-3">
                                    <label for="stbatch">Batch</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="stbatch" name="stbatch" placeholder="Enter student Batch" aria-label="Student Room" required>
                                        <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            Dropdown
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#" onclick="setBatch('1st Year')">1st Year</a></li>
                                            <li><a class="dropdown-item" href="#" onclick="setBatch('2nd Year')">2nd Year</a></li>
                                            <li><a class="dropdown-item" href="#" onclick="setBatch('3rd Year')">3rd Year</a></li>
                                            <li><a class="dropdown-item" href="#" onclick="setBatch('4th Year')">4th Year</a></li>
                                        </ul>
                                    </div>
                                </div>

                                <script>
                                function setBatch(value) {
                                    document.getElementById('stbatch').value = value;
                                }

                                function stroom(value) {
                                    document.getElementById('stroom').value = value;
                                }
                                </script>




                                <div class="card-action text-center d-flex justify-content-between">
                                                    <button class="btn"></button>


                                                    <button type="submit" name="register" id="register" class="btn btn-success ">Submit</button>

                                 </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Include Bootstrap JS Bundle with Popper.js -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> -->
        <!-- Fonts and icons -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="assets/js/plugin/webfont/webfont.min.js"></script>
    <?php include '../libraries/script.php';?>
    
</body>
</html> <?php }?>

