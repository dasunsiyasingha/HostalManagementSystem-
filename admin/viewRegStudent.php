<?php 
    session_start();
    error_reporting(0);
    include('../includes/config.php');
    if(strlen($_SESSION['alogin'])==0){ 
        header('location:../home/home.php');
    }else{

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View All security Persons details</title>
    <?php
     include '../libraries/styles.php';
     include '../libraries/script.php';?>
    
</head>
<body>
    <div class="container border border-danger" style="height:100vh; width:100vw;" >
        <div class="row mt-5" style="width: 300px">
          <div class="col"><button type="button" onclick="location.href='registerStudent.php';" class="mt-3 ms-4 "
            style="width:80%; height:40px; background-color:#275d8b;border: none; color: white; ">
            <i class="bi bi-plus pt-4 pb-5 "></i> Add new Students
          </button></div>
        </div>
        <div class="row mt-4">
                <div class="col-md-12 mt-3 mb-3 border border-primary bg-primary rounded-2 m-auto"  style="width:95%">
                    <div class= "text text-center  p-2 h3"><b style="color:white;">Manage Students</b></div>
                </div>
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <h4 class="card-title">Registered Students Details</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                    <table id="add-row" class="display table table-striped table-hover dataTable" role="grid"
                        aria-describedby="add-row_info">
                        <thead>
                          <tr role="row">
                            <th class="sorting" tabindex="0" aria-controls="add-row" rowspan="1" colspan="1"
                              aria-label="Id: activate to sort column ascending" style="width: 150.612px;">Student Id</th>

                            <th class="sorting_asc" tabindex="0" aria-controls="add-row" rowspan="1" colspan="1"
                              aria-sort="ascending" aria-label="Name: activate to sort column descending"
                              style="width: 363.613px;">Name</th>
                            
                            <th tabindex="0" class="sorting" aria-controls="add-row" rowspan="1" colspan="1"
                              aria-label="pswd: activate to sort column descending"
                              style="width: 180.613px;">NIC</th>

                            <th style="width: 120.7px;" class="sorting" tabindex="0" aria-controls="add-row" rowspan="1"
                              colspan="1" aria-label="Action: activate to sort column ascending">Phone</th>

                            <th style="width: 90.7px;" class="sorting" tabindex="0" aria-controls="add-row" rowspan="1"
                              colspan="1" aria-label="Action: activate to sort column ascending">Batch</th>
                            
                            <th style="width: 90.7px;" class="sorting" tabindex="0" aria-controls="add-row" rowspan="1"
                            colspan="1" aria-label="Action: activate to sort column ascending">Room No</th>
                            
                            <th style="width: 120.7px;" class="sorting" tabindex="0" aria-controls="add-row" rowspan="1"
                            colspan="1" aria-label="Action: activate to sort column ascending">Action</th>
                          </tr>
                        </thead>
                        <tfoot>
                          <tr>
                            <th rowspan="1" colspan="1">Student Id</th>
                            <th rowspan="1" colspan="1">Name</th>
                            <th rowspan="1" colspan="1">NIC</th>
                            <th rowspan="1" colspan="1">Phone</th>
                            <th rowspan="1" colspan="1">Batch</th>
                            <th rowspan="1" colspan="1">Room No</th>
                            <th rowspan="1" colspan="1">Action</th>
                          </tr>
                        </tfoot>
                        <tbody>

                          <?php 
                          $sql="SELECT studentID, studentName, nic, batch, phoneNumber, stRoomNo FROM student";
                          if ($result = $conn->query($sql)) {
                            while($row = $result->fetch_assoc()){
                              echo '<tr role="row" class="odd">';
                              echo '<td>'.$row['studentID'].'</td>';
                              echo '<td>'.$row['studentName'].'</td>';
                              echo '<td>'.$row['nic'].'</td>';
                              echo '<td>'.$row['phoneNumber'].'</td>';
                              echo '<td>'.$row['batch'].'</td>';
                              // echo '<td>'.$row['stRoomNo'].'</td>';

                              echo '<td class=" text-primary fw-bold" role="button" style="cursor: pointer; width:65px;" data-bs-toggle="modal" data-bs-target="#editStRoom'.$row['stRoomNo'].'" >'.$row['stRoomNo'].' </td>

                            <div class="modal fade" id="editStRoom'.$row['stRoomNo'].'" tabindex="-1" role="dialog" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header border-0">
                                    <h5 class="modal-title">
                                      <span class="fw-mediumbold"> Change</span>
                                      <span class="fw-light"> Status </span>
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <p class="small">
                                     Change <span class="fw-bold">'.$row['studentID'].' ID </span> Student\'s Room.
                                    </p>
                                    <form role="form" method="post">
                                    <div class="row">
                                    <div class="col-sm-12 ">
                                    
                                    <div class="form-check form-text">
                                    <label class="form-label" for="roomNum">Room Number </label>
                                    <input class="form-control" type="text" id="roomNum'.$row['studentID'].'" value="'.$row['stRoomNo'].'" name="editroomNum" style="width:100px;" >
                                    <input type="text" name="stid" id="stid" value="'.$row['studentID'].'" style="height:2px; width:100px; visibility:hidden;">
                                    </div>
                                    </div>
                                    
                                    </div>
                                      <div class="modal-footer border-0">
                                        <button type="submit" id="roomchange'.$row['studentID'].'" name="roomchange" class="btn btn-primary">
                                          Change
                                        </button>
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">
                                          Close
                                        </button>
                                      </div>
                                    </form>
                                  </div>
                                  
                                </div>
                              </div>
                            </div>';

                            echo '<td>
                              <div class="form-button-action">
                                <button type="button" title=""
                                  class="btn btn-link btn-primary btn-lg" data-original-title="Edit Security  "
                                  data-bs-toggle="modal" data-bs-target="#updateStudent'.$row['studentID'].'">
                                  <i class="fa fa-edit"></i>
                                </button>

                                   <!--EDIT STUDENT Modal -->
                    <div class="modal fade" id="updateStudent'.$row['studentID'].'" tabindex="-1" role="dialog" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header border-0">
                            <h5 class="modal-title">
                              <span class="fw-mediumbold"> Edit</span>
                              <span class="fw-light"> Student</span>
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <p class="small">
                              Update Student Details
                            </p>
                            <form role="form" method="post">
                            <input id="addcrrid" name="current_stid" type="text" value="'.$row['studentID'].'" style="height:2px; visibility:hidden" />
                              <div class="row">
                                <div class="col-sm-12 ">
                                  <div class="form-group form-group-default">
                                    <label>Security ID</label>
                                    <input id="addid" name="up_id" type="text" class="form-control" value="'.$row['studentID'].'" required />
                                  </div>
                                </div>
                                <div class="col-sm-12">
                                  <div class="form-group form-group-default">
                                    <label>Name</label>
                                    <input id="addname" name="up_name" type="text" class="form-control" value= "'.$row['studentName'].'"/>
                                  </div>
                                </div><div class="col-sm-12">
                                  <div class="form-group form-group-default">
                                    <label>NIC</label>
                                    <input id="addnic" name="up_nic" type="text" class="form-control" value='.$row['nic'].' required />
                                  </div>
                                </div><div class="col-sm-12">
                                  <div class="form-group form-group-default">
                                    <label>Phone Number</label>
                                    <input id="addphone" name="up_phone" type="text" class="form-control" value='.$row['phoneNumber'].' required />
                                  </div>
                                </div><div class="col-sm-12">
                                  <div class="form-group form-group-default">
                                    <label for="selectBatch">Select Batch</label>
                                    <select class="form-select form-control" id="selectBatch">
                                      <option>1st Year</option>
                                      <option>2nd Year</option>
                                      <option>3rd Year</option>
                                      <option>4th Year</option>
                                      <option>5th Year</option>
                                    </select>
                                  </div>
                                </div>

                                <div class="col-md-6">
                                  <!-- <div class="form-group form-group-default">
                                    <label>Status</label>
                                    <input id="addstatus" type="text" class="form-control" placeholder="fill age" />
                                  </div> -->
                                </div>

                              </div>
                              <!-- </form> -->
                              <div class="modal-footer border-0">
                                <button type="submit" id="update" name="update" class="btn btn-primary">
                                  Add
                                </button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">
                                  Close
                                </button>
                              </div>
                            </form>
                          </div>
                          
                        </div>
                      </div>
                    </div>
                                


                                <button type="button" class="btn btn-link btn-danger" data-bs-toggle="modal" data-bs-target="#deleteStudent'.$row['studentID'].'"
                                  data-original-title="Remove">
                                  <i class="fa fa-times"></i>
                                </button>

                                 <!--DELETE Student Modal -->
                    <div class="modal fade" id="deleteStudent'.$row['studentID'].'" tabindex="-1" role="dialog" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header border-0">
                            <h5 class="modal-title">
                              <span class="fw-mediumbold"> Delete</span>
                              <span class="fw-light">Security </span>
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <p class="small">
                              You are going to delete <span class="fw-bold">'.$row['studentID'].' ID </span>. Please confirm to delete?
                            </p>
                            <form role="form" method="post">
                            <input id="deleteid" name="delete_sid" type="text" class="form-control" value="'.$row['studentID'].'" style="visibility:hidden" />
                              <div class="modal-footer border-0">
                                <button type="submit" id="delete" name="delete" class="btn btn-primary">
                                  DELETE
                                </button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">
                                  Close
                                </button>
                              </div>
                            </form>
                          </div>
                          
                        </div>
                      </div>
                    </div>
                              </div>
                            </td>';
                              echo '</tr>';
                            }
                          
                          }



                          
                          ?>
                          
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>

    </div>

    <!--   Core JS Files   -->
    <script src="../assets/js/core/jquery-3.7.1.min.js"></script>
      <script src="../assets/js/core/popper.min.js"></script>
      <script src="../assets/js/core/bootstrap.min.js"></script>

      <!-- jQuery Scrollbar -->
      <script src="../assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
      <!-- Datatables -->
      <script src="../assets/js/plugin/datatables/datatables.min.js"></script>
      <!-- Kaiadmin JS -->
      <script src="../assets/js/kaiadmin.min.js"></script>
      <!-- Kaiadmin DEMO methods, don't include it in your project! -->
      <script src="../assets/js/setting-demo2.js"></script>
    <script>
      $(document).ready(function () {
        $("#basic-datatables").DataTable({});

        $("#multi-filter-select").DataTable({
          pageLength: 5,
          initComplete: function () {
            this.api()
              .columns()
              .every(function () {
                var column = this;
                var select = $(
                  '<select class="form-select"><option value=""></option></select>'
                )
                  .appendTo($(column.footer()).empty())
                  .on("change", function () {
                    var val = $.fn.dataTable.util.escapeRegex($(this).val());

                    column
                      .search(val ? "^" + val + "$" : "", true, false)
                      .draw();
                  });

                column
                  .data()
                  .unique()
                  .sort()
                  .each(function (d, j) {
                    select.append(
                      '<option value="' + d + '">' + d + "</option>"
                    );
                  });
              });
          },
        });

        // Add Row
        $("#add-row").DataTable({
          pageLength: 5,
        });

        var action =
          '<td> <div class="form-button-action"> <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

        $("#addRowButton").click(function () {
          $("#add-row")
            .dataTable()
            .fnAddData([
              $("#addName").val(),
              $("#addPosition").val(),
              $("#addOffice").val(),
              action,
            ]);
          $("#addRowModal").modal("hide");
        });
      });
    </script>
</body>
</html>

<?php

if(isset($_POST['roomchange'])){
  $st_Id = $_POST['stid'];
  $ed_roomNum = $_POST['editroomNum'];

  $sql = "UPDATE student SET stRoomNo = '$ed_roomNum' WHERE studentID = '$st_Id';";

  if (mysqli_query($conn, $sql)) {
    echo "Student Room is changed.";
  } else {
      echo "Student Room changing Error: " . $sql . "<br>" . mysqli_error($conn);
  }
}


if(isset($_POST['update'])){
  $current_stId = $_POST['current_stid'];
  $up_stId = $_POST['up_id'];
  $up_name = $_POST['up_name'];
  $up_nic = $_POST['up_nic'];
  $up_phone = $_POST['up_phone'];
  $up_batch = $_POST['up_batch'];

  $sql = "UPDATE student SET studentID = '$up_stId', studentName = '$up_name', nic = '$up_nic', batch = '$up_batch', phoneNumber = '$up_phone' WHERE studentID = '$current_stId';";

  if (mysqli_query($conn, $sql)) {
    echo "Student Details Updated.";
  } else {
      echo "Student Details Updating Error: " . $sql . "<br>" . mysqli_error($conn);
  }
}


if(isset($_POST['delete'])){
  $st_Id = $_POST['delete_sid'];

  $sql = "DELETE FROM student WHERE studentID = '$st_Id';";

  if (mysqli_query($conn, $sql)) {
    echo "Student Room is changed.";
  } else {
      echo "Student Room changing Error: " . $sql . "<br>" . mysqli_error($conn);
  }
}


} ?>
