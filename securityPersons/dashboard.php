<?php
    session_start();
    error_reporting(0);
    include('../includes/config.php');

    
    if(strlen($_SESSION['seclogin'])==0){ 
        header('location:../home/home.php');
    }else{
        $sid = $_SESSION['seclogin'];
        $sql = "SELECT site_access FROM securityperson WHERE sid = '$sid'";

        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        
        if($row['site_access']=='0'){
            header('siteBlock.php');
        }else{
        

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
        <!-- CSS Files -->
        <?php include '../libraries/styles.php';
              include '../libraries/script.php'; ?>
</head>
<body >
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
                  <!-- ADD SECURITY PERSON Modal -->
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
                              aria-label="Id: activate to sort column ascending" style="width: 249.612px;">Student Id</th>
                            <th class="sorting_asc" tabindex="0" aria-controls="add-row" rowspan="1" colspan="1"
                              aria-sort="ascending" aria-label="Name: activate to sort column descending"
                              style="width: 363.613px;">Name</th>
                            <th class="sorting_asc" tabindex="0" aria-controls="add-row" rowspan="1" colspan="1"
                              aria-sort="ascending" aria-label="Name: activate to sort column descending"
                              style="width: 363.613px;">Batch</th>
                            <th class="sorting_asc" tabindex="0" aria-controls="add-row" rowspan="1" colspan="1"
                              aria-sort="ascending" aria-label="Name: activate to sort column descending"
                              style="width: 363.613px;">Note</th>
                            <th style="width: 120.7px;" class="sorting" tabindex="0" aria-controls="add-row" rowspan="1"
                              colspan="1" aria-label="Action: activate to sort column ascending">Status</th>

                          </tr>
                        </thead>
                        <tfoot>
                          <tr>
                            <th rowspan="1" colspan="1">Security Id</th>
                            <th rowspan="1" colspan="1">Name</th>
                            <!-- <th rowspan="1" colspan="1">Password</th> -->
                            <th rowspan="1" colspan="1">Status</th>
                          </tr>
                        </tfoot>
                        <tbody>

                          <?php 
                          $sql = "SELECT securityperson.sid AS s_id, securityperson.name AS s_name, securityperson.status AS s_status FROM securityperson LEFT JOIN securitylogs ON securityperson.sid = securitylogs.sid AND securitylogs.timestamps = (SELECT MAX(timestamps) FROM securitylogs AS sl WHERE sl.sid = securityperson.sid);";
                          if ($result = $conn->query($sql)) {
                            while($row = $result->fetch_assoc()){
                              echo '<tr role="row" class="odd">';
                              echo '<td>'.$row['s_id'].'</td>';
                              echo '<td>'.$row['s_name'].'</td>';
                              // echo '<td>'.$row['s_pswd'].'</td>';
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

</body>
</html>
<?php }} ?>
