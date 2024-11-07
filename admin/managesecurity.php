<?php
  session_start();
  error_reporting(0);
  include ('../includes/config.php');
  if(strlen($_SESSION['alogin'])==0){
    header('location:../home/home.php');
  }else{

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <?php
     include '../libraries/styles.php';
     include '../libraries/script.php';?>

     <style>
      /* Green color for the switch when checked */
                         /* Remove shadow for a clean look */
      
.status-toggle:checked {
  background-color:#27e80d; /* Bootstrap green */
  border-color: #bdf6b6;     /* Bootstrap green */
  box-shadow: none;                    /* Remove shadow for a clean look */
}

/* Optional: transition for a smooth color change */
.status-toggle {
  transition: background-color 0.6s ease, border-color 0.6s ease;
}

     </style>

</head>

<body>
  <div class="row  m-auto " style="width:100vw; height:100vh; background-color:#f5f5f5">
    <div class="row  m-auto " style="width:70vw; height:100vh; background-color:#ffffff">
      <div>
        <h3 class=" card-title text-center mt-3" style="color:#507297">Security Management</h3>
        <hr style="border: 1px solid #507297; width: 100%; mt-3;">
        <div class="row">
          <div class="col-6">
            <button type="button" class="mt-3 ms-5"
            style="width:80%; height:40px; background-color:#275d8b;border: none; color: white; " data-bs-toggle="modal"
            data-bs-target="#addsecurityperson">
            <i class="bi bi-plus pt-4 pb-5 "></i> Add new security person
          </button>
          </div>
          <div class="col-6">
            
          <button type="button" class="mt-3 ms-5"
            style="width:80%; height:40px; background-color:#275d8b;border: none; color: white; " onclick="location.href='access_security.php';">
            <i ></i> Access security
          </button> 
          </div>
       

 
          <div class="row m-auto">
            <!-- <div class="card-body"> -->

            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <div class="d-flex align-items-center">
                    <!-- <button -->
                    <!-- class="btn btn-primary btn-round ms-auto" -->
                    <!-- data-bs-toggle="modal" -->
                    <!-- data-bs-target="#addsecurityperson" -->

                    <!-- <i class="fa fa-plus"></i> -->
                    <!-- Add Row -->
                    <!-- </button> -->
                  </div>
                </div>
                <div class="card-body">
                  <!-- Modal -->
                  <div class="modal fade" id="addsecurityperson" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header border-0">
                          <h5 class="modal-title">
                            <span class="fw-mediumbold"> Add</span>
                            <span class="fw-light"> New Security </span>
                          </h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <p class="small">
                            Create a new row using this form, make sure you
                            fill them all
                          </p>
                          <form role="form" method="post">
                            <div class="row">
                              <div class="col-sm-12 ">
                                <div class="form-group form-group-default">
                                  <label>Security ID</label>
                                  <input id="addid" name="id" type="text" class="form-control" placeholder="Enter Security Id" required />
                                </div>
                              </div>
                              <div class="col-sm-12">
                                <div class="form-group form-group-default">
                                  <label>Name</label>
                                  <input id="addname" name="name" type="text" class="form-control" placeholder="Enter name" />
                                </div>
                              </div><div class="col-sm-12">
                                <div class="form-group form-group-default">
                                  <label>Password</label>
                                  <input id="addpassword" name="password" type="password" class="form-control" required />
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
                              <button type="submit" id="addRowButton" name="register" class="btn btn-primary">
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




                  <!-- ooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooo -->
                    <!--  EDIT STATUS Modal -->
                  

                  <!-- 00000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000 -->


                   <!-- ooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooo -->
                    <!--  DELETE Modal -->
                    <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-hidden="true">
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
                            Create a new row using this form, make sure you
                            fill them all
                          </p>
                          <form role="form" method="post">
                            <div class="row">
                              <div class="col-sm-12 ">
                                <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="editstatusbox" name="statuscheck">
                                <label class="form-check-label" for="flexSwitchCheckDefault">Status</label>

                                </div>
                              </div>

                            </div>
                            <!-- </form> -->
                            <div class="modal-footer border-0">
                              <button type="submit" id="deletebutton" name="delete" class="btn btn-primary">
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
                  </div>

                  <!-- 00000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000 -->

                  <table class="mt-5">

                    <div class="table-responsive">
                      <!-- <div id="add-row_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4"><div class="row"><div class="col-sm-12 col-md-6"><div class="dataTables_length" id="add-row_length"><label>Show <select name="add-row_length" aria-controls="add-row" class="form-control form-control-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div><div class="col-sm-12 col-md-6"><div id="add-row_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="add-row"></label></div></div></div><div class="row"><div class="col-sm-12"> -->
                      <table id="add-row" class="display table table-striped table-hover dataTable" role="grid"
                        aria-describedby="add-row_info">
                        <thead>
                          <tr role="row">
                            <th class="sorting" tabindex="0" aria-controls="add-row" rowspan="1" colspan="1"
                              aria-label="Id: activate to sort column ascending" style="width: 249.612px;">Security Id</th>
                            <th class="sorting_asc" tabindex="0" aria-controls="add-row" rowspan="1" colspan="1"
                              aria-sort="ascending" aria-label="Name: activate to sort column descending"
                              style="width: 363.613px;">Name</th>
                            
                            <th tabindex="0" class="sorting" aria-controls="add-row" rowspan="1" colspan="1"
                              aria-label="pswd: activate to sort column descending"
                              style="width: 260.613px;">Password</th>

                            <th style="width: 120.7px;" class="sorting" tabindex="0" aria-controls="add-row" rowspan="1"
                              colspan="1" aria-label="Action: activate to sort column ascending">Status</th>

                            <th style="width: 120.7px;" class="sorting" tabindex="0" aria-controls="add-row" rowspan="1"
                              colspan="1" aria-label="Action: activate to sort column ascending">Action</th>
                          </tr>
                        </thead>
                        <tfoot>
                          <tr>
                            <th rowspan="1" colspan="1">Security Id</th>
                            <th rowspan="1" colspan="1">Name</th>
                            <th rowspan="1" colspan="1">Password</th>
                            <th rowspan="1" colspan="1">Status</th>
                            <th rowspan="1" colspan="1">Action</th>
                          </tr>
                        </tfoot>
                        <tbody>
                          <tr role="row" class="odd">
                            <td class="sorting_1">Airi Satou</td>
                            <td>Accountant</td>
                            <td>password1234</td>

                            <td>
                              <div class="form-check form-switch">
                                <input class="form-check-input status-toggle" type="checkbox" role="switch" id="st_status">
                                <label class="form-check-label" for="st_status" id="statusLabel"></label>
                              </div>
                              
                            </td>

                            <td>
                              <div class="form-button-action">
                                <button type="button" title=""  data-bs-toggle="modal" data-bs-target="#updateSecurity" 
                                  class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
                                  <i class="fa fa-edit"></i>
                                </button>

                              
                                <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-danger"
                                  data-original-title="Remove">
                                  <i class="fa fa-times"></i>
                                </button>
                              </div>
                            </td>
                          </tr>

                          <?php 
                          $sql = "SELECT securityperson.sid AS s_id, securityperson.name AS s_name, securityperson.password AS s_pswd, securitylogs.status AS s_status FROM securityperson LEFT JOIN securitylogs ON securityperson.sid = securitylogs.sid AND securitylogs.timestamps = (SELECT MAX(timestamps) FROM securitylogs AS sl WHERE sl.sid = securityperson.sid);";
                          if ($result = $conn->query($sql)) {
                            while($row = $result->fetch_assoc()){
                              echo '<tr role="row" class="odd">';
                              echo '<td>'.$row['s_id'].'</td>';
                              echo '<td>'.$row['s_name'].'</td>';
                              echo '<td>'.$row['s_pswd'].'</td>';
                              // echo '<td>'.$row['s_status'].'</td>';

                              $color = !empty($row['s_status']) ? 'success' : 'danger';
                              $status = !empty($row['s_status']) ? 'ON' : 'OFF';
                              $checked = !empty($row['s_status']) ? 'checked' : '';
                              $display = !empty($row['s_status']) ? '' : 'none';

                              echo '<td>
                              <div class="form-check form-switch">
                                <span class="badge rounded-2 p-2 text-bg-'.$color.'" role="button" id="s_status'.$row['s_id'].'" style="cursor: pointer; width:65px;" data-bs-toggle="modal" data-bs-target="#editstatus'.$row['s_id'].'" >'.$status.' </span>
                              
                            </td>
                            
                            <div class="modal fade" id="editstatus'.$row['s_id'].'" tabindex="-1" role="dialog" aria-hidden="true">
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
                                      Create a new row using this form, make sure you
                                      fill them all
                                    </p>
                                    <form role="form" method="post">
                                      <div class="row">
                                        <div class="col-sm-12 ">
                                        <input type="text" name="id" id="id" value="'.$row['s_id'].'" style="visibility:hidden">
                                          <div class="form-check form-switch">
                                          <input class="form-check-input" type="checkbox" role="switch" id="editstatusbox'.$row['s_id'].'" name="statuscheck" '.$checked.'>
                                          <label class="form-check-label" for="statuscheck">Status '.$row['s_id'].'</label>
                                          </div>

                                          <div class="form-check form-text" style="display:'.$display.'">
                                          <label class="form-label" for="note">Note '.$row['s_id'].'</label>
                                          <input class="form-input" type="text" id="note'.$row['s_id'].'" name="note" value="1" '.$checked.'>
                                          </div>
                                        </div>

                                      </div>
                                      <!-- </form> -->
                                      <div class="modal-footer border-0">
                                        <button type="submit" id="statuschange'.$row['s_id'].'" name="statuschange" class="btn btn-primary">
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
                                  data-bs-toggle="modal" data-bs-target="#updateSecurity'.$row['s_id'].'">
                                  <i class="fa fa-edit"></i>
                                </button>

                                   <!--EDIT SECURITY Modal -->
                    <div class="modal fade" id="updateSecurity'.$row['s_id'].'" tabindex="-1" role="dialog" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header border-0">
                            <h5 class="modal-title">
                              <span class="fw-mediumbold"> Edit</span>
                              <span class="fw-light">Security '.$row['s_id'].'</span>
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <p class="small">
                              Create a new row using this form, make sure you
                              fill them all
                            </p>
                            <form role="form" method="post">
                            <input id="addid" name="current_sid" type="text" class="form-control" value="'.$row['s_id'].'" style="visibility:hidden" />
                              <div class="row">
                                <div class="col-sm-12 ">
                                  <div class="form-group form-group-default">
                                    <label>Security ID</label>
                                    <input id="addid" name="up_id" type="text" class="form-control" value="'.$row['s_id'].'" required />
                                  </div>
                                </div>
                                <div class="col-sm-12">
                                  <div class="form-group form-group-default">
                                    <label>Name</label>
                                    <input id="addname" name="up_name" type="text" class="form-control" value= "'.$row['s_name'].'"/>
                                  </div>
                                </div><div class="col-sm-12">
                                  <div class="form-group form-group-default">
                                    <label>Password</label>
                                    <input id="addpassword" name="up_password" type="password" class="form-control" value='.$row['s_pswd'].' required />
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
                                


                                <button type="button" class="btn btn-link btn-danger" data-bs-toggle="modal" data-bs-target="#deleteSecurity'.$row['s_id'].'"
                                  data-original-title="Remove">
                                  <i class="fa fa-times"></i>
                                </button>

                                 <!--DELETE SECURITY Modal -->
                    <div class="modal fade" id="deleteSecurity'.$row['s_id'].'" tabindex="-1" role="dialog" aria-hidden="true">
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
                              You are going to delete '.$row['s_id'].' ID. Please confirm to delete?
                            </p>
                            <form role="form" method="post">
                            <input id="deleteid" name="delete_sid" type="text" class="form-control" value="'.$row['s_id'].'" style="visibility:hidden" />
                              <div class="modal-footer border-0">
                                <button type="submit" id="update" name="update" class="btn btn-primary">
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
                </table>
              </div>
            </div>
          </div>




        </div>
      </div>

      <!-- <div >
                  <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
                  <i class="fa fa-edit"></i>
                  </button>
                
                  <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove">
                  <i class="fa fa-times"></i>
                  </button>
                  </div> -->





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
            lengthMenu: [[5, 10, 25, 50, 100, -1], [5, 10, 25, 50, 100, "All"]]
          });

          var button = '<td> <div class="form-check form-switch"> <input class="form-check-input status-toggle" type="checkbox" role="switch" id="st_status"> <label class="form-check-label" for="st_status" id="statusLabel"></label> </div> </td>'
          var action =
            '<td> <div class="form-button-action"> <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

          
          $("#addRowButton").click(function () {
            $("#add-row")
              .dataTable()
              .fnAddData([
                $("#addid").val(),
                $("#addname").val(),
                $("#addpassword").val(),

                button,
                action,
              ]);
            $("#addRowModal").modal("hide");
          });
        });
      </script>














      <!-- <div class="row border border-primary" style="width:100vw; height:100vh;"> -->
      <!-- <div class="row border border-secondary " style="width:100%; height:50%;"> -->

      <!-- <div class="row border border-danger " style="width:100%; height:50%;"><div class="card-action text-center d-flex justify-content-between"> -->
      <!-- <div>  <button class="btn  mt-5 mb-5 p-3"  style="background-color:#1591ea; width:100%;" >Delete Security</button> -->

      <!-- </div> -->

      <!-- <div class="row border border-danger " style="width:100%; height:50%;"></div> -->
      <!-- <div> <button  class="btn p-3 ms-5" style="background-color:#1591ea; width:95%;" >ADD Security</button> -->

      <!-- </div> -->
