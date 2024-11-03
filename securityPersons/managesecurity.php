<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title><?php
     include '../libraries/styles.php';?>
</head>
<body>
    <div class="row  m-auto " style="width:100vw; height:100vh; background-color:#f5f5f5">
                <div class="row  m-auto " style="width:50vw; height:100vh; background-color:#ffffff">
                    <div> 
                        <h3 class=" card-title text-center mt-3" style="color:#507297">Security Management</h3>
                        <hr style="border: 1px solid #507297; width: 100%; mt-3;">
                                <div><button type="button" class="mt-3 ms-5" style="width:40%; height:40px; background-color:#275d8b;border: none; color: white; "
                                data-bs-toggle="modal"
                                data-bs-target="#addRowModal">
                                    <i class="bi bi-plus pt-4 pb-5 "></i> Add new security person
                                        </button>
                                        <div>
                                        <!-- <div class="card-body"> -->

                                        <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <div class="d-flex align-items-center">
                      <!-- <button -->
                        <!-- class="btn btn-primary btn-round ms-auto" -->
                        <!-- data-bs-toggle="modal" -->
                        <!-- data-bs-target="#addRowModal" -->
                      
                        <!-- <i class="fa fa-plus"></i> -->
                        <!-- Add Row -->
                      <!-- </button> -->
                    </div>
                  </div>
                  <div class="card-body">
                    <!-- Modal -->
                    <div
                      class="modal fade"
                      id="addRowModal"
                      tabindex="-1"
                      role="dialog"
                      aria-hidden="true"
