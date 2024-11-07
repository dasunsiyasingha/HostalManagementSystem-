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
        <h3 class=" card-title text-center mt-3" style="color:#507297">Mannage Access</h3>
        <hr style="border: 1px solid #507297; width: 100%; mt-3;">
      

      <div class="row m-auto mt-0">
            <!-- <div class="card-body"> -->

            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <div class="d-flex align-items-center">
                  </div>
                </div>
                <div class="card-body">
                  <table class="mt-5">

                    <div class="table-responsive">
                      <!-- <div id="add-row_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4"><div class="row"><div class="col-sm-12 col-md-6"><div class="dataTables_length" id="add-row_length"><label>Show <select name="add-row_length" aria-controls="add-row" class="form-control form-control-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div><div class="col-sm-12 col-md-6"><div id="add-row_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="add-row"></label></div></div></div><div class="row"><div class="col-sm-12"> -->
                      <table id="add-row" class="display table table-striped table-hover dataTable" role="grid"
                        aria-describedby="add-row_info">
                        <thead>
                          <tr role="row">
                            <th class="sorting_asc" tabindex="0" aria-controls="add-row" rowspan="1" colspan="1"
                              aria-sort="ascending" aria-label="Name: activate to sort column descending"
                              style="width: 249.613px;">Security ID</th>
                            <th class="sorting" tabindex="0" aria-controls="add-row" rowspan="1" colspan="1"
                              aria-label="Id: activate to sort column ascending" style="width: 363.612px;">Name</th>
                            <th style="width: 120.7px;" class="sorting" tabindex="0" aria-controls="add-row" rowspan="1"
                              colspan="1" aria-label="Action: activate to sort column ascending">Give Access</th>
                           
                          </tr>
                        </thead>
                        <tfoot>
                          <tr>
                            <th rowspan="1" colspan="1">Security ID</th>
                            <th rowspan="1" colspan="1">Name</th>
                            
                            <th rowspan="1" colspan="1">Give Access</th>
                          
                          </tr>
                        </tfoot>
                        <tbody>
                          <tr role="row" class="odd">
                            <td class="sorting_1">Airi Satou</td>
                            <td>Accountant</td>
                           
                            

                            <td>
                              <div class="form-check form-switch">
                                <input class="form-check-input status-toggle" type="checkbox" role="switch" id="give_access">
                                <label class="form-check-label" for="give_access" id="statusLabel"></label>
                              </div>
                              
                            </td>

                            
                          </tr>


                          <?php 
                          $sql = "SELECT securityperson.sid AS s_id, securityperson.name AS s_name, securityperson.password AS s_pswd, securityperson.access AS s_access FROM securityperson LEFT JOIN securitylogs ON securityperson.sid = securitylogs.sid AND securitylogs.timestamps = (SELECT MAX(timestamps) FROM securitylogs AS sl WHERE sl.sid = securityperson.sid);";
                          if ($result = $conn->query($sql)) {
                            while($row = $result->fetch_assoc()){
                              echo '<tr role="row" class="odd">';
                              echo '<td>'.$row['s_id'].'</td>';
                              echo '<td>'.$row['s_name'].'</td>';

                              $color = !empty($row['s_access']) ? 'success' : 'danger';
                              $access = !empty($row['s_access']) ? 'ALLOWED' : 'DENIED';
                              $checked = !empty($row['s_access']) ? 'checked' : '';

                              echo '<td>
                              <div class="form-check form-switch">
                                <span class="badge rounded-2 p-2 text-bg-'.$color.'" role="button" id="s_access'.$row['s_id'].'" style="cursor: pointer; width:65px;" data-bs-toggle="modal" data-bs-target="#access'.$row['s_id'].'" >'.$access.' </span>
                              
                            </td>
                            <!--ACCESS CHANGE Modal -->
                            <div class="modal fade" id="access'.$row['s_id'].'" tabindex="-1" role="dialog" aria-hidden="true">
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
                                        <input type="text" name="sid" id="sid" value="'.$row['s_id'].'" style="visibility:hidden">
                                          <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch" id="editaccess'.$row['s_id'].'" value="1" name="accesscheck" '.$checked.'>
                                            <label class="form-check-label" for="statuscheck">Status '.$row['s_id'].'</label>
                                          </div>
                                        </div>

                                      </div>
                                      <div class="modal-footer border-0">
                                        <button type="submit" id="accessChange'.$row['s_id'].'" name="accessChange" class="btn btn-primary">
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

          var action =
            '<td> <div class="form-button-action"> <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

          
          $("#addRowButton").click(function () {
            $("#add-row")
              .dataTable()
              .fnAddData([
                $("#addName").val(),
                $("#addid").val(),
                $("#addnic").val(),
                $("#addage").val(),
                $("#addStatus").val(),
                $("#addAction").val(),
          
                action,
              ]);
            $("#addRowModal").modal("hide");
          });
        });
      </script>

</div>
      </body>
      </html>


      <?php
      if(isset($_POST['accessChange'])){

        $sid = $_POST['sid'];
        $access = $_POST['accesscheck'];
        $accessval = $access ? '1' : '0';

        $sql = "UPDATE securityperson SET access='$accessval' WHERE sid='$sid'"; 
        if (mysqli_query($conn, $sql)) {
          echo "Access change is successfully";
        } else {
          echo "Access Update Error: " . $sql . "<br>" . mysqli_error($conn);
        }
      }
    } 
    
  ?>