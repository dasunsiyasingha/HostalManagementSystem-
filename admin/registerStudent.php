<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Additional CSS -->
        <!-- CSS Files -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../assets/css/plugins.min.css" />
    <link rel="stylesheet" href="../assets/css/kaiadmin.min.css" />
    <link rel="stylesheet" href="../assets/css/demo.css" />

</head>
<body>

    <div class="container-fluid d-flex align-items-center justify-content-center" >
        <div  style="width: 50%; ">
            <div class="card mt-5 mb-5">
                <div class="card-header">
                    <h3 class="card-title text-center">Student Register</h3>
                </div>
                <div class="card-body">
                    <form>
                        <div class="form-group mb-3">
                            <label for="stid">Student ID</label>
                            <input type="text" class="form-control" id="stid" placeholder="Enter student ID">
                        </div>
                        <div class="form-group mb-3">
                            <label for="stname">Student Name</label>
                            <input type="text" class="form-control" id="stname" placeholder="Enter student name">
                        </div>
                        <div class="form-group mb-3">
                            <label for="stpwsd">Student password</label>
                            <input type="text" class="form-control" id="stpwsd" placeholder="Enter student password">
                        </div>
                        <div class="form-group mb-3">
                            <label for="stcontact">Contact Number</label>
                            <input type="text" class="form-control" id="stcontact" placeholder="Enter contact number">
                        </div>
                        <!-- Dropdown Input room number -->
                        <div class="form-group mb-3">
                                    <label for="stroom">Room No</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="stroom" placeholder="Enter student room" aria-label="Student Room" >
                                        <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            Dropdown
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#" onclick="stroom('1')">1</a></li>
                                            <li><a class="dropdown-item" href="#" onclick="stroom('2')">2</a></li>
                                            <li><a class="dropdown-item" href="#" onclick="stroom('3')">3</a></li>
                                            <li><a class="dropdown-item" href="#" onclick="stroom('4')">4</a></li>
                                        </ul>
                                    </div>
                                </div>

                                

                            <div class="form-group mb-3">
                                    <label for="stbatch">Batch</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="stbatch" placeholder="Enter student Batch" aria-label="Student Room" >
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
                                                    <button class="btn btn-success ">Submit</button>
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
    <script>
      WebFont.load({
        google: { families: ["Public Sans:300,400,500,600,700"] },
        custom: {
          families: [
            "Font Awesome 5 Solid",
            "Font Awesome 5 Regular",
            "Font Awesome 5 Brands",
            "simple-line-icons",
          ],
          urls: ["assets/css/fonts.min.css"],
        },
        active: function () {
          sessionStorage.fonts = true;
        },
      });
    </script></body>
</html>

