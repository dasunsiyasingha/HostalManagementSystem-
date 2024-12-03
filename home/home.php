<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hostel Management System</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .hero-section {
            background-color: #8dddec;
            border-radius: 20px;
            padding: 50px;
            position: relative;
            overflow: hidden;
        }
        .hero-image {
            position: absolute;
            top: 0;
            right: 0;
            width: 50%;
            max-width: 500px;
            z-index: 1;
        }
        .hero-content {
            z-index: 2;
            position: relative;
        }
        .hero-title {
            font-size: 2.5rem;
            color: #343a40;
            font-weight: bold;
        }
        .hero-text {
            color: #555555;
            font-size: 1.1rem;
        }
        .card-custom {
            transition: transform 0.3s, box-shadow 0.3s;
            border: none;
            border-radius: 10px;
            overflow: hidden;
        }
        .card-custom:hover {
            transform: translateY(-10px);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }
        .btn-custom {
            font-size: 1.2rem;
            color: white;
            text-transform: uppercase;
        }
        .admin-bg { background-color: #007bff; }
        .student-bg { background-color: #28a745; }
        .security-bg { background-color: #ff5733; }
    </style>
</head>
<body style="background-color: #2C3E50;">
    <div class="container d-flex align-items-center justify-content-center vh-100" >
        <div class="hero-section w-100 p-4">
            <div class="row align-items-center">
                <!-- Left Content -->
                <div class="col-lg-6 col-md-12 hero-content">
                    <h1 class="hero-title">Welcome to HMS</h1>
                    <p class="hero-text mt-3">
                        Manage your hostel and keep everything organized in one place. 
                        Choose your login type: Admin, Student, or Security to access tailored features for your role.
                    </p>
                </div>
                <!-- Right Image -->
                <div class="col-lg-6 col-md-12">
                    <img src="../assets/picture/bg_img.png" alt="Hostel Management Image" class="img-fluid hero-image">
                </div>
            </div>
            <!-- Buttons -->
            <div class="row mt-5 text-center">
                
                <div class="col-6">
                <!-- Admin Sign In -->
                <div class="col--4 mb-3">
                    <div class="card card-custom admin-bg">
                        <div class="card-body">
                            <button class="btn btn-custom w-100 h-100" onclick="location.href='../admin/adlogin.php';">
                                Admin Sign In
                            </button>
                        </div>
                    </div>
                </div>
                <!-- Student Sign In -->
                <div class="col--4 mb-3">
                    <div class="card card-custom student-bg">
                        <div class="card-body">
                            <button class="btn btn-custom w-100 h-100" onclick="location.href='../student/stlogin.php';">
                                Student Sign In
                            </button>
                        </div>
                    </div>
                </div>
                <!-- Security Sign In -->
                <div class="col--4 mb-3">
                    <div class="card card-custom security-bg">
                        <div class="card-body">
                            <button class="btn btn-custom w-100 h-100" onclick="location.href='../securityPersons/selogin.php';">
                                Security Sign In
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="col-6"></div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
