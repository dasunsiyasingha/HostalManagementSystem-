<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View All security Persons details</title>
    <?php include '../libraries/styles.php';?>  
    
</head>
<body>
    <div class="container border border-danger" style="height:100vh; width:100vw;" >
        <!-- <div class="row border border-primary" style="width:200px;"></div> -->
        <div class="row mt-4">
                <div class="col-md-12 mt-3 mb-3 border border-primary bg-primary rounded-2 m-auto"  style="width:95%">
                    <div class= "text text-center  p-2 h3"><b style="color:white;">Security Persons logs</b></div>
                </div>
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <h4 class="card-title">Security Persons logs</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table
                        id="basic-datatables"
                        class="display table table-striped table-hover"
                      >
                        <thead>
                          <tr>
                            <th>Date</th>
                            <th>Security ID</th>
                            <th>Name</th>
                            <th>Start Time</th>
                            <th>Leave Time</th>
                          </tr>
                        </thead>
                        <tfoot>
                          <tr>
                            <th>Date</th>
                            <th>Security ID</th>
                            <th>Name</th>
                            <th>Start Time</th>
                            <th>Leave Time</th>
                          </tr>
                        </tfoot>
                        <tbody>
                          <tr>
                            <td>2024/10/03</td>
                            <td>Sec/451/38</td>
                            <td>Sugathapala</td>
                            <td>8.43 A.M.</td>
                            <td>10.08 P.M.</td>
                          </tr>
                          <tr>
                            <td>2024/10/03</td>
                            <td>Sec/341/62</td>
                            <td>Jayapala</td>
                            <td>9.20 A.M.</td>
                            <td>7.00 P.M.</td>
                          </tr>
                          
                        </tbody>
                      </table>
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