</body>

</html>

<?php
if(isset($_POST['register'])){

  $id = $_POST['id'];
  $name = $_POST['name'];
  $password = $_POST['password'];
  echo $id;

  if($id == '' && $password == ''){
    echo "Please enter password and id";
  }else{
    $sql="INSERT INTO securityperson(sid, name, password) VALUES('$id', '$name', '$password')";
    if (mysqli_query($conn, $sql)) {
        echo "room New record created successfully";
    } else {
        echo "room Error: " . $sql . "<br>" . mysqli_error($conn);
    }
  }

}

if(isset($_POST['statuschange'])){

  $status = $_POST['statuscheck'];
  $id = $_POST['id'];
  $note = $_POST['note'];
  
  $statusval = $status ? '1' : '0';

  if($id == '' ){
    echo "Have a some Errors. Please Try Again";
  }else{
    if($statusval){

      //CHECK IF END TIME HAS NULL BEFORE INSERT NEW ROW
      $sql="SELECT start_time FROM securitylogs WHERE sid = '$id' AND (end_time IS NULL OR end_time = '') ORDER BY timestamps DESC LIMIT 1";
      if ($result = $conn->query($sql)) {

        $row = $result->fetch_assoc();
        if($row && !empty($row['start_time'])){ // CHECK START TIME HAVE A VALUE
          echo "He is already working (ON)";
        }else {
          $sql = "INSERT INTO securitylogs(sid, status, start_time, end_time) VALUES('$id', '$statusval', NOW(), '')";
          if (mysqli_query($conn, $sql)) {
              echo "New securitylogs record created successfully";
          } else {
              echo "securitylogs Error: " . $sql . "<br>" . mysqli_error($conn);
          }
          
        }
      }
      $result->free();
    }else{
      
      $sql="UPDATE securitylogs SET note='$note', status='$statusval', end_time= NOW() WHERE sid='$id'  AND (end_time IS NULL OR end_time = '') ORDER BY timestamps DESC LIMIT 1";
      if (mysqli_query($conn, $sql)) {
          echo "securitylogs record UPDATE successfully";
      } else {
          echo "securitylogs Error: " . $sql . "<br>" . mysqli_error($conn);
      }
    }
  }

}

if(isset($_POST['update'])){
  $current_sid = $_POST['current_sid'];
  $up_sid = $_POST['up_id'];
  $up_name = $_POST['up_name'];
  $up_password = $_POST['up_password'];

  $sql = "UPDATE securityperson SET securityperson.sid = '$up_sid', securityperson.name = '$up_name', securityperson.password = '$up_password' WHERE securityperson.sid = '$current_sid'";
  if (mysqli_query($conn, $sql)) {
    echo 'securityperson Update is Successful';
  }else{
    echo "securityperson Error: " . $sql . "<br>" . mysqli_error($conn);
  }

}

} ?>

