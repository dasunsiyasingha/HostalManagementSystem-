<?php     include('../includes/config.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Room Details</title>
    <?php include '../libraries/styles.php' ?>
</head>
<body>
<div class="container border border-danger" style="height:100vh; width:100vw;" >
        <!-- <div class="row border border-primary" style="width:200px;"></div> -->
        <div class="row mt-4">
        <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <h4 class="card-title">Rooms Details Table</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table
                        id="multi-filter-select"
                        class="display table table-striped table-hover"
                      >
                        <thead>
                          <tr>
                            <th>Room No</th>
                            <th>StudentIDs</th>
                            <th>Chairs</th>
                            <th>Desks</th>
                            <th>Mettress</th>
                            <th>Beds</th>
                            <th>Racks</th>
                            <th>Lockers</th>
                          </tr>
                        </thead>
                        <tfoot>
                          <tr>
                            <th>Room No</th>
                            <th>StudentIDs</th>
                            <th>Chairs</th>
                            <th>Desks</th>
                            <th>Mettress</th>
                            <th>Beds</th>
                            <th>Racks</th>
                            <th>Lockers</th>
                          </tr>
                        </tfoot>
                        <tbody>

                          <?php
                            $sql="SELECT room.roomNo AS room_no, GROUP_CONCAT(student.studentID ORDER BY student.studentID SEPARATOR ', ') AS student_ids, GROUP_CONCAT(CONCAT(chair.chairID, IF(chair.demageState = 'damaged', ' (damaged)', '')) SEPARATOR ', ') AS chairs, GROUP_CONCAT(CONCAT(desk.deskID, IF(desk.demageState = 'damaged', ' (damaged)', '')) SEPARATOR ', ') AS desks, GROUP_CONCAT(CONCAT(bed.bedID, IF(bed.demageState = 'damaged', ' (damaged)', '')) SEPARATOR ', ') AS beds, GROUP_CONCAT(CONCAT(mettress.mettressID, IF(mettress.demageState = 'damaged', ' (damaged)', ''))SEPARATOR ', ') AS mattresses, GROUP_CONCAT(CONCAT(rack.rackID, IF(rack.demageState = 'damaged', ' (damaged)', '')) SEPARATOR ', ') AS racks, GROUP_CONCAT(CONCAT(locker.lockerID, IF(locker.demageState = 'damaged', ' (damaged)', '')) SEPARATOR ', ') AS lockers FROM room LEFT JOIN student ON room.roomNo = student.stRoomNo LEFT JOIN chair ON room.roomNo = chair.roomNo LEFT JOIN desk ON room.roomNo = desk.roomNo LEFT JOIN bed ON room.roomNo = bed.roomNo LEFT JOIN mettress ON room.roomNo = mettress.roomNo LEFT JOIN rack ON room.roomNo = rack.roomNo LEFT JOIN locker ON room.roomNo = locker.roomNo GROUP BY room.roomNo;";
                                if ($result = $conn->query($sql)) {
                                                            
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>{$row['room_no']}</td>";
                                    echo "<td>";
                                    if(!empty($row['student_ids'])){
                                      $stu_ids = explode(', ', $row['student_ids']);
                                      foreach ($stu_ids as $stu_id) {
                                        echo "{$stu_id}  <br>";
                                      }

                                    }else{
                                      echo "No members";
                                    }
                                    echo "</td>";

                                    // Display each item type with damaged items in red
                                    foreach (['chairs', 'desks', 'beds', 'mattresses', 'racks', 'lockers'] as $item) {
                                      $itemsArray = explode(', ', $row[$item]); // Split items by ', '
                                      
                                      echo "<td>";
                                      foreach ($itemsArray as $singleItem) {
                                        if(!empty($singleItem)){
                                          // Check if the item is damaged
                                            $style = strpos($singleItem, '(damaged)') !== false ? 'color:red;' : '';
                                            echo "<span style='{$style}'>{$singleItem}</span><br>";
                                          }else{
                                            echo 'No Items';
                                          }
                                        }
                                      
                                      echo "</td>";
                                    }
                                            
                                    echo"</tr>";
                                }
                                $result->free();
                            }
                          
                          ?>

                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
        </div>

    </div>

    <?php include '../libraries/script.php';?>

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