>
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header border-0">
                            <h5 class="modal-title">
                              <span class="fw-mediumbold"> New</span>
                              <span class="fw-light"> Row </span>
                            </h5>
                            <button
                              type="button"
                              class="close"
                              data-dismiss="modal"
                              aria-label="Close"
                            >
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <p class="small">
                              Create a new row using this form, make sure you
                              fill them all
                            </p>
                            <form>
                              <div class="row">
                                <div class="col-sm-12">
                                  <div class="form-group form-group-default">
                                    <label>Name</label>
                                    <input
                                      id="addName"
                                      type="text"
                                      class="form-control"
                                      placeholder="fill name"
                                    />
                                  </div>
                                </div>
                                <div class="col-md-6 pe-0">
                                  <div class="form-group form-group-default">
                                    <label>ID</label>
                                    <input
                                      id="addPosition"
                                      type="text"
                                      class="form-control"
                                      placeholder="fill position"
                                    />
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group form-group-default">
                                    <label>NIC</label>
                                    <input
                                      id="addOffice"
                                      type="text"
                                      class="form-control"
                                      placeholder="fill office"
                                    />
                                  </div>
                                </div>
                              </div>
                            </form>
                          </div>
                          <div class="modal-footer border-0">
                            <button
                              type="button"
                              id="addRowButton"
                              class="btn btn-primary"
                            >
                              Add
                            </button>
                            <button
                              type="button"
                              class="btn btn-danger"
                              data-dismiss="modal"
                            >
                              Close
                            </button>
                          </div>
                        </div>
                      </div>
                    </div>                    
                     <table class="mt-5">

                    <div class="table-responsive">
                      <!-- <div id="add-row_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4"><div class="row"><div class="col-sm-12 col-md-6"><div class="dataTables_length" id="add-row_length"><label>Show <select name="add-row_length" aria-controls="add-row" class="form-control form-control-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div><div class="col-sm-12 col-md-6"><div id="add-row_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="add-row"></label></div></div></div><div class="row"><div class="col-sm-12"> -->
                        <table id="add-row" class="display table table-striped table-hover dataTable" role="grid" aria-describedby="add-row_info">
                        <thead>
                          <tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="add-row" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 249.613px;">Name</th><th class="sorting" tabindex="0" aria-controls="add-row" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 363.612px;">Position</th><th class="sorting" tabindex="0" aria-controls="add-row" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 204.275px;">Office</th><th style="width: 120.7px;" class="sorting" tabindex="0" aria-controls="add-row" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending">Action</th></tr>
                        </thead>
                        <tfoot>
                          <tr><th rowspan="1" colspan="1">Name</th><th rowspan="1" colspan="1">Id</th><th rowspan="1" colspan="1">Nic</th><th rowspan="1" colspan="1">Age</th></tr><th rowspan="1" colspan="1">status</th><th rowspan="1" colspan="1">Action</th>
                        </tfoot>
                        <tbody>
                            <tr role="row" class="odd">
                            <td class="sorting_1">Airi Satou</td>
                            <td>Accountant</td>
                            <td>Tokyo</td>
                            <td>
                              <div class="form-button-action">
                                <button
                                  type="button"
                                  data-bs-toggle="tooltip"
                                  title=""
                                  class="btn btn-link btn-primary btn-lg"
                                  data-original-title="Edit Task"
                                >
                                  <i class="fa fa-edit"></i>
                                </button>
                                <button
                                  type="button"
                                  data-bs-toggle="tooltip"
                                  title=""
                                  class="btn btn-link btn-danger"
                                  data-original-title="Remove"
                                >
                                  <i class="fa fa-times"></i>
                                </button>
                              </div>
                            </td>
                          </tr><tr role="row" class="even">
                            <td class="sorting_1">Ashton Cox</td>
                            <td>Junior Technical Author</td>
                            <td>San Francisco</td>
                            <td>
                              <div class="form-button-action">
                                <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
                                  <i class="fa fa-edit"></i>
                                </button>
                                <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove">
                                  <i class="fa fa-times"></i>
                                </button>
                              </div>
                            </td>
                          </tr><tr role="row" class="odd">
                            <td class="sorting_1">Brielle Williamson</td>
                            <td>Integration Specialist</td>
                            <td>New York</td>
                            <td>
                              <div class="form-button-action">
                                <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
                                  <i class="fa fa-edit"></i>
                                </button>
                                <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove">
                                  <i class="fa fa-times"></i>
                                </button>
                              </div>
                            </td>
                          </tr><tr role="row" class="even">
                            <td class="sorting_1">Cedric Kelly</td>
                            <td>Senior Javascript Developer</td>
                            <td>Edinburgh</td>
                            <td>
                              <div class="form-button-action">
                                <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
                                  <i class="fa fa-edit"></i>
                                </button>
                                <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove">
                                  <i class="fa fa-times"></i>
                                </button>
                              </div>
                            </td>
                          </tr><tr role="row" class="odd">
                            <td class="sorting_1">Colleen Hurst</td>
                            <td>Javascript Developer</td>
                            <td>San Francisco</td>
                            <td>
                              <div class="form-button-action">
                                <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
                                  <i class="fa fa-edit"></i>
                                </button>
                                <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove">
                                  <i class="fa fa-times"></i>
                                </button>
                              </div>
                            </td>
                          </tr><tr role="row" class="odd">
                            <td class="sorting_1">Colleen Hurst</td>
                            <td>Javascript Developer</td>
                            <td>San Francisco</td>
                            <td>
                              <div class="form-button-action">
                                <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
                                  <i class="fa fa-edit"></i>
                                </button>
                                <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove">
                                  <i class="fa fa-times"></i>
                                </button>
                              </div>
                            </td>
                          </tr><tr role="row" class="odd">
                            <td class="sorting_1">Colleen Hurst</td>
                            <td>Javascript Developer</td>
                            <td>San Francisco</td>
                            <td>
                              <div class="form-button-action">
                                <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
                                  <i class="fa fa-edit"></i>
                                </button>
                                <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove">
                                  <i class="fa fa-times"></i>
                                </button>
                              </div>
                            </td>
                          </tr><tr role="row" class="odd">
                            <td class="sorting_1">Colleen Hurst</td>
                            <td>Javascript Developer</td>
                            <td>San Francisco</td>
                            <td>
                              <div class="form-button-action">
                                <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
                                  <i class="fa fa-edit"></i>
                                </button>
                                <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove">
                                  <i class="fa fa-times"></i>
                                </button>
                              </div>
                            </td>
                          </tr><tr role="row" class="odd">
                            <td class="sorting_1">Colleen Hurst</td>
                            <td>Javascript Developer</td>
                            <td>San Francisco</td>
                            <td>
                              <div class="form-button-action">
                                <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
                                  <i class="fa fa-edit"></i>
                                </button>
                                <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove">
                                  <i class="fa fa-times"></i>
                                </button>
                              </div>
                            </td>
                          </tr><tr role="row" class="odd">
                            <td class="sorting_1">Colleen Hurst</td>
                            <td>Javascript Developer</td>
                            <td>San Francisco</td>
                            <td>
                              <div class="form-button-action">
                                <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
                                  <i class="fa fa-edit"></i>
                                </button>
                                <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove">
                                  <i class="fa fa-times"></i>
                                </button>
                              </div>
                            </td>
                          </tr><tr role="row" class="odd">
                            <td class="sorting_1">Colleen Hurst</td>
                            <td>Javascript Developer</td>
                            <td>San Francisco</td>
                            <td>
                              <div class="form-button-action">
                                <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
                                  <i class="fa fa-edit"></i>
                                </button>
                                <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove">
                                  <i class="fa fa-times"></i>
                                </button>
                              </div>
                            </td>
                          </tr><tr role="row" class="odd">
                            <td class="sorting_1">Colleen Hurst</td>
                            <td>Javascript Developer</td>
                            <td>San Francisco</td>
                            <td>
                              <div class="form-button-action">
                                <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
                                  <i class="fa fa-edit"></i>
                                </button>
                                <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove">
                                  <i class="fa fa-times"></i>
                                </button>
                              </div>
                            </td>
                          </tr></tbody>
                      </table>
                    </div>
                  </div> </table>
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
          lengthMenu: [ [5, 10, 25, 50, 100, -1], [5, 10, 25, 50, 100, "All"] ]